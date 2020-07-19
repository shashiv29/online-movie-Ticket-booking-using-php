<?php
session_start();

include 'admin/database/config.php';
if(isset($_SESSION['url']))
	{
		$url=$_SESSION['url'];
	}
	else
	{
		$url="home1.php";
	}
?>
<?php



if (isset($_POST["login_btn"])) {


   $useremail = $_POST['usergmail'];
   $password = $_POST['pwd'];

   if (empty($useremail) || empty($password)) {
      //header("Location:homeuser.php?error=emptyfields");
      header("Location:loginn.php?error=emptyfields");
      exit();
   } 
   else {
      $sql = "SELECT * FROM userlogin WHERE username=?";
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
            else if ($pwdcheck == true) 
			{
               session_start();
               $_SESSION["userid"] = $row['user_id'];
               $_SESSION["username"] = $row['username'];

               header("Location:home1.php");
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
else {
   header("Location: loginn.php");
   exit();
}

?>