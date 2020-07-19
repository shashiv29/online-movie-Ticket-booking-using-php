<?php
include 'security.php';
include "database/config.php";
if(isset($_POST["signup_btn"])) {

    

    $name=$_POST['fullName'];
    $username=$_POST['username'];
    $email=$_POST['gmail'];
    $password=$_POST['password'];
    $confirm_password =$_POST["confirmPassword"];
    $phone =$_POST["phone"];

    if(empty($name) ||empty($username) ||empty($email) ||empty($password) ||empty($confirm_password)){
       // header('location:homeuser.php');
       header("Location:signupp.php?error=emptyfields&username=".$username."&gmail=".$email);
       exit();
       }
       else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9]*$/', $username)){
        header("Location:signupp.php?error=invalidusernamegmail");
        exit();
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location:signupp.php?error=invalidmail&username=".$username);
        exit();
    }

    else if(!preg_match( "/^[a-zA-Z0-9]*$/", $username)){
        header("Location:signupp.php?error=invalidusername&gamil=".$email);
        exit();
    }
    else if($password!==$confirm_password){
        header("Location:signupp.php?error=passwordcheck&username=".$username."&gmail=".$email);
        exit();
    }
    else{

        $sql ="SELECT username FROM adminlogin WHERE username=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:signupp.php?error=sqlerror"); 
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck>0){
                header("Location:signupp.php?error=usertaken&gmail=".$email); 
                exit();
            }
            else{

                 $sql="INSERT INTO adminlogin(fullName,username,gmail,password,phone) VALUES(?,?,?,?,?)";
                 $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location:signupp.php?error=sqlerror"); 
                exit();
               }
              else{
                $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sssss",$name,$username,$email,$hashedpwd,$phone);
                mysqli_stmt_execute($stmt);
                header("Location:loginn.php?signupp=success"); 



                exit();


                
               }
        }
    }


    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}
}



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM adminlogin WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    header('location:admintable.php');
    $_SESSION['response'] = "Successfully Deleted!";
    $_SESSION['res_type'] = "danger";
}

if (isset($_POST['update_btn'])) {
    $id = $_POST['editt_id'];
    $edit_fullName = $_POST['edit_fullName'];
    $edit_username = $_POST['edit_username'];
    $edit_gmail = $_POST['edit_gmail'];
    $edit_password = $_POST['edit_password'];
    $edit_confirmPassword = $_POST['edit_confirmPassword'];
    $edit_phone = $_POST['edit_phone'];

   


     $query = "UPDATE adminlogin SET  fullName='$edit_fullName', username='$edit_username',  gmail='$edit_gmail', password='$edit_password', confirmPassword='$edit_confirmPassword', phone='$edit_phone' where id='$id'";
     $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
     $stmt->execute();

   //move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], "img/" . $_FILES['edit_mov_image']['name']);

   // $query = "UPDATE adminlogin SET Name='$edit_mov_name', username='$edit_username',  gmail='$edit_gmail', 
   // password='$edit_password',  phone='$edit_phone'where id='$id'";
   // $query_run = mysqli_query($conn, $query);

    if ($query_run) {
       
        
        $_SESSION['response'] = "Successfully updated Your data!";
        $_SESSION['res_type'] = "success";
        header('location:signupp.php');
    } else {
       header('location:signupp.php');
        $_SESSION['response'] = "Your data not updated!";
        $_SESSION['res_type'] = "success";
   }
}
?>