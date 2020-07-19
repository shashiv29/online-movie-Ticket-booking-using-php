<?php
include 'admin/database/config.php';

session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$u = $_SESSION["userid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>


<body>

    <div class="container">
        
        <?php
        include 'admin/database/config.php';

        $query = "SELECT u.name,c.cin_name,m.mov_name,s.show_date,s.show_starttime,s.show_endtime 
                 FROM booking b left join cinema c on c.cin_id=b.cin_id left join movie m on m.mov_id=b.mov_id left join showtime s on s.show_id=b.show_id left join userlogin u on u.user_id=b.user_id where u.user_id=$u";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>



        <div class="jumbotron">
            <h3 class="text-center font-weight-bold hd">DETAIL</h3>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="row">

                    <div class="col-6 col-sm-4">NAME</div>
                    <div class="col-6 col-sm-4"><?php echo $row['name']; ?></div>

                    <!-- Force next columns to break to new line at md breakpoint and up -->
                    <div class="w-100 d-none d-md-block"></div>

                    <div class="col-6 col-sm-4">Cinema Name</div>
                    <div class="col-6 col-sm-4"><?php echo $row['cin_name']; ?></div>
                </div>


                <div class="row">
                    <div class="col-6 col-sm-4">Movie Name</div>
                    <div class="col-6 col-sm-4"><?php echo $row['mov_name']; ?></div>

                    <!-- Force next columns to break to new line at md breakpoint and up -->
                    <div class="w-100 d-none d-md-block"></div>

                    <div class="col-6 col-sm-4">Show Date</div>
                    <div class="col-6 col-sm-4"><?php echo $row['show_date']; ?></div>
                </div>

                <div class="row">
                    <div class="col-6 col-sm-4">Show Starttime</div>
                    <div class="col-6 col-sm-4"><?php echo $row['show_starttime']; ?></div>

                    <!-- Force next columns to break to new line at md breakpoint and up -->
                    <div class="w-100 d-none d-md-block"></div>

                    <div class="col-6 col-sm-4">show endtime</div>
                    <div class="col-6 col-sm-4"><?php echo $row['show_endtime']; ?></div>
                </div>
            <?php } ?>
            <form class="btn float-right">
  <input type="button" value="Go back!" onclick="history.back()">
</form>



        </div>


        
    </div>

</body>

</html>