<?php
include 'security.php';

if(isset($_POST['addcinema'])){
    $cin_name=$_POST['cin_name'];
    $cin_address=$_POST['cin_address'];
    $cin_description=$_POST['cin_description'];
    $cin_image=$_FILES['cin_image']['name'];
    $upload="cinema/".$_FILES['cin_image']['name'];
   
    $query="INSERT INTO cinema(cin_name,cin_address,cin_description ,cin_image) VALUES(?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssss",$cin_name,$cin_address, $cin_description,$upload);
    $stmt->execute();
    
    move_uploaded_file($_FILES['cin_image']['tmp_name'],$upload);
    
    header('location:cinemas.php');
    $_SESSION['response']="Successfully Inserted to the Database!";
    $_SESSION['res_type']="success";
}

if(isset($_GET['delete'])){
   $cinema_id=$_GET['delete'];

	$query1= "DELETE FROM booking WHERE cin_id=?";
    $stmt = $conn->prepare($query1);
    $stmt->bind_param("s", $cinema_id);
    $stmt->execute();
	
	$query2 = "DELETE FROM showtime WHERE cin_id=?";
    $stmt = $conn->prepare($query2);
    $stmt->bind_param("s", $cinema_id);
    $stmt->execute();
	
    $query3="SELECT cin_image FROM cinema WHERE cin_id=?";
    $stmt=$conn->prepare($query3);
    $stmt->bind_param("i",$cin_id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $imagepath=$row['cin_image'];
    unlink($imagepath);


    $query="DELETE FROM cinema WHERE cin_id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$cin_id);
    $stmt->execute();

    header('location:cinemas.php');
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";


}

if (isset($_POST['update_btn'])) {
    $id = $_POST['editt_id'];
    $edit_cin_name=$_POST['edit_cin_name'];
    $edit_cin_address=$_POST['edit_cin_address'];
    $edit_cin_description=$_POST['edit_cin_description'];
    $edit_cin_image=$_FILES['edit_cin_image']['name'];
    $upload="cinema/".$_FILES['edit_cin_image']['name'];
   


     $query = "UPDATE cinema SET cin_name='$edit_cin_name', cin_address='$edit_cin_address', cin_description='$edit_cin_description',  cin_image='$upload'   where cin_id='$id'";
     $stmt = $conn->prepare($query);
     $stmt->bind_param("s", $id);
     $stmt->execute();

  // move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], "img/" . $_FILES['edit_mov_image']['name']);

    //$query = "UPDATE cinema SET cinema_name='$edit_cinema_name', cinema_information='$edit_cinema_information', cinema_image='$upload'   where cinema_id='$id'";
   // $query_run = mysqli_query($conn, $query);

    if ($query) {
        move_uploaded_file($_FILES['edit_cin_image']['tmp_name'], $upload);
        
        $_SESSION['response'] = "Successfully updated Your data";
        $_SESSION['res_type'] = "success";
        header('location:cinemas.php');
    } else {
       header('location:cinemas.php');
        $_SESSION['response'] = "Successfully updated Your data!";
        $_SESSION['res_type'] = "danger";
   }
}
