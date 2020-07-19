<?php
include "security.php";

if(isset($_POST['addshowtime']))
{
    $mov_name=$_POST['mov_name'];
	$cin_name=$_POST['cin_name'];
    $show_starttime=$_POST['show_starttime'];
	$show_endtime=$_POST['show_endtime'];
	$show_date=$_POST['show_date'];
	
	echo $mov_name,$cin_name,$show_starttime,$show_endtime,$show_date;
	
	$mov_id="select mov_id from movie where mov_name='$mov_name'";
	$resultset1=mysqli_query($conn,$mov_id) or die("database error:".mysqli_error($conn));
	$record1=mysqli_fetch_array($resultset1);
	
	$cin_id="select cin_id from cinema where cin_name='$cin_name'";
	$resultset2=mysqli_query($conn,$cin_id) or die("database error:".mysqli_error($conn));
	$record2=mysqli_fetch_array($resultset2);

    $query="INSERT INTO showtime(show_starttime,show_endtime,show_date,mov_id,cin_id) VALUES('$show_starttime','$show_endtime','$show_date',$record1[0],$record2[0])";
    $resultset3=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));

	 header('location:showtime.php');
    $_SESSION['response']="Successfully Inserted";
    $_SESSION['res_type']="success";
}

if(isset($_GET['delete']))
{
    $show_id=$_GET['delete'];
	
	$query1= "DELETE FROM booking WHERE show_id=$show_id";
	$resultset=mysqli_query($conn,$query1) or die("database error:".mysqli_error($conn));

	
    $query="DELETE  FROM showtime WHERE show_id=$show_id";
    $resultset3=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));

    header('location:showtime.php');
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";


}

if (isset($_POST['update_btn'])) {
    $id = $_POST['editt_id'];
    $edit_mov_name = $_POST['edit_mov_name'];
    $edit_cin_name = $_POST['edit_cin_name'];
    $edit_show_starttime = $_POST['edit_show_starttime'];
    $edit_show_endtime = $_POST['edit_show_endtime'];
    $edit_show_date = $_POST['edit_show_date'];
    


     $query = "UPDATE showtime SET mov_name='$edit_mov_name', cin_name=' $edit_cin_name',  show_starttime=' $edit_show_starttime',  show_endtime=' $edit_show_endtime', 
     show_date=' $edit_show_date' where show_id='$id'";
     $stmt = $conn->prepare($query);
     $stmt->bind_param("s", $id);
     $stmt->execute();

   //move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], "img/" . $_FILES['edit_mov_image']['name']);

    //$query = "UPDATE movie SET mov_name='$edit_mov_name', mov_released_date='$edit_mov_released_date',  mov_type='$edit_mov_type', 
   // mov_status='$edit_mov_status', mov_image='$upload', mov_description='$edit_mov_description' mov_cast='$edit_mov_cast'where mov_id='$id'";
   // $query_run = mysqli_query($conn, $query);

    if ($query) {
        
        
        $_SESSION['response'] = "Successfully updated Your data!";
        $_SESSION['res_type'] = "success";
        header('location:showtime.php');
    } else {
       header('location:showtime.php');
        $_SESSION['response'] = "Your data not updated!";
        $_SESSION['res_type'] = "success";
   }
}
?>