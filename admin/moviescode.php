<?php
include 'security.php';

if (isset($_POST['addmovies'])) 
{
    $mov_name = $_POST['mov_name'];
    $mov_released_date = $_POST['mov_released_date'];
    $mov_tailor = $_POST['mov_tailor'];
    $mov_type = $_POST['mov_type'];
	$mov_trend = $_POST['mov_trend'];
    $mov_status = $_POST['mov_status'];
    $mov_description = $_POST['mov_description'];
    $mov_cast = $_POST['mov_cast'];

    $mov_image = $_FILES['mov_image']['name'];
    $upload = "movieImage/" . $_FILES['mov_image']['name'];
    $mov_banner_image = $_FILES['mov_banner_image']['name'];
    $uploadbanner = "bannerImage/" . $_FILES['mov_banner_image']['name'];

    $query = "INSERT INTO movie(mov_name,mov_released_date,mov_type,mov_trend,mov_status,mov_tailor,mov_description,mov_cast, mov_image, mov_banner_image) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssss", $mov_name, $mov_released_date, $mov_type,$mov_trend, $mov_status, $mov_tailor,$mov_description,$mov_cast, $upload,$uploadbanner);
    $stmt->execute();

    move_uploaded_file($_FILES['mov_image']['tmp_name'], $upload);
    move_uploaded_file($_FILES['mov_banner_image']['tmp_name'], $uploadbanner);

    header('location:movies.php');
    $_SESSION['response'] = "Successfully Inserted to the Database!";
    $_SESSION['res_type'] = "success";
}

if (isset($_GET['delete'])) {
    $mov_id = $_GET['delete'];
	
	$query1= "DELETE FROM booking WHERE mov_id=?";
    $stmt = $conn->prepare($query1);
    $stmt->bind_param("s", $mov_id);
    $stmt->execute();
	
	$query2 = "DELETE FROM showtime WHERE mov_id=?";
    $stmt = $conn->prepare($query2);
    $stmt->bind_param("s", $mov_id);
    $stmt->execute();
	
    $query3 = "SELECT mov_image,mov_banner_image FROM movie WHERE mov_id=?";
    $stmt = $conn->prepare($query3);
    $stmt->bind_param("i", $mov_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $imagepath = $row['mov_image'];
    $imagepathbanner = $row['mov_image'];
    unlink($imagepath);
    unlink($imagepathbanner);


    $query = "DELETE FROM movie WHERE mov_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $mov_id);
    $stmt->execute();

    header('location:movies.php');
    $_SESSION['response'] = "Successfully Deleted!";
    $_SESSION['res_type'] = "danger";
}

if (isset($_POST['update_btn'])) {
    $id = $_POST['editt_id'];
    $edit_mov_name = $_POST['edit_mov_name'];
    $edit_mov_released_date = $_POST['edit_mov_released_date'];
    $edit_mov_tailor = $_POST['edit_mov_tailor'];
    $edit_mov_type = $_POST['edit_mov_type'];
    $edit_mov_status = $_POST['edit_mov_status'];
    $edit_mov_description = $_POST['edit_mov_description'];
    $edit_mov_cast = $_POST['edit_mov_cast'];

    $edit_mov_image = $_FILES['edit_mov_image']['name'];
    $upload = "movieImage/".$_FILES['edit_mov_image']['name'];
    $edit_mov_banner_image = $_FILES['edit_mov_banner_image']['name'];
    $uploadbanner = "bannerImage/".$_FILES['edit_mov_banner_image']['name'];


    $query = "UPDATE movie SET mov_name='$edit_mov_name', mov_released_date='$edit_mov_released_date', mov_tailor='$edit_mov_tailor', mov_released_date='$edit_mov_released_date', mov_type='$edit_mov_type', 
    mov_status='$edit_mov_status', mov_description='$edit_mov_description',  mov_cast='$edit_mov_cast', mov_image='$upload' , mov_banner_image='$uploadbanner' where mov_id='$id'";
     $stmt = $conn->prepare($query);
     $stmt->bind_param("s", $id);
     $stmt->execute();

   //move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], "img/" . $_FILES['edit_mov_image']['name']);

    //$query = "UPDATE movie SET mov_name='$edit_mov_name', mov_released_date='$edit_mov_released_date',  mov_type='$edit_mov_type', 
   // mov_status='$edit_mov_status', mov_image='$upload', mov_description='$edit_mov_description' mov_cast='$edit_mov_cast'where mov_id='$id'";
   // $query_run = mysqli_query($conn, $query);

    if ($query) {
        move_uploaded_file($_FILES['edit_mov_image']['tmp_name'], $upload);
        move_uploaded_file($_FILES['edit_mov_banner_image']['tmp_name'], $uploadbanner);
        
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