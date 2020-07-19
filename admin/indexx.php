<?php
include "security.php";
//session_start();
//include "database/config.php";

include "includes/header.php";
include "includes/navbar.php";
?>
<?php
//$sql = "SELECT * FROM bookingTable";
//$bookingsNo=mysqli_num_rows(mysqli_query($conn, $sql));
// $messagesNo=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM feedbackTable"));
$moviesNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM movie"));
$cinemaNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cinema"));
$userNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM userlogin"));
$bookingNo = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking"));
?>
    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Movies</div>
                                    <div class="h5 mb-0 font-weight-bold text-black-800"><?php echo $moviesNo ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-film fa-2x text-black-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cinema</div>
                                    <div class="h5 mb-0 font-weight-bold text-black-800"><?php echo $cinemaNo ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="	fas fa-expand fa-2x text-black-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <!-- Pending Requests Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-black-800"><?php echo $userNo ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-black-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Booking</div>
                                    <div class="h5 mb-0 font-weight-bold text-black-800"><?php echo $bookingNo ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-mail-bulk	 fa-2x text-black-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
           
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    </div>
<!-- End of Content Wrapper -->
    </div>
<!-- End of Content Wrapper -->



<?php
include "includes/scripts.php";

include "includes/footer.php";
?>