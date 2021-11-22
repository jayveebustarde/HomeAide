<?php

session_start();

include 'configs/connect.php';

if ($_SESSION['loggedin'] != "true") {
    header('Location: signin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">



    <!-- FOR RATING -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="jquery.rateyo.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


    <link rel="shortcut icon" type="img/png" href="https://drive.google.com/uc?export=view&id=11faVxeXoK02-bDkLHPG1a4tA1SjCwh_n">
    <title>Home Aide</title>

</head>
<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }

    .navbar {
        padding: 10px 8% 0px 8%;
        background-color: #fff;
    }

    .nav-item {
        list-style: none;
        font-weight: 400;
        font-size: 14px;
        color: #404040;
    }

    .signin-btn button {
        padding: 4px 20px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }

    .logout-btn button {
        padding: 4px 20px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }

    .container {
        padding-top: 2%;
    }

    .container h2 {
        font-weight: 600;
        font-size: 36px;
    }

    .container h1 {
        font-weight: 700;
        font-size: 64px;
        color: #b9732f;
    }

    .container p {
        color: #c5c5c5;
        font-size: 16px;
    }

    .accept-btn {
        padding: 3px 6px;
        background-color: #606060;
        color: #fff;
        border-style: none;
        border-radius: 2px;
    }

    .reject-btn {
        padding: 3px 6px;
        background-color: #c5c5c5;
        color: #303030;
        border-style: none;
        border-radius: 2px;
    }

    .nav-tabs>li>a {
        border: medium none;
        color: #606060;
        font-weight: 500;
    }

    .nav-tabs .nav-item .nav-link.active {
        color: #b9732f;
        font-weight: 600;
    }

    .nav-tabs>li>a:hover {
        color: #606060;
        background-color: #c5c5c5;
    }

    .title-bar {
        background-color: #b9732f;
        color: #fff;
        font-size: 16px;
    }

    .markDone button {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        padding: 2px 12px;
        background-color: #b9732f;
        border-style: none;
        border-radius: 2px;
    }

    .markCancel button {
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        background-color: #606060;
        padding: 2px 12px;
        border-style: none;
        border-radius: 2px;

    }

    .markCancel button:hover {
        color: #fff;
        background-color: #404040;
    }

    .markDone button:hover {
        color: #fff;
        background-color: #da8334;
    }

    .markDone-d button:hover {
        color: #fff;
        background-color: #404040;
    }

    .markDone-d button {
        border-style: none;
        background-color: #606060;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
    }

    .card-body label {
        font-size: 14px;
        color: #606060;
    }

    .card-body h6 {
        font-size: 14px;
        color: #404040;
    }

    .markedcard {
        border-style: none;
        color: #404040;
        font-weight: 600;
        font-size: 12px;
    }

    .markedcard:hover,
    .ratecard:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }

    .markedcard h6 {
        color: #404040;
        font-weight: 500;
        font-size: 14px;
    }

    .id-container img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
        object-fit: cover;
        background-position: center;
        margin: auto;

    }

    .card-footer h6 {
        font-size: 14px;
        color: #404040;
    }

    .rate-btn button {
        border-style: none;
        background-color: transparent;
        font-size: 14px;
        font-weight: 600;
        color: #b9732f;
    }

    .rate-btn-d button {
        border-style: none;
        background-color: transparent;
        font-size: 14px;
        font-weight: 600;
        color: #606060;
    }

    .btn-rate {
        padding: 6px 16px;
        color: #fff;
        border-style: none;
        border-radius: 2px;
        background-color: #b9732f;
        font-weight: 500;
    }

    .rateyo {
        padding: 10px 100px;
    }

    .ratecard h6 {
        font-weight: 600;
        font-size: 16px;
        color: #b9732f;
    }

    .edit-bk-btn {
        color: #b9732f;
        border-style: none;
        text-decoration: none;
        background-color: #fff;
    }

    .btn-update {
        color: #fff;
        background-color: #b9732f;
    }

    .btn-update:hover {
        color: #fff;
        background-color: #da8334;
    }

    form input[type=text]:focus,
    form input[type=select]:focus,
    form input[type=date]:focus,
    form textarea[type=text]:focus,
    form option[type=select] {
        box-shadow: none;
        border-color: #da8334;
    }

    form input[type=text],
    form textarea[type=text],
    form input[type=date],
    form select[class=form-control],
    form option[type=select] {
        font-size: 14px;
    }
</style>

<body>

    <!-- navigation bar -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/home_aide/assets/";
    include($IPATH . "header.php"); ?>
    <!-- end of  navigation bar -->

    <!-- start of history nav container -->
    <div class="container">

        <!-- start of history tabs -->
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                if ($_SESSION['role'] == 'user') { ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="bookings-tab" data-toggle="tab" href="#active-bookings" role="tab" aria-controls="home" aria-selected="true">Bookings</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="contact" aria-selected="false">History</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ratings-tab" data-toggle="tab" href="#ratings" role="tab" aria-controls="contact" aria-selected="false">Ratings</a>
                    </li>
                <?php } else if ($_SESSION['role'] == 'handyman') { ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="jobs-tab" data-toggle="tab" href="#active-requests" role="tab" aria-controls="home" aria-selected="true">My Job/s</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bookings-tab" data-toggle="tab" href="#active-bookings" role="tab" aria-controls="home" aria-selected="true">Bookings</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="contact" aria-selected="false">History</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ratings-tab" data-toggle="tab" href="#ratings" role="tab" aria-controls="contact" aria-selected="false">Ratings</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- end of container history tabs -->


        <!-- HANDYMAN ROLE  -->
        <?php if ($_SESSION['role'] == "handyman") { ?>

            <div class="tab-content clearfix" id="myTabContent">

                <!-- MY JOBS TAB -->
                <div class="tab-pane active" id="active-requests" role="tabpanel">
                    <div class="row">
                        <!-- start of my job cards -->
                        <div class="col-lg-9 pt-4 order-lg-1 order-md-12 order-sm-12 order-xs-12 order-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center py-2 shadow" style="border-radius: 2px; height: 40px;">My Job/s</h6>
                                </div>
                                <?php
                                $bookingsQuery = "SELECT * FROM ((`bookings` INNER JOIN `users` ON bookings.UserId = users.id) INNER JOIN `handyman` ON bookings.HandymanId = handyman.UserId) WHERE  HandymanId = '" . $_SESSION['id'] . "' AND Status = 'confirmed' AND `hmConfirmation` != 'done' ";

                                $result = $conn->query($bookingsQuery);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>

                                        <div class="col-lg-12 col-md-6 py-2">
                                            <div class="card border shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6 col-7">
                                                                    <label class="mb-0"><small>Customer</small></label>
                                                                    <h6> <?php echo $row['bFirstName'] . " " . $row['bLastName'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-5">
                                                                    <label class="mb-0"><small>Contact Number</small></label>
                                                                    <h6> <?php echo $row['bContact'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-7">
                                                                    <label class="mb-0"><small>Services</small></label>
                                                                    <h6> <?php echo $row['Services'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-2 col-md-6 col-5">
                                                                    <label class="mb-0"><small>Rate</small></label>
                                                                    <h6> <?php echo $row['ServicePrice'] ?>/hr</h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <label class="mb-0"><small>Customer Address</small></label>
                                                                    <h6> <?php echo $row['bBookingAddress'] . ", " . $row['bBarangay'] . " " . $row['bCity'] . ", " . $row['bProvince'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <label class="mb-0"><small>Repair Concern</small></label>
                                                                    <h6><?php echo $row['Description'] ?></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-lg-9 col-md-12 col-12">
                                                            <h6 class="pt-2"> <i class="fa fa-calendar">&emsp;</i> <?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                        </div>
                                                        <div class="col-3 col-md-12 col-12">
                                                            <a href="query/hmMarkDone.php?id=<?php echo $row['booking.id'] ?>" class="markDone float-right pt-1"> <button>Done</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-5">
                                            <div class="col-lg-12 justify-content-center">
                                                <h5 style="font-weight: 700;">Ooops!</h5>
                                                <h6>You haven't confirmed any requests as of the moment.</h6>
                                            </div>
                                            <div class="col-lg-12 py-4">
                                                <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end of my job cards -->

                        <!-- start of my jobs mark as done -->
                        <div class="col-lg-3 pt-4 order-lg-12 order-md-1 order-sm-1 order-xs-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Marked as Done</h6>
                                </div>
                                <?php
                                $query = "SELECT * FROM `bookings` WHERE hmConfirmation = 'done' AND `HandymanId` = '" . $_SESSION['id'] . "' ORDER BY `booking.id` DESC LIMIT 3 ";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 col-md-6 col-sm-4 col-xs-4 py-2">
                                            <div class="card markedcard p-2 shadow">
                                                <div class=row>
                                                    <div class="col-lg-6 col-4">
                                                        <label class="text-muted">Booking ID #:</label>
                                                        <h6><i class="fa fa-check-square-o"></i> &nbsp; <?php echo $row['booking.id'] ?> </h6>
                                                    </div>
                                                    <div class="col-lg-6 col-8">
                                                        <label class="text-muted">Service Date</label>
                                                        <h6><?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-3">
                                            <h6><small> There is no data.</small></h6>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Cancelled Requests</h6>

                                </div>
                                <?php
                                $query = "SELECT * FROM `bookings` WHERE Status = 'cancelled' AND HandymanId = '" . $_SESSION['id'] . "' ORDER BY `booking.id` DESC LIMIT 3";

                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 col-md-6 py-2">
                                            <div class="card markedcard p-2 shadow">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="text-muted">Booking ID #:</label>
                                                        <h6><i class="fa fa-check-square-o"></i> &nbsp; <?php echo $row['booking.id'] ?></h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="text-muted">Booking Date: </label>
                                                        <h6><i class="fa fa-calendar"></i> &nbsp; <?php echo $row['BookingDate'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-3">
                                            <h6><small> There are no cancelled requests.</small></h6>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end of my jobs mark as done -->
                    </div>
                </div>
                <!-- END OF MY JOBS TAB -->

                <!-- START OF BOOKINGS TAB -->
                <div class="tab-pane" id="active-bookings" role="tabpanel">
                    <div class="row">
                        <!-- start of active bookings card -->
                        <div class="col-lg-9 pt-4 order-lg-1 order-md-12 order-sm-12 order-xs-12 order-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center p-2" style="border-radius: 2px; height: 40px;">Active Bookings<i class="fa fa-info-circle float-right pt-1" data-toggle="modal" data-target="#hmactive"></i></h6>
                                </div>
                                <?php
                                $bookingsQuery = "SELECT * FROM ((`bookings` INNER JOIN `handyman` ON bookings.HandymanId = handyman.UserId) INNER JOIN `users` ON bookings.HandymanId = users.id) WHERE bookings.UserId = '" . $_SESSION['id'] . "' AND `uConfirmation` != 'done'  AND (`Status` = 'pending' OR `Status` = 'confirmed')  ";

                                $result = $conn->query($bookingsQuery);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 py-2">
                                            <div class="card border shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-6">
                                                                    <label class="mb-0"><small>Handyman Name</small></label>
                                                                    <h6> <?php echo $row['hmFirstName'] . " " . $row['hmLastName'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-6">
                                                                    <label class="mb-0"><small>Contact Number</small></label>
                                                                    <h6> <?php echo $row['hContactNumber'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-6">
                                                                    <label class="mb-0"><small>Service Date</small></label>
                                                                    <h6> <?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-6">
                                                                    <label class="mb-0"><small>Service</small></label>
                                                                    <h6> <?php echo $row['bServiceType'] ?></h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-10 col-md-10 col-12">
                                                                    <label class="mb-0"><small>Handyman Address</small></label>
                                                                    <h6> <?php echo $row['hAddress'] . ", " . $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-12">
                                                                    <label class="mb-0"><small>Rate</small></label>
                                                                    <h6><?php echo $row['ServicePrice'] ?>/hr</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12 col-12">
                                                            <h6 class="pt-2"> <i class="fa fa-map-marker">&emsp;</i> <?php echo $row['bBookingAddress'] . ", Brgy. " . $row['bBarangay'] . " " . $row['bCity'] . ", " . $row['bProvince'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 col-12 text-right">

                                                            <?php
                                                            if ($row['Status'] == 'pending') { ?>

                                                                <button type="button" class="edit-bk-btn p-2" data-toggle="modal" data-target="#edit_booking" data-id="<?php echo $row["booking.id"] ?>" data-toggle="tooltip" data-placement="bottom" data-fname="<?php echo $row["bFirstName"] ?>" data-lname="<?php echo $row["bLastName"] ?>" data-contact="<?php echo $row["bContact"] ?>" data-address="<?php echo $row["bBookingAddress"] ?>" data-brgy="<?php echo $row["bBarangay"] ?>" data-city="<?php echo $row["bCity"] ?>" data-province="<?php echo $row["bProvince"] ?>" data-sdate="<?php echo $row["ServiceDate"] ?>" data-edate="<?php echo $row["EndDate"] ?>" data-desc="<?php echo $row["Description"] ?>"><i class="fa fa-edit"></i></button>

                                                                <a href="query/cancelBooking.php?id=<?php echo $row['booking.id'] ?>" class="markCancel float-right p-2"> <button>Cancel</button></a>

                                                                <a href="query/uMarkDone.php?id=<?php echo $row['booking.id'] ?>" class="markDone markDone-d float-right p-2"> <button disabled data-toggle="tooltip" title="This booking is pending." data-placement="bottom">Done</button></a>

                                                            <?php
                                                            } else { 

                                                                if ($row['Status'] == 'confirmed') { ?>

                                                                    <button type="button" disabled class="edit-bk-btn p-2" data-toggle="modal" data-target="#edit_booking" data-id="<?php echo $row["booking.id"] ?>" data-toggle="tooltip" data-placement="bottom" data-fname="<?php echo $row["bFirstName"] ?>" data-lname="<?php echo $row["bLastName"] ?>" data-contact="<?php echo $row["bContact"] ?>" data-address="<?php echo $row["bBookingAddress"] ?>" data-brgy="<?php echo $row["bBarangay"] ?>" data-city="<?php echo $row["bCity"] ?>" data-province="<?php echo $row["bProvince"] ?>" data-sdate="<?php echo $row["ServiceDate"] ?>" data-edate="<?php echo $row["EndDate"] ?>" data-desc="<?php echo $row["Description"] ?>"><i class="fa fa-edit"></i></button>

                                                                    <a href="query/cancelBooking.php?id=<?php echo $row['booking.id'] ?>" class="markCancel float-right p-2"> <button disabled>Cancel</button></a>

                                                                    <a href="query/uMarkDone.php?id=<?php echo $row['booking.id'] ?>" class="markDone float-right p-2"> <button>Done</button></a>
                                                             <?php   }
                                                             } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-5">
                                            <div class="col-lg-12 justify-content-center">
                                                <h5 style="font-weight: 700;">Ooops!</h5>
                                                <h6>You do not have any active bookings as of the moment.</h6>
                                            </div>
                                            <div class="col-lg-12 py-4">
                                                <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- end of active bookings card -->

                        <!-- start of active bookings mark as done -->
                        <div class="col-lg-3 pt-4 order-lg-12 order-md-1 order-sm-1 order-xs-2 order-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Marked as Done</h6>
                                </div>
                                <?php
                                $query = "SELECT * FROM `bookings` WHERE uConfirmation = 'done' AND `UserId` = '" . $_SESSION['id'] . "' ORDER BY `booking.id` DESC LIMIT 3";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 py-2 col-md-6 col-sm-4 col-xs-4">
                                            <div class="card markedcard p-2 shadow">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-4">
                                                        <label class="text-muted">Booking ID #:</label>
                                                        <h6><i class="fa fa-check-square-o"></i> &nbsp; <?php echo $row['booking.id'] ?> </h6>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-8">
                                                        <label class="text-muted">Date</label>
                                                        <h6><?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-12 py-2 ">
                                        <div class="card text-center shadow py-3">
                                            <h6><small> There is no data.</small></h6>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Cancelled Bookings</h6>
                                </div>
                                <?php
                                $query = "SELECT * FROM `bookings` WHERE Status = 'cancelled' AND UserId = '" . $_SESSION['id'] . "' ORDER BY `booking.id` DESC LIMIT 3";

                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 col-md-6 py-2">
                                            <div class="card markedcard p-2 shadow">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="text-muted">Booking ID #:</label>
                                                        <h6><i class="fa fa-check-square-o"></i> &nbsp; <?php echo $row['booking.id'] ?></h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="text-muted">Booking Date: </label>
                                                        <h6><i class="fa fa-calendar"></i> &nbsp; <?php echo $row['BookingDate'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-3">
                                            <h6><small>There are no cancelled bookings.</small></h6>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of active bookings mark as done -->


                <!-- END OF BOOKINGS TAB -->

                <!-- START OF HISTORY TAB -->
                <div class="tab-pane fade" id="history" role="tabpanel">
                    <div class="row">
                        <!-- start of my job/s history card -->
                        <div class="col-lg-9 pt-4 order-lg-1 order-md-12 order-sm-12 order-xs-22 order-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center p-2" style="border-radius: 2px; height: 40px;">My Job/s History<i class="fa fa-info-circle float-right pt-1" data-toggle="modal" data-target="#jobHistory" ></i></h6>
                                </div>
                                <?php
                                $bookingsQuery = "SELECT * FROM `bookings` INNER JOIN `users` ON bookings.UserId = users.id WHERE  `HandymanId` = '" . $_SESSION['id'] . "' AND `Status` = 'confirmed' AND `hmConfirmation` = 'done' ORDER BY `booking.id` DESC LIMIT 3 ";

                                $result = $conn->query($bookingsQuery);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 py-2">
                                            <div class="card border shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-6 col-6">
                                                                    <label class="mb-0"><small>Customer</small></label>
                                                                    <h6> <?php echo $row['bFirstName'] . " " . $row['bLastName'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-6">
                                                                    <label class="mb-0"><small>Contact Number</small></label>
                                                                    <h6> <?php echo $row['bContact'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 col-6">
                                                                    <label class="mb-0"><small>Service Date</small></label>
                                                                    <h6> <?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                                </div>

                                                                <div class="col-lg-2 col-md-6 col-6">
                                                                    <label class="mb-0"><small>Service</small></label>
                                                                    <h6> <?php echo $row['bServiceType'] ?></h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="mb-0"><small>Customer Address</small></label>
                                                                    <h6> <?php echo $row['bBookingAddress'] . ", " . $row['bBarangay'] . " " . $row['bCity'] . ", " . $row['bProvince'] ?></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-12 text-right">
                                                            <h6 class="pt-2">Work Complete</h6></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                <?php
                                } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-5">
                                            <div class="col-lg-12 justify-content-center">
                                                <h5 style="font-weight: 700;">Ooops!</h5>
                                                <h6>Your job history seems empty.</h6>
                                            </div>
                                            <div class="col-lg-12 py-4">
                                                <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <!-- end of my job/s history card -->

                        <!-- start of recent ratings card -->
                        <div class="col-lg-3 pt-4 order-lg-12 order-md-1 order-xs-1 order-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Recent Ratings</h6>
                                </div>
                                <?php
                                $query = "SELECT * FROM `ratings` INNER JOIN `bookings` ON ratingId = `booking.id` WHERE `Ratee` = '" . $_SESSION['id'] . "' ORDER BY ratingId DESC LIMIT 3";

                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12 col-md-6 py-2">
                                            <div class="card markedcard p-2 shadow">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="text-muted">Booking ID #:</label>
                                                        <h6><i class="fa fa-check-square-o"></i> &nbsp; <?php echo $row['booking.id'] ?></h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="text-muted">Rated: </label>
                                                        <h6><i class="fa fa-star"></i> &nbsp; <?php echo $row['rating'] ?></h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="text-muted">Review: </label>
                                                        <h6><i class="fa fa-pencil-square-o"></i> &nbsp; <?php echo $row['review'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-12 py-2">
                                        <div class="card text-center shadow py-3">
                                            <h6><small> There is no data.</small></h6>
                                        </div>
                                    </div>
                                <?php } ?>



                            </div>
                        </div>
                        <!-- end of recent ratings card -->
                    </div>

                    <!-- start of bookings history card -->
                    <div class="row">
                        <div class="col-lg-9 pt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center p-2" style="border-radius: 2px; height: 40px;">Bookings History<i class="fa fa-info-circle float-right pt-1" data-toggle="modal" data-target="#bookHistory"></i></h6>
                                </div>
                                <?php
                                $bookingsQuery = "SELECT * FROM `bookings` INNER JOIN `handyman` ON bookings.HandymanId = handyman.UserId WHERE bookings.UserId = '" . $_SESSION['id'] . "' AND uRate != 'Yes' AND uConfirmation = 'done' AND Status = 'confirmed' ORDER BY `booking.id` ";

                                $result = $conn->query($bookingsQuery);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="col-lg-12  py-2">
                                            <div class="card border shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-6">
                                                                    <label class="mb-0"><small>Handyman Name</small></label>
                                                                    <h6> <?php echo $row['hmFirstName'] . " " . $row['hmLastName'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-6">
                                                                    <label class="mb-0"><small>Contact Number</small></label>
                                                                    <h6> <?php echo $row['hContactNumber'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-6">
                                                                    <label class="mb-0"><small>Service Date</small></label>
                                                                    <h6> <?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                                </div>

                                                                <div class="col-lg-2 col-md-2 col-6">
                                                                    <label class="mb-0"><small>Service</small></label>
                                                                    <h6> <?php echo $row['bServiceType'] ?></h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-10 col-md-10 col-12">
                                                                    <label class="mb-0"><small>Handyman Address</small></label>
                                                                    <h6> <?php echo $row['hAddress'] . ", " . $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></h6>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2">
                                                                    <label class="mb-0"><small>Rate</small></label>
                                                                    <h6><?php echo $row['ServicePrice'] ?>/hr</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-lg-9 col-md-12">
                                                            <h6 class="pt-2"> <i class="fa fa-map-marker">&emsp;</i> <?php echo $row['bBookingAddress'] . ", Brgy. " . $row['bBarangay'] . " " . $row['bCity'] . ", " . $row['bProvince'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12">
                                                            <?php
                                                            if ($row['uConfirmation'] == 'done' && $row['hmConfirmation'] == 'done') { ?>
                                                                <a data-toggle="modal" class="rate-btn float-right pt-1" href="#rateBooking" data-id="<?php echo $row['booking.id'] ?>"><button><i class="fa fa-star"></i>&nbsp;Rate Booking</button></a>
                                                            <?php
                                                            } else { ?>
                                                                <a data-toggle="modal" class="rate-btn-d float-right pt-1" href="#rateBooking" data-id="<?php echo $row['booking.id'] ?>"><button disabled data-toggle="tooltip" title="Rating will be available when both sides marked the booking as done." data-placement="bottom"><i class="fa fa-star"></i>&nbsp;Rate Booking</button></a>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else { ?>
                                    <div div class="col-12 py-2">
                                        <div class="card text-center shadow py-5">
                                            <div class="col-lg-12 justify-content-center">
                                                <h5 style="font-weight: 700;">Ooops!</h5>
                                                <h6>Your booking history seems empty.</h6>
                                            </div>
                                            <div class="col-lg-12 py-4">
                                                <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                    <!-- end of bookings history card -->
                </div>
                <!-- END OF HISTORY TAB -->

                <!-- START OF RATINGS TAB -->
                <div class="tab-pane fade" id="ratings" role="tabpanel">
                    <div class="row">
                        <!-- start of statistics card -->
                        <div class="col-lg-2 pt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="title-bar text-center shadow pt-1 w-100" style="height: 30px;">Statistics</h6>
                                </div>
                                <div class="col-lg-12 col-md-6 col-xs-6 col-6 py-2">
                                    <?php
                                    $query = "SELECT ROUND(AVG(rating),2) AS AveragePrice FROM `ratings` INNER JOIN `users` ON ratings.Ratee = users.id WHERE users.id= '" . $_SESSION['id'] . "'";

                                    $result = $conn->query($query);
                                    $row = $result->fetch_assoc(); ?>
                                    <div class="card ratecard py-2 shadow">
                                        <div class="row justify-content-center">
                                            <div class="col-12 text-center">
                                                <h6 class="text-muted"><small>Average Rating</small> </h6>
                                            </div>
                                            <?php if ($row['AveragePrice'] == "") {
                                                echo "<div class='col-12 text-center'>
                                                <h6>0 &nbsp;<i class='fa fa-star'></i></h6></div>";
                                            } else { ?>
                                                <div class="col-12 text-center">
                                                    <h6><?php echo $row['AveragePrice'] ?>&nbsp; <i class="fa fa-star"></i> </h6>
                                                </div> <?php }  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-xs-6 col-6 py-2">

                                    <?php
                                    $query = "SELECT * FROM `bookings` WHERE HandymanID = '" . $_SESSION['id'] . "' AND Status = 'confirmed' ";

                                    $result = $conn->query($query);
                                    $total = $result->num_rows; ?>
                                    <div class="card ratecard py-2 shadow">
                                        <div class="row justify-content-center">
                                            <div class="col-12 text-center">
                                                <h6 class="text-muted"><small>Total Bookings</small> </h6>
                                            </div>
                                            <div class="col-12 text-center">
                                                <h6><?php echo $total ?> &nbsp; <i class="fa fa-book"></i> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of statistics card -->

                        <!-- start of ratings received card -->
                        <div class="col-lg-10 pt-4">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <h6 class="title-bar text-center py-2" style="border-radius: 2px; height: 40px;">Ratings Received (Recent)</h6>

                                    <?php
                                    $ratingsQuery = "SELECT * FROM `ratings` INNER JOIN `bookings` ON ratingId = `booking.id` WHERE `Ratee` = '" . $_SESSION['id'] . "' ORDER BY ratingId DESC LIMIT 3";

                                    $result = $conn->query($ratingsQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>

                                            <div class="card border my-2 shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-8">
                                                            <label><small> Customer</small></label>
                                                            <h6><?php echo $row['bFirstName'] . " " . $row['bLastName'] ?></h6>
                                                        </div>

                                                        <div class="col-lg-3 col-md-3 col-4">
                                                            <label> <small>Rating</small> </label>
                                                            <h6><?php echo $row['rating'] ?> &nbsp; <i class="fa fa-star"></i></h6>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-12">
                                                            <label> <small> Review</small></label>
                                                            <h6><?php echo $row['review'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                    } else { ?>

                                        <div class="card text-center shadow py-5">
                                            <div class="col-lg-12 justify-content-center">
                                                <h5 style="font-weight: 700;">Ooops!</h5>
                                                <h6> It feels empty in here.</h6>
                                            </div>
                                            <div class="col-lg-12 py-4">
                                                <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                            </div>
                                        </div>

                                    <?php
                                    } ?>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="title-bar text-center py-2" style="border-radius: 2px; height: 40px;">Rated Bookings (Recent)</h6>
                                    <?php
                                    $ratingsQuery = "SELECT * FROM `ratings` INNER JOIN `bookings` ON ratingId = `booking.id` WHERE `Rater` = '" . $_SESSION['id'] . "' ORDER BY ratingId DESC LIMIT 3";

                                    $result = $conn->query($ratingsQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>

                                            <div class="card border shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label><small>ID#</small> </label>
                                                            <h6><?php echo $row['ratingId'] ?></h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <label><small>Handyman</small> </label>
                                                            <h6><?php echo $row['hmFirstName'] . " " . $row['hmLastName'] ?></h6>
                                                        </div>
                                                        <div class="col-3">
                                                            <label> <small>Rating</small> </label>
                                                            <h6><?php echo $row['rating'] ?> &nbsp; <i class="fa fa-star"></i></h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <label><small>Review</small> </label>
                                                            <h6><?php echo $row['review'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                    } else { ?>

                                        <div class="card text-center shadow py-5">
                                            <div class="col-lg-12 justify-content-center">
                                                <h5 style="font-weight: 700;">Ooops!</h5>
                                                <h6> It feels empty in here.</h6>
                                            </div>
                                            <div class="col-lg-12 py-4">
                                                <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                            </div>
                                        </div>

                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <!-- end of ratings received card -->
                    </div>
                </div>
                <!-- END OF RATINGS TAB -->
            </div>
            <!-- END HANDYMAN ROLE -->
    </div>
<?php }

        // USER ROLE
        else if ($_SESSION['role'] == "user") { ?>

    <div class="tab-content clearfix" id="myTabContent">
        <!-- BOOKINGS TAB -->
        <div class="tab-pane active" id="active-bookings" role="tabpanel">
            <div class="row">
                <!-- start of active bookings card-->
                <div class="col-lg-9 pt-4 order-lg-1 order-md-12 order-xs-12 order-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center p-2" style="border-radius: 2px; height: 40px;">Active Bookings<i class="fa fa-info-circle float-right pt-1" data-toggle="modal" data-target="#uactive"></i></h6>
                        </div>
                        <?php
                        $bookingsQuery = "SELECT * FROM ((`bookings` INNER JOIN `handyman` ON bookings.HandymanId = handyman.UserId) INNER JOIN `users` ON bookings.HandymanId = users.id) WHERE bookings.UserId = '" . $_SESSION['id'] . "' AND `uConfirmation` != 'done'  AND (`Status` = 'pending' OR `Status` = 'confirmed') ";

                        $result = $conn->query($bookingsQuery);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-lg-12 col-md-12 py-2">
                                    <div class="card border shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <label class="mb-0"><small>Handyman</small></label>
                                                            <h6> <?php echo $row['hmFirstName'] . " " . $row['hmLastName'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <label class="mb-0"><small>Contact Number</small></label>
                                                            <h6> <?php echo $row['hContactNumber'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-6">
                                                            <label class="mb-0"><small>Service Date</small></label>
                                                            <h6> <?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-6">
                                                            <label class="mb-0"><small>Service</small></label>
                                                            <h6> <?php echo $row['bServiceType'] ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-10 col-md-10">
                                                            <label class="mb-0"><small>Handyman Address</small></label>
                                                            <h6> <?php echo $row['hAddress'] . ", " . $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2">
                                                            <label class="mb-0"><small>Rate</small></label>
                                                            <h6><?php echo $row['ServicePrice'] ?>/hr</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <h6 class="pt-2"> <i class="fa fa-map-marker">&emsp;</i> <small><?php echo $row['bBookingAddress'] . ", Brgy. " . $row['bBarangay'] . " " . $row['bCity'] . ", " . $row['bProvince'] ?></small></h6>
                                                </div>
                                                <div class="col-lg-4 col-md-4 text-right">
                                                    <?php if ($row['Status'] == 'pending') { ?>
                                                        <button type="button" class="edit-bk-btn" data-toggle="modal" data-target="#edit_booking" data-id="<?php echo $row["booking.id"] ?>" data-toggle="tooltip" data-placement="bottom" data-fname="<?php echo $row["bFirstName"] ?>" data-lname="<?php echo $row["bLastName"] ?>" data-contact="<?php echo $row["bContact"] ?>" data-address="<?php echo $row["bBookingAddress"] ?>" data-brgy="<?php echo $row["bBarangay"] ?>" data-city="<?php echo $row["bCity"] ?>" data-province="<?php echo $row["bProvince"] ?>" data-sdate="<?php echo $row["ServiceDate"] ?>" data-edate="<?php echo $row["EndDate"] ?>" data-desc="<?php echo $row["Description"] ?>"><i class="fa fa-edit"></i></button>

                                                        <a href="query/cancelBooking.php?id=<?php echo $row['booking.id'] ?>" class="markCancel pt-1 mx-2"> <button>Cancel</button></a>

                                                        <a href="query/uMarkDone.php?id=<?php echo $row['booking.id'] ?>" class="markDone markDone-d pt-1"> <button disabled data-toggle="tooltip" title="This booking is pending." data-placement="bottom">Done</button></a>

                                                    <?php } else { 
                                                        if ($row['Status'] == 'confirmed') { ?>

                                                        <button type="button" disabled class="edit-bk-btn p-2" data-toggle="modal" data-target="#edit_booking" data-id="<?php echo $row["booking.id"] ?>" data-toggle="tooltip" data-placement="bottom" data-fname="<?php echo $row["bFirstName"] ?>" data-lname="<?php echo $row["bLastName"] ?>" data-contact="<?php echo $row["bContact"] ?>" data-address="<?php echo $row["bBookingAddress"] ?>" data-brgy="<?php echo $row["bBarangay"] ?>" data-city="<?php echo $row["bCity"] ?>" data-province="<?php echo $row["bProvince"] ?>" data-sdate="<?php echo $row["ServiceDate"] ?>" data-edate="<?php echo $row["EndDate"] ?>" data-desc="<?php echo $row["Description"] ?>"><i class="fa fa-edit"></i></button>

                                                        <a href="query/cancelBooking.php?id=<?php echo $row['booking.id'] ?>" class="markCancel float-right p-2"> <button disabled>Cancel</button></a>

                                                        <a href="query/uMarkDone.php?id=<?php echo $row['booking.id'] ?>" class="markDone float-right p-2"> <button>Done</button></a>

                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } ?>
                        <?php
                        } else { ?>
                            <div div class="col-12 py-2">
                                <div class="card text-center shadow py-5">
                                    <div class="col-lg-12 justify-content-center">
                                        <h5 style="font-weight: 700;">Ooops!</h5>
                                        <h6> You have no active bookings as of the moment.</h6>
                                    </div>
                                    <div class="col-lg-12 py-4">
                                        <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
                <!-- end of active bookings card-->

                <!-- start of active bookings mark as done -->
                <div class="col-lg-3 pt-4 order-lg-12 order-md-1 order-xs-1 order-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Marked as Done</h6>
                        </div>
                        <?php
                        $query = "SELECT * FROM `bookings` WHERE uConfirmation = 'done' AND `UserId` = '" . $_SESSION['id'] . "' ORDER BY `booking.id` DESC LIMIT 3 ";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-lg-12 col-md-4 py-2">
                                    <div class="card markedcard p-2 shadow">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="text-muted">Booking ID #:</label>
                                                <h6><i class="fa fa-check-square-o">&nbsp;</i><?php echo $row['booking.id'] ?> </h6>
                                            </div>
                                            <div class="col-6">
                                                <label class="text-muted">Date</label>
                                                <h6><i class="fa fa-calendar-o">&nbsp;</i><?php echo $row['ServiceDate'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-lg-12 py-2">
                                <div class="card text-center shadow py-3">
                                    <h6><small>There is no data.</small> </h6>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Cancelled Bookings</h6>
                        </div>
                        <?php
                        $query = "SELECT * FROM `bookings` WHERE UserId = '" . $_SESSION['id'] . "' AND Status = 'cancelled' ORDER BY `booking.id` DESC LIMIT 3 ";

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) { ?>

                                <div class="col-12 py-2 mb-2">
                                    <div class="card markedcard p-2 shadow">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="text-muted">ID :</label>
                                                <h6><i class="fa fa-check-square-o"></i>&nbsp;<?php echo $row['booking.id'] ?></h6>
                                            </div>
                                            <div class="col-6">
                                                <label class="text-muted">Booking Date: </label>
                                                <h6><i class="fa fa-star"></i>&nbsp;<?php echo $row['BookingDate'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="col-12 py-2 mb-2">
                                <div class="card text-center shadow py-3">
                                    <h6> <small>There are no cancelled bookings.</small> </h6>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end of active bookings mark as done -->
            </div>
        </div>
        <!-- END OF BOOKINGS TAB -->

        <!-- HISTORY TAB -->
        <div class="tab-pane fade" id="history" role="tabpanel">
            <div class="row">
                <!-- start of booking history card -->
                <div class="col-lg-9 pt-4 order-lg-1 order-md-12 order-xs-12 order-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center p-2" style="border-radius: 2px; height: 40px;">Bookings History<i class="fa fa-info-circle float-right pt-1" data-toggle="modal" data-target="#bookHistory"></i></h6>
                        </div>
                        <?php
                        $bookingsQuery = "SELECT * FROM ((`bookings` INNER JOIN `handyman` ON bookings.HandymanId = handyman.UserId) INNER JOIN `users` ON bookings.HandymanId = users.id)  WHERE bookings.UserId = '" . $_SESSION['id'] . "' AND `uRate` != 'Yes' AND uConfirmation = 'done' AND Status = 'confirmed'  ORDER BY `booking.id` DESC";

                        $result = $conn->query($bookingsQuery);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-lg-12  py-2">
                                    <div class="card border shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <label class="mb-0"><small>Handyman</small></label>
                                                            <h6> <?php echo $row['hmFirstName'] . " " . $row['hmLastName'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <label class="mb-0"><small>Contact Number</small></label>
                                                            <h6> <?php echo $row['hContactNumber'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-6">
                                                            <label class="mb-0"><small>Service Date</small></label>
                                                            <h6> <?php echo $row['ServiceDate'] ?> - <?php echo $row['EndDate'] ?></h6>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-6">
                                                            <label class="mb-0"><small>Service</small></label>
                                                            <h6> <?php echo $row['bServiceType'] ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-10 col-md-10">
                                                            <label class="mb-0"><small>Handyman Address</small></label>
                                                            <h6> <small> <?php echo $row['hAddress'] . ", " . $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></small></h6>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2">
                                                            <label class="mb-0"><small>Rate</small></label>
                                                            <h6><?php echo $row['ServicePrice'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <h6 class="pt-2"> <i class="fa fa-map-marker">&emsp;</i> <?php echo $row['bBookingAddress'] . ", Brgy. " . $row['bBarangay'] . " " . $row['bCity'] . ", " . $row['bProvince'] ?></h6>
                                                </div>
                                                <div class="col-lg-4 col-md-4 text-right">
                                                    <?php
                                                    if ($row['uConfirmation'] == 'done' && $row['hmConfirmation'] == 'done' && $row['uRate'] != 'Yes') { ?>
                                                        <a data-toggle="modal" class="rate-btn float-right pt-1" href="#rateBooking" data-id="<?php echo $row['booking.id'] ?>"><button><i class="fa fa-star"></i>&nbsp;Rate Booking</button></a>
                                                    <?php
                                                    } else { ?>
                                                        <a data-toggle="modal" class="rate-btn-d float-right pt-1" href="#rateBooking" data-id="<?php echo $row['booking.id'] ?>"><button disabled data-toggle="tooltip" title="Rating will be available if both sides marked the booking as done." data-placement="bottom"><i class="fa fa-star"></i>&nbsp;Rate Booking</button></a>
                                                    <?php
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div div class="col-12 py-2">
                                <div class="card text-center shadow py-5">
                                    <div class="col-lg-12 justify-content-center">
                                        <h5 style="font-weight: 700;">Ooops!</h5>
                                        <h6>Your booking history seems empty.</h6>
                                    </div>
                                    <div class="col-lg-12 py-4">
                                        <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end of booking history card -->

                <!-- start of recent ratings card -->
                <div class="col-lg-3 pt-4 order-lg-12 order-md-1 order-xs-1 order-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center shadow pt-1" style="height: 30px;">Recent Ratings</h6>
                        </div>
                        <?php
                        $query = "SELECT * FROM `ratings` INNER JOIN `bookings` ON `ratingId` = `booking.id` WHERE `Rater` = '" . $_SESSION['id'] . "' ORDER BY ratingId DESC LIMIT 3";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-12 py-2 mb-2">
                                    <div class="card markedcard p-2 shadow">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="text-muted">Booking ID #:</label>
                                                <h6><i class="fa fa-check-square-o"></i>&nbsp;<?php echo $row['ratingId'] ?></h6>
                                            </div>
                                            <div class="col-6">
                                                <label class="text-muted">You rated: </label>
                                                <h6><i class="fa fa-star"></i>&nbsp;<?php echo $row['rating'] ?></h6>
                                            </div>
                                            <div class="col-12">
                                                <label class="text-muted">Review: </label>
                                                <h6><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $row['review'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-12 py-2 mb-2">
                                <div class="card text-center shadow py-3">
                                    <h6> <small>There is no data.</small> </h6>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end of recent ratings card -->
            </div>
        </div>
        <!-- END OF HISTORY TAB -->

        <!-- RATINGS TAB-->
        <div class="tab-pane fade" id="ratings" role="tabpanel">
            <div class="row">
                <!-- start of statistics card -->
                <div class="col-lg-3 pt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center shadow pt-1 w-100" style="height: 30px;">Statistics</h6>
                        </div>
                        <div class="col-lg-12 py-2">
                            <?php
                            $query = "SELECT * FROM `bookings` WHERE UserId = '" . $_SESSION['id'] . "'";
                            $result = $conn->query($query);
                            $total = $result->num_rows; ?>
                            <div class="card ratecard py-2 shadow">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <h6><small> Total Bookings</small></h6>
                                    </div>
                                    <div class="col-12 text-center">
                                        <h6><?php echo $total ?> &nbsp; <i class="fa fa-book"></i> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of statistics card -->

                <!-- start of rated bookings card -->
                <div class="col-lg-9 pt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="title-bar text-center py-2" style="border-radius: 2px; height: 40px;">Rated Bookings (Recent)</h6>
                        </div>
                        <?php
                        $ratingsQuery = "SELECT * FROM `ratings` INNER JOIN `bookings` ON ratingId = `booking.id` WHERE Rater = '" . $_SESSION['id'] . "' ORDER BY ratingId DESC LIMIT 3";

                        $result = $conn->query($ratingsQuery);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-lg-12 py-2">
                                    <div class="card border shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-4 col-6">
                                                    <label>Booking ID#</label>
                                                    <h6><?php echo $row['ratingId'] ?></h6>
                                                </div>
                                                <div class="col-lg-2 col-md-4 col-6">
                                                    <label>You rated:</label>
                                                    <h6><?php echo $row['rating'] ?> &nbsp; <i class="fa fa-star"></i></h6>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <label>Handyman</label>
                                                    <h6><?php echo $row['hmFirstName'] . " " . $row['hmLastName'] ?></h6>
                                                </div>

                                                <div class="col-lg-4 col-md-12 col-12">
                                                    <label>Review</label>
                                                    <h6><?php echo $row['review'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div div class="col-lg-12 py-2">
                                <div class="card text-center shadow py-5">
                                    <div class="col-lg-12 justify-content-center">
                                        <h5 style="font-weight: 700;">Ooops!</h5>
                                        <h6>It feels empty in here.</h6>
                                    </div>
                                    <div class="col-lg-12 py-4">
                                        <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end of rated bookings card -->
            </div>
        </div>
        <!-- END OF RATINGS TAB-->
    </div>
<?php } ?>
<!-- END OF USER ROLE -->
</div>
<!-- end of history nav container -->

<!--RATE BOOKING MODAL-->
<div class="rate-booking">
    <div id="rateBooking" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <form action="query/postMethod.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="" src="https://drive.google.com/uc?export=view&id=1rF6DtHcPRx5S8dJRl1RcjFjJ6E92yn3d" alt="" width="100px">
                        <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                        </div>
                        <span class='result'>0</span>
                        <input type="hidden" name="Rating">
                        <input type="hidden" name="bookingId" id="bookId">
                        <h6 class="my-2" style="font-weight: bold; color: #b9732f;">Write a review</h6>
                        <textarea class="my-2" name="review" id="review" cols="30" rows="3" placeholder="Type here"></textarea>
                        <button name="submit-rating" class="btn-rate mt-2 w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END OF RATE BOOKING MODAL -->

<!-- START OF EDIT BOOKING MODAL -->
<div class="class">
    <div id="edit_booking" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="pt-2" style="color: #b9732f;"><b>Edit Booking Details</b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <form action="query/postMethod.php" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <input type="hidden" name="id" id="id">
                                            <small>First Name</small>
                                            <input type="text" class="form-control shadow-sm" id="fname" name="fname" required>
                                        </div>
                                        <div class="col-lg-6 pb-2">
                                            <small>Last Name</small>
                                            <input type="text" class="form-control shadow-sm" id="lname" name="lname" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <small>Province</small>
                                            <select class="form-control shadow-sm input-lg" name="province" id="province" required>
                                                <option value="">Select Province</option>
                                                <?php
                                                $query = "SELECT * FROM `province` WHERE status = 1 ORDER BY province_name ASC";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option value="' . $row['province_name'] . '"> ' . $row['province_name'] . ' </option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Province not available</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 pb-2">
                                            <small>City/Municipality</small>
                                            <select class="form-control shadow-sm input-lg" name="city" id="city" required>
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <small>Barangay</small>
                                            <select class="form-control shadow-sm" style="max-height: 75px" name="barangay" id="barangay" class="form-control input-lg" required>
                                                <option value="">Select Barangay</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <small>Contact #</small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+63</div>
                                                </div>
                                                <input type="text" class="form-control shadow-sm" id="contact" name="contact" placeholder="Contact Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <small>Home Address (Unit No., Street No.)</small>
                                            <input type="text" class="form-control shadow-sm" id="address" name="address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <small>Starting Date</small>
                                            <input type="date" class="form-control shadow-sm" id="sdate" name="sdate">
                                        </div>
                                        <div class="col-lg-6">
                                            <small>End Date</small>
                                            <input type="date" class="form-control shadow-sm" id="edate" name="edate">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <small for="desc">Description</small>
                                    <textarea type="text" class="form-control" id="desc" name="desc" rows="3" placeholder="State your home repair concerns."></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6 my-2">
                                        <div class="form-group">
                                            <input type="submit" name="update_booking" class="btn btn-update w-100" value="Update">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group my-2">
                                            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF EDIT BOOKING MODAL -->


<!-- tooltip modals -->
<div class="modal fade" id="jobHistory" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <small>Your three recent completed works are listed here.</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bookHistory" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <small>Bookings that are marked as done and are subject to rating are listed here.</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hmactive" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <small>Bookings that are pending and confirmed are listed here.<br><br>You can edit and/or cancel a pending booking, however you cannot edit and/or cancel a confirmed booking.</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uactive" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <small>Bookings that are pending and confirmed are listed here.<br><br>You can edit and/or cancel a pending booking, however you cannot edit and/or cancel a confirmed booking.</small>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ubookingHistory" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <small>Bookings that are marked as done and are subject to rating are listed here.</small>
            </div>
        </div>
    </div>
</div>
<!-- end of tooltip modals -->

<script>
    //SCRIPT FOR SUBMITTING RATING 
    $(document).on("click", ".rate-btn", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
    });
    // END

    //SCRIPT FOR RATE BOOKING MODAL
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating: ' + rating);
            $(this).parent().find('input[name=Rating]').val(rating); //add rating value to input field
        });
    });
    // END

    // start of script for tooltip
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    }); // End of start of script for tooltip


    //SCRIPT FOR EDIT BOOKING MODAL
    $('.edit-bk-btn').click(function() {
        var id = $(this).data('id');
        var fname = $(this).data('fname');
        var lname = $(this).data('lname');
        var contact = $(this).data('contact');
        var address = $(this).data('address');
        var sdate = $(this).data('sdate');
        var edate = $(this).data('edate');
        var desc = $(this).data('desc');

        $('#id').val(id);
        $('#fname').val(fname);
        $('#lname').val(lname);
        $('#contact').val(contact);
        $('#address').val(address);
        $('#sdate').val(sdate);
        $('#edate').val(edate);
        $('#desc').val(desc);
    });
    // END //

    // Dependent drop-down matrix
    $(document).ready(function() {
        $('#province').on('change', function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/d_dropDown.php',
                    data: 'province_id=' + provinceID,
                    success: function(html) {
                        $('#city').html(html);
                        $('#barangay').html('<option value="">Select City first</option>');
                    }
                });
            } else {
                $('#city').html('<option value="">Select Province first</option>');
                $('#barangay').html('<option value="">Select City first</option>');
            }
        });
        $('#city').on('change', function() {
            var cityID = $(this).val();
            if (cityID) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/d_dropDown.php',
                    data: 'city_id=' + cityID,
                    success: function(html) {
                        $('#barangay').html(html);
                    }
                });
            } else {
                $('#barangay').html('<option value="">Select City first</option>');
            }
        });
    });
    // End of Dependent drop-down matrix
</script>

</body>

</html>