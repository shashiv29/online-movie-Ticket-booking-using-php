<?php
include 'security.php';
//include "database/config.php";
?>
<?php
if (isset($_POST["login_btn"])) {
   $useremail = $_POST['usergmail'];
   $password = $_POST['pwd'];

   if (empty($useremail) || empty($password)) {
      header("Location:loginn.php?error=emptyfields");
      exit();
   } 
   else {
      echo $sql = "SELECT * FROM adminlogin WHERE username=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location:loginn.php?error=sqlerror");
         exit();
      } 
      else {
         mysqli_stmt_bind_param($stmt, "s", $useremail);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);

         if ($row = mysqli_fetch_assoc($result)) {
            $pwdcheck = password_verify($password, $row['password']);
            if ($pwdcheck == false) {
               header("Location:loginn.php?error=wrong");
               exit();
            } 
            else if ($pwdcheck == true) {
               $_SESSION["userid"] = $row['id'];
               $_SESSION["username"] = $row['username'];

               header("Location:indexx.php?login=success");
               exit();
            }
         } 
         else {
            header("Location:loginn.php?error=wrongpwd");
            exit();
         }
      }
   }
} 


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

 $query = "DELETE FROM userlogin WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    header('location:usertable.php');
    $_SESSION['response'] = "Successfully Deleted!";
    $_SESSION['res_type'] = "danger";
}

if (isset($_POST['update_btn'])) {
    $id = $_POST['editt_id'];
    $edit_mov_name = $_POST['edit_mov_name'];
    $edit_mov_released_date = $_POST['edit_mov_released_date'];
    $edit_mov_type = $_POST['edit_mov_type'];
    $edit_mov_status = $_POST['edit_mov_status'];
    $edit_mov_description = $_POST['edit_mov_description'];
    $edit_mov_cast = $_POST['edit_mov_cast'];

    $edit_mov_image = $_FILES['edit_mov_image']['name'];
    $upload = "img/".$_FILES['edit_mov_image']['name'];


    // $query = "UPDATE movie SET mov_name='$edit_mov_name', mov_released_date='$edit_mov_released_date', mov_released_date='$edit_mov_released_date', mov_type='$edit_mov_type', 
    // mov_status='$edit_mov_status', mov_description='$edit_mov_description', mov_image='$edit_mov_image' where mov_id='$id'";
    // $stmt = $conn->prepare($query);
    //$stmt->bind_param("s", $id);
    // $stmt->execute();

   //move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], "img/" . $_FILES['edit_mov_image']['name']);

    $query = "UPDATE movie SET mov_name='$edit_mov_name', mov_released_date='$edit_mov_released_date',  mov_type='$edit_mov_type', 
    mov_status='$edit_mov_status', mov_image='$upload', mov_description='$edit_mov_description' mov_cast='$edit_mov_cast'where mov_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], $upload);
        
        $_SESSION['response'] = "Successfully updated Your data!";
        $_SESSION['res_type'] = "success";
        header('location:movies.php');
    } else {
       header('location:movies.php');
        $_SESSION['response'] = "Your data not updated!";
        $_SESSION['res_type'] = "success";
   }
}

?>