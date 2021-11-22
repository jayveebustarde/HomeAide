<?php
    session_start();

    include 'configs/connect.php';

    if($_SESSION['loggedin']!='true'){
        header('Location:signin.php');
    }

    if($_SESSION['role']!='user'){
        header('Location:signin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" type="img/png" href="https://drive.google.com/uc?export=view&id=11faVxeXoK02-bDkLHPG1a4tA1SjCwh_n">
    <title>Home Aide</title>
</head>
<style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
    }
    .container {
        padding-top: 4%;
        padding-bottom: 4%;
    }
    .container h2{
        font-weight: 600;
        font-size: 36px;
    }
    .container h1{
        font-weight: 700;
        font-size: 64px;
        color: #b9732f;
    }
    .container p {
        color: #606060;
        font-size: 16px;
    }
    .bk-btn button {
        padding: 12px 18px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 500;
        font-size: 16px;
        border-style: none;
        width: 100%;
    }
    .bk-btn button:hover {
        background-color: #da8334;
    }
    .apply-btn button {
        padding: 11px 24px;
        border-color: #b9732f;
        background-color: #fff;
        color: #b9732f;
        border-radius: 4px;
        font-weight: 500;
        font-size: 16px;
        width: 100%;
    }
    .nav-pills > li > a.active {
    background-color: #606060 !important;
    }
    .welcome-text {
        color: #b9732f !important;
        font-weight: 600;
    }
    .card-text small{
        color: #b9732f;
        font-weight: 600;
    }
    .card:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }
    .card h6{
        font-size: 14px;
    }
    .modal-text h6{
        font-size: 14px;
        color: #404040;
    }
    .modal-body{
        border-bottom: 1px solid #b9732f;
    }

</style>
<body>

    <!-- navigation bar -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/home_aide/assets/"; include($IPATH. "header.php"); ?>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 pt-2">
                <h5 class="welcome-text pb-2">Hello,  <?php echo $_SESSION['first_name']?>!</h5>
                <h2>Your Web-based</h2>
                <h1>Home Service</h1>
                <h2>Platform</h2> <br>
                <p>Welcome to the user dashboard. You may click the "Book a Service" button to proceed with your bookings, or you can click the "Apply as a Handyman" button to become one of our Handymen.</p>

                <div class="row pt-4">
                    <div class="col-lg-6 pb-4">
                        <a class="bk-btn" href="book_service.php"><button>Book a Service</button></a>
                    </div>
                    <div class="col-lg-6 pb-2">
                        
                        <?php  
 
                            $query = "SELECT * FROM `handyman` WHERE UserId = '".$_SESSION['id']."'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            
                            if (mysqli_num_rows($result) == 0) { ?>

                                <a class="apply-btn" href="user_apply.php"><button>Apply as a Handyman</button></a>

                        <?php } else { ?>

                                <a class="apply-btn" data-toggle="modal" name="apply-status" data-target="#statusModal"><button> Apply as a Handyman</button></a>

                        <?php } ?>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                <?php  
                                    $query = "SELECT * FROM `handyman` WHERE UserId = '".$_SESSION['id']."'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    
                                    if (mysqli_num_rows($result) > 0) { ?>

                                        <div class="col-4">
                                        <h6 class="card-text">
                                            <small> Apply Status : &nbsp; <?php echo $row['ApplyStatus'] ?> </small></h6>
                                        </div>

                                    <?php } else { ?>

                                        <div class="col-4">
                                        <h6 class="card-text">
                                            <small> Apply Status : &nbsp; None </small></h6>
                                        </div> 

                                   <?php } ?>

                                <?php 
                                    
                                    $query = "SELECT * FROM `bookings` WHERE UserId = '".$_SESSION['id']."' AND uConfirmation != 'done' AND uRate != 'Yes' AND Status = 'confirmed' ";
                                        
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    
                                    $total = $result -> num_rows;
                                    ?>
                                    
                                    <div class="col-4">
                                        <h6 class="card-text">
                                        <small> Active Bookings : &nbsp; <?php echo $total ?> </small></h6>
                                    </div>


                                <?php
                                
                                    $query = "SELECT * FROM `bookings` WHERE UserId = '".$_SESSION['id']."' AND Status = 'pending'";

                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);

                                    $total = $result -> num_rows;
                                    ?>

                                    <div class="col-4">
                                        <h6 class="card-text">
                                        <small> Pending Bookings : &nbsp; <?php echo $total ?> </small></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://drive.google.com/uc?export=view&id=1x9m8IxOwh8Nm1APs5tQzaAFIgFsSNP5m" class="img-fluid d-none d-lg-block" alt=""> 
            </div>
        </div>
    </div>
    <div class="statusModal">
        <div id="statusModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content border">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center modal-text mx-4">
                        <h6>The admin is still verifying your application. An email will be sent to your provided email address regarding your application status.</h6>
                    </div>
                    <div class="modal-footer border-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include($IPATH . "footer.php"); ?>
</body>

<script>

</script>
</html>