<?php
    session_start();

    include 'configs/connect.php';

    if($_SESSION['loggedin']!='true'){
        header('Location:signin.php');
    }

    if($_SESSION['role']!='handyman'){
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

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
        padding-top: 3%;
        padding-bottom: 3%;
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
        padding: 12px 24px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 500;
        font-size: 16px;
        border-style: none;
    }
    .chck-btn button {
        padding: 11px 16px;
        border-color: #b9732f;
        background-color: #fff;
        color: #b9732f;
        border-radius: 4px;
        font-weight: 500;
        font-size: 16px;
    }
    .book-btn button {
        padding: 8px 10px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 500;
        font-size: 16px;
        border-style: none;
    }
    .nav-pills > li > a.active {
    background-color: #606060 !important;
    }
    .welcome-text {
        color: #b9732f !important;
        font-weight: 600;
    }
    .accept-btn button {
        padding: 6px 10px;
        background-color: transparent;
        color: #b9732f;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .decline-btn button {
        padding: 6px 10px;
        background-color: transparent;
        color: #606060;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .card {
        border-radius: 5px;
        background-color: #fff;
        color: #303030;
    }
    .card h6 {
        font-size: 14px;
    }
    .card label {
        font-size: 10px;
    }
    .book-btn button {
        padding: 6px 10px;
        background-color: transparent;
        color: #b9732f;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .decline-btn button {
        padding: 6px 10px;
        background-color: transparent;
        color: #606060;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    #profileDisplay{
        border-radius: 50%;
        width: 80px;
        height: 80px;
        margin: auto;
        object-fit: cover;
    }
    .btn-reject {
        padding: 6px 10px;
        background-color: transparent;
        color: #b9732f;
        font-weight: 600;
        font-size: 16px;
        border-style: none;
    }
    .modal-body p{
        font-weight: 600;
        color: #606060;
    }
    .c-recommended:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }
    .card-text small{
        color: #b9732f;
        font-weight: 600;
    }
    .card:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }
    form input[type=text]:focus,
    form input[type="email"]:focus,
    .md-textarea:focus  {
        box-shadow: none;
        border-color: #da8334;
    }
    form input[type=text],
    form input[type=email] {
        font-size: 14px;
    }
</style>
<body>
     <!-- navigation bar -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/home_aide/assets/"; include($IPATH. "header.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5">
                <h5 class="welcome-text pb-2">Hello,  <?php echo $_SESSION['first_name']?>!</h5>
                <h2>Your Web-based</h2>
                <h1>Home Service</h1>
                <h2>platform</h2>
                <p class="py-4">Welcome to the handyman dashboard. You may click the "Book a Service" button to proceed with your bookings, or you can click the "Check Bookings" button to manage booking requests.</p>
                <div class="row">
                    <div class="col-6">
                        <a class="bk-btn" href="book_service.php"><button class="w-100">Book a Service</button></a>
                    </div>
                    <div class="col-6">
                        <a class="chck-btn" href="#bookings"><button class="w-100">Check Bookings</button></a>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

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
                                    $query = "SELECT * FROM `bookings` WHERE HandymanId = '".$_SESSION['id']."' AND Status = 'pending'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $total = $result -> num_rows;
                                ?>
                                    
                                    <div class="col-4">
                                        <h6 class="card-text">
                                        <small> Active Requests : &nbsp; <?php echo $total ?> </small></h6>
                                    </div>

                                <?php 
                                    $query = "SELECT ROUND(AVG(rating),2) AS AveragePrice FROM `ratings` INNER JOIN `users` ON ratings.Ratee = users.id WHERE users.id= '".$_SESSION['id']."'"; 
                                    $result = $conn -> query($query);
                                    $row = $result -> fetch_assoc();

                                ?>
                                    <div class="col-4">
                                        <h6 class="card-text">
                                        <small> Account Rating : &nbsp; <?php echo $row['AveragePrice'] ?> </small></h6>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="https://drive.google.com/uc?export=view&id=1x9m8IxOwh8Nm1APs5tQzaAFIgFsSNP5m" class="img-fluid d-none d-md-block" alt="">
            </div>
        </div>
                    
                
    </div>
    <div class="container">
        <h5 style="font-weight: bold; color:#606060">Booking Requests:</h5>
        <div class="row pt-4" id="bookings">
            <?php 

                $sql= "SELECT * FROM ((bookings INNER JOIN users ON bookings.UserId = users.id) INNER JOIN handyman ON bookings.HandymanId = handyman.UserId) WHERE `HandymanId` = '".$_SESSION['id']."' AND `Status` = 'pending'";
            
                $result = $conn -> query($sql);
                        
                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) { ?>
                            <div class="col-lg-4 col-md-6 py-2">
                                <div class="card h-100 c-recommended shadow">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-4">  
                                                <img src="<?php echo 'resources/profileImage/' . $row['profileImage']?>" id="profileDisplay" onerror="this.src='https://image.flaticon.com/icons/png/512/2983/2983067.png';">
                                            </div> 
                                            <div class="col-lg-8 col-md-8 col-8">
                                                <label class="text-muted mb-0">Full Name</label>
                                                <h6 class="card-text mb-0"><?php echo $row['bFirstName']." ".$row['bLastName'] ?></h6>
                
                                                <label class="text-muted mb-0 mt-0">Contact Number</label>
                                                <h6 class="card-text mb-1 "><?php echo $row['bContact'] ?></h6>
                                            </div>                                      
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-4">
                                                <label class="text-muted">Service</label>
                                                <h6 class="card-text" ><?php echo $row['bServiceType']?></h6>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-8">
                                                <label class="text-muted">Service Date</label>
                                                <h6 class="card-text"><?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="text-muted"> Home Address</label>
                                                <h6 class="card-text" ><?php echo $row['bBookingAddress'].", ".$row['bBarangay']." ". $row['bCity'] .", ".$row['bProvince'] ?></h6>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="text-muted">Repair Concern</label>
                                                <h6 class="card-text"> <?php echo $row['Description'] ?> </h6>  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-right"> 
                                        <a data-toggle="modal" class="accept-btn" href="#acceptbookingModal" data-id="<?php echo $row['booking.id']?>"><button>Accept</button></a>  
                                       
                                        <a data-toggle="modal" class="decline-btn pl-2" href="#rejectbookingModal" data-id="<?php echo $row['booking.id'] ?>"><button>Decline</button></a> 
                                    </div>   
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div  div class="col-12 py-2">
                            <div class="card text-center shadow py-5">
                                <div class="col-lg-12 justify-content-center">
                                    <h5 style="font-weight: 700;">Ooops!</h5>
                                    <h6>There are no requests as of the moment.</h6>
                                </div> <div class="col-lg-12 py-4">
                                    <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                </div>
                            </div>
                        </div>
               <?php } ?>
        </div>
    </div>

<!-- ACCEPT BOOKING MODAL -->    
    <div class="accept-booking">
        <div id="acceptbookingModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <form action="email/sendMail.php" class="" method="POST">
                        <div class="modal-header border-0">
                            <button type="text" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <p>Accept Booking?</p>
                            <input type="hidden" name="acceptId" id="acceptId" value=""/>
                        </div>
                        <div class="modal-footer border-0">
                            <button name="submit-accept" class="btn-reject float-right">Confirm</button></div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
<!-- END OF ACCEPT BOOKING MODAL --> 

<!-- REJECT BOOKING MODAL -->
    <div class="reject-booking">
        <div id="rejectbookingModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="email/sendMail.php" class="" method="POST">
                    <div class="modal-content">
                        <div class="modal-body ">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <p>Please state your reason.</p>
                            <input type="hidden" name="bookId" id="bookId" value=""/>
                            <textarea name="reason" class="text-area" id="reason" cols="30" rows="3" placeholder="Type here..."></textarea>
                            <button name="submit-reason" class="btn-reject float-right">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END OF REJECT BOOKING MODAL -->
<?php include($IPATH . "footer.php"); ?>
<script>

//accept modal toggle
    $(document).on("click", ".accept-btn", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #acceptId").val( myBookId );
});

//reject modal toggle
    $(document).on("click", ".decline-btn", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});

</script>

</body>
</html>