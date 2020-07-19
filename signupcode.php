<?php
if(isset($_POST["signup_btn"])) {

    include 'admin/database/config.php';

    $name=$_POST['Name'];
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

        echo $sql ="SELECT username FROM userlogin WHERE username='".$username."'";
        $stmt=mysqli_query($conn,$sql);
        if(mysqli_num_rows($stmt)>0){
            header("Location:signupp.php?error=usertaken&gmail=".$email); 
            exit();
        }
        else{
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            echo $sql="INSERT INTO userlogin(name,username,password,email,phone) VALUES('".$name."','".$username."','".$hashedpwd."','".$email."','".$phone."')";
                 $stmt=mysqli_query($conn,$sql);

                if(mysqli_affected_rows($conn)>0)
                {
                    header("Location:loginn.php?signup=success"); 
                    exit();
               }
              else{
                
                header("Location:signupp.php?error=sqlerror"); 
                exit();
               }
        }
    }
    mysqli_close($conn);


}
else{
    header("Location: signupp.php"); 
    exit();

}
?>