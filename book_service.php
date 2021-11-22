<?php

session_start();

include 'configs/connect.php';

if ($_SESSION['loggedin'] != "true") {
    header('Location: signin.php');
}

?>

<script type="text/javascript">
    function active() {
        var sb = document.getElementById('search_details');
        if (sb.value == '') {
            sb.value = ''
            sb.placeholder = ''
        }
    }

    function inactive() {
        var sb = doument.getElementById('search_details');
        if (sb.value == '') {
            sb.value = ''
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


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
        border-color: #b9732f;
        color: #b9732f;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
    }
    .footer {
        left: 0;
        bottom: 0;
        height: 40px;
        width: 100%;
        background-color: #606060;
        color: white;
        font-size: 14px;
        text-align: center;
    }
    .container {
        padding-top: 2%;
        padding-bottom: 2%;
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
    }
    .apply-btn button {
        padding: 12px 24px;
        border-color: #b9732f;
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
        font-size: 12px;
        border-style: none;
    }
    .book-btn:hover {
        background-color: #da8334;
    }
    .view-btn button {
        padding: 8px 10px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 500;
        font-size: 12px;
        border-style: none;
    }
    .view-btn:hover {
        background-color: #606060;
    }
    .nav-pills>li>a.active {
        background-color: #606060 !important;
    }
    .btn-primary {
        background-color: #b0732f !important;
        border-color: #b0732f;
    }
    .btn-primary:hover {
        background-color: #da8334 !important;
        border-color: #b0732f;
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
    .cardbook-btn {
        padding: 0px 10px;
        background-color: transparent;
        color: #b9732f;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .cardview-btn {
        padding: 0px 10px;
        background-color: transparent;
        color: #606060;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .cardview-btn:hover {
        color: #404040;
    }
    .cardbook-btn:hover {
        color: #da8334;
    }
    .search-btn {
        color: #fff;
        background-color: #b9732f;
        border-style: none;
        width: 50px;
        border-radius: 0px 3px 3px 0px;
    }
    .search-btn:hover {
        background-color: #da8334;
    }

    .pindutan button {
        padding: 5px 16px;
        border-radius: 6px;
        background-color: #fff;
        font-size: 12px;
        border-style: none;
        border-width: thin;
        border: 1px solid #c5c5c5;
    }

    .pindutan button:hover {
        background-color: #b9732f;
        color: #fff;
        border-style: none;
    }

    .card-titles {
        color: #b9732f;
        font-weight: 600;
        font-size: 16px !important;
    }

    .c-recommended:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }

    .howit i {
        color: #404040;
        font-size: 20px;
    }
    .card-foot {
        color: red;
        background-color: transparent;
    }

    .howit:hover {
        border-style: none;
        border-width: thin;
        border: 1px solid #b9732f;
    }

    #profileDisplay {
        display: block;
        border-radius: 50%;
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin: auto;
        
    }

    .sort-btn {
        float: right;
        color: #404040;
        padding: 4px;
        font-size: 14px;
        font-weight: 600;
        border-style: none;
        background-color: transparent;
    }
    .modal-body {
        border-top: 1px solid #b9732f;
    }
    .check-box label {
        color: #b9732f;
    }

    .tooltip {
        font-size: 0.65rem;
    }

    .tooltip-inner {
        background-color: #404040;
    }

    .tooltip.bs-tooltip-auto[x-placement^=bottom] .arrow::before,
    .tooltip.bs-tooltip-bottom .arrow::before {
        border-bottom-color: #404040;
    }

    .fa-star,
    .fa-star-o,
    .fa-star-half-o {
        color: #b9732f;
    }
    .titleeee {
        color: #b9732f;
    }

    .credentials {
        padding: 2px 12px;
        background-color: #b9732f;
        border-style: none;
        border-radius: 2px;
    }
    .credentials a{
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        background-color: transparent;
        border-style: none;
        text-decoration: none;
    }
    .credentials:hover {
        background-color: #da8334;
    }
    .view-modal-header {
        color: #b9732f;
        font-size: 16px;
        font-weight: 600;
    }
    .thumbnail {
        overflow-y: auto;
    }
    form input[type="text send_email"],
    form input[type="text"],
    form select[type="dropdown"],
    form input[type="date"],
    form textarea[type="text"],
    .input-group-text {
        font-size: 14px;
    }
    form input[type="text send_email"]:focus,
    form input[type="text"]:focus,
    form input[type="submit"]:active,
    form select[type="dropdown"]:hover,
    form select[type="dropdown"]:focus,
    form input[type="date"]:focus,
    form textarea[type="text"]:focus {
        box-shadow: none;
        border-color: #da8334;
    }
</style>

<body>

    <!-- navigation bar -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/home_aide/assets/";
    include($IPATH . "header.php"); ?>
    <!-- end of navigation bar -->

    <!-- start of container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="img-container d-none d-lg-block">
                    <img src="https://drive.google.com/uc?export=view&id=1CMoUvY8CPZZ07up8ldzD3ylcEFOWh7MC" class="" alt="" width="400px">
                </div> 
                <!-- search box -->
                <form action="" method="POST" class="form-inline pt-4">
                    <div class="input-group shadow-sm w-100">
                        <input type="text" class="form-control" list="suggestions" placeholder="Search" name="search_details" id="search_details" />

                        <!-- di pa nagana  sa firefox-->
                        <datalist id="suggestions">
                            <?php
                                $query = "SELECT keyword, count(keyword) cnt FROM `searches` WHERE sID = '".$_SESSION['id']."' GROUP BY keyword ORDER BY cnt DESC LIMIT 5";
                                $result = $conn -> query($query);

                                if ($result -> num_rows > 0) {

                                    while ($row = $result -> fetch_assoc()) { ?>
                                    
                                        <option value="<?php echo $row['keyword'] ?>"><?php echo $row['keyword'] ?></option>

                                        <?php
                                    }
                                }
                            ?>
                        </datalist>

                        <div class="input-group-append">
                            <button class="search-btn" type="submit" name="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        
                    </div>
                </form>
                <!-- end search box -->

                <!-- start of most-searched keyword button -->
                <form action="" method="POST">
                    <div class="row pindutan text-center pt-3">
                        <div class="col-12">
                             <small><b>Popular keyword</b></small>
                        </div>    
                        <div class="col-12">
                            <?php 
                            $selectButtons = "SELECT keyword, count(keyword) cnt FROM `searches` GROUP BY keyword ORDER BY cnt DESC LIMIT 5 ";

                            $result = $conn -> query($selectButtons); 
                            
                            if ($result -> num_rows > 0) {

                                while ($row = $result -> fetch_assoc()) { ?>

                                    <button class="shadow-sm mt-2" type="submit" name="msbutton" value="<?php echo $row['keyword']?>"><?php echo $row['keyword']?></button>
                          <?php } 
                            } ?>

                        </div>
                    </div>
                </form>
                <!-- end of most-searched keyword button -->

            </div>
        </div>

        <!-- start of how it work cards-->
        <div class="row justify-content-center p-4 mt-2">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-3 px-1">
                        <div class="card howit shadow-sm" data-toggle="tooltip" title="Search based on your preference." data-placement="bottom">
                            <div class="card-body d-flex justify-content-between" >
                                <h6 class="d-none d-md-block">Search</h6>
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 px-1">
                        <div class="card howit shadow-sm" data-toggle="tooltip" title="Choose from the variety of recommended services and handymen." data-placement="bottom">
                            <div class="card-body d-flex justify-content-between" >
                                <h6 class="d-none d-md-block">Choose</h6>
                                <i class="fa fa-mouse-pointer"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 px-1">
                        <div class="card howit shadow-sm" data-toggle="tooltip" title="Book the service of your chosen Handyman." data-placement="bottom">
                            <div class="card-body d-flex justify-content-between" >
                                <h6 class="d-none d-md-block">Book</h6>
                                <i class="fa fa-book"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 px-1">
                        <div class="card howit shadow-sm" data-toggle="tooltip" title="Booking Complete!" data-placement="bottom">
                            <div class="card-body d-flex justify-content-between">
                                <h6 class="d-none d-md-block float-center">Done!</h6>
                                <i class="fa fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of how it work cards-->

        <!-- start recommended cards-->
        <div class="row justify-content-center pt-2">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pb-2" style="color: #b9732f;">Recommended</h6>
                    </div>
                    <!-- <div class="col-lg-6">
                        <form action="" method="GET">
                            <h6><button  class="sort-btn" name="submit" id="sort" value="asc" type="submit">Sort by rate/hr <i class="fa fa-sort"></button></i></h6>
                        </form>
                    </div> -->
                </div>

                <div class="row overflow-y: scroll;">

                    <?php
                    // start of search query // 
                    if (isset($_POST['search'])) {

                        $searchQuery = $_POST['search_details'];

                        $min_length = 3;

                        if (strlen($searchQuery) >= $min_length) { // if query length is more or equal minimum length then

                            $search_details = htmlspecialchars($searchQuery);
                            // changes characters used in html to their equivalents, for example: < to &gt;

                            $searchQuery  = mysqli_real_escape_string($conn, $searchQuery);
                            // makes sure nobody uses SQL injection 

                            $query = "SELECT * FROM handyman INNER JOIN users ON handyman.UserId = users.id WHERE ApplyStatus = 'accepted' AND 
                            ( hFirstName LIKE '%$searchQuery%' OR 
                            hLastName LIKE '%$searchQuery%' OR 
                            Services LIKE '%$searchQuery%' OR 
                            hProvince LIKE '%$searchQuery%' OR 
                            hCity LIKE '%$searchQuery%' OR 
                            hBarangay LIKE '%$searchQuery%' OR
                            Availability LIKE '%$searchQuery%' OR
                            Services LIKE '%$searchQuery%' OR
                            ServicePrice LIKE '%$searchQuery%' )
                            ORDER BY ServicePrice ASC ";

                            $results = $conn->query($query);

                            if (mysqli_num_rows($results) <= 0) { ?>
                                <div class="col-12 py-2">
                                    <div class="card text-center shadow py-5">
                                        <div class="col-lg-12 justify-content-center">
                                            <h5 style="font-weight: 700;">Ooops!</h5>
                                            <h6>No results were found.</h6>
                                            <h6>Try searching for another keyword.</h6>
                                        </div>
                                        <div class="col-lg-12 py-4">
                                            <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                        </div>
                                    </div>
                                </div>

                            <?php } else {

                                        $insert = "INSERT INTO `searches` (sID, keyword) VALUES ('".$_SESSION['id']."', '$searchQuery')";

                                        $result = $conn -> query($insert);

                                        while ($row = mysqli_fetch_array($results)) { ?>
                                            <div class="col-lg-4 col-md-6 pb-4">
                                                <div class="card c-recommended h-100 shadow">
                                                    <div class="card-body">
                                                        <div class="row text-center">
                                                            <div class="col-lg-6 text-center pb-2">
                                                                <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" id="profileDisplay" onerror="this.src='https://image.flaticon.com/icons/png/512/2983/2983067.png';">
                                                            </div>
                                                            <div class="col-lg-6 text-center">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <label class="text-muted">Service/s:</label>
                                                                        <h6 class="card-text"><?php echo $row['Services'] ?> </h6>
                                                                    </div>
                                                                    <div class="col-lg-12 pt-2">
                                                                        <label class="text-muted">Availability</label>
                                                                        <h6 class="card-text"><small><?php echo $row['Availability'] ?></small></h6>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <label class="text-muted">Full name:</label>
                                                        <h6 class="card-text"><?php echo $row['hFirstName'] . " " . $row['hLastName'] ?></h6>
                                                        <label class="text-muted">Service Area:</label>
                                                        <h6 class="card-text"><?php echo  $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></h6>
                                                        <label class="text-muted">Hourly Rate:</label>
                                                        <h6 class="card-text"><?php echo  $row['ServicePrice'] ?></h6>
                                                    </div>

                                                    <div class="card-footer text-center">
                                                        <button type="button" name="handyButton" class="cardview-btn px-4" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row['UserId'] ?>">Profile</button>
                                                        <button type="button" class="cardbook-btn px-4" data-toggle="modal" <?php if ($row['UserId'] == $_SESSION['id']) { ?> disabled <?php } ?> data-target="#booking_form" data-id="<?php echo $row['UserId'] ?> " data-toggle="tooltip" title="Self-booking is not allowed." data-placement="bottom">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php  }
                                }
                        }  
                    } else if (isset($_POST['msbutton'])) {

                        $keyword = $_POST['msbutton'];
                   
                        
                        $buttonQuery = "SELECT * FROM handyman INNER JOIN users ON handyman.UserId = users.id WHERE ApplyStatus = 'accepted' AND 
                        ( hFirstName LIKE '%$keyword%' OR 
                        hLastName LIKE '%$keyword%' OR 
                        Services LIKE '%$keyword%' OR 
                        hProvince LIKE '%$keyword%' OR 
                        hCity LIKE '%$keyword%' OR 
                        hBarangay LIKE '%$keyword%' OR
                        Availability LIKE '%$keyword%' OR
                        Services LIKE '%$keyword%' OR
                        ServicePrice LIKE '%$keyword%' )
                        ORDER BY ServicePrice ASC ";
                
                        $result = $conn->query($buttonQuery);
                
                        if (mysqli_num_rows($result) <= 0) { ?>
                            <div class="col-12 py-2">
                                <div class="card text-center shadow py-5">
                                    <div class="col-lg-12 justify-content-center">
                                        <h5 style="font-weight: 700;">Ooops!</h5>
                                        <h6>No data returned using your keyword</h6>
                                    </div>
                                    <div class="col-lg-12 py-4">
                                        <img src="https://drive.google.com/uc?export=view&id=1kfcbI_rXrlUwhVlg8v7wfBUXAf9b457o" alt="" width="150px">
                                    </div>
                                </div>
                            </div>
                
                            <?php } else {
                
                            while ($row = mysqli_fetch_array($result)) { ?>
                
                                <div class="col-lg-4 col-md-6 pb-4">
                                    <div class="card c-recommended h-100  shadow">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-lg-6 text-center pb-2">
                                                    <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" id="profileDisplay" onerror="this.src='https://image.flaticon.com/icons/png/512/2983/2983067.png';">
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="text-muted">Service/s:</label>
                                                            <h6 class="card-text"><?php echo $row['Services'] ?> </h6>
                                                        </div>
                                                        <div class="col-lg-12 pt-2">
                                                            <label class="text-muted">Availability</label>
                                                            <h6 class="card-text"><small><?php echo $row['Availability'] ?></small></h6>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                            <label class="text-muted">Full name:</label>
                                            <h6 class="card-text"><?php echo $row['hFirstName'] . " " . $row['hLastName'] ?></h6>
                                            <label class="text-muted">Service Area:</label>
                                            <h6 class="card-text"><?php echo  $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></h6>
                                            <label class="text-muted">Hourly Rate:</label>
                                            <h6 class="card-text"><?php echo  $row['ServicePrice'] ?></h6>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="cardview-btn px-4" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row['UserId'] ?>">Profile</button>
                                            <button type="button" class="cardbook-btn px-4" data-toggle="modal" data-target="#booking_form" data-id="<?php echo $row['UserId'] ?>" <?php if ($row['UserId'] == $_SESSION['id']) { ?> disabled <?php } ?> data-toggle="tooltip" title="Self-booking is not allowed." data-placement="bottom">Book</button>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                    } else {
                        $handymanQuery = "SELECT * FROM `handyman` INNER JOIN `users` ON handyman.UserId = users.id WHERE ApplyStatus = 'accepted' AND UserId != '" . $_SESSION['id'] . "' ORDER BY ServicePrice ASC LIMIT 3";
                
                        $result = $conn->query($handymanQuery);
                
                        if ($result->num_rows > 0) {
                
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-lg-4 col-md-6 pb-4">
                                    <div class="card c-recommended h-100  shadow">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-lg-6 text-center pb-2">
                                                    <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" id="profileDisplay" onerror="this.src='https://image.flaticon.com/icons/png/512/2983/2983067.png';">
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="text-muted">Service/s:</label>
                                                            <h6 class="card-text"><?php echo $row['Services'] ?> </h6>
                                                        </div>
                                                        <div class="col-lg-12 pt-2">
                                                            <label class="text-muted">Availability</label>
                                                            <h6 class="card-text"><small><?php echo $row['Availability'] ?></small></h6>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                            <label class="text-muted">Full name:</label>
                                            <h6 class="card-text"><?php echo $row['hFirstName'] . " " . $row['hLastName'] ?></h6>
                                            <label class="text-muted">Service Area:</label>
                                            <h6 class="card-text"><?php echo  $row['hBarangay'] . " " . $row['hCity'] . ", " . $row['hProvince'] ?></h6>
                                            <label class="text-muted">Hourly Rate:</label>
                                            <h6 class="card-text"><?php echo  $row['ServicePrice'] ?></h6>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="cardview-btn px-4" data-toggle="modal" data-target="#viewModal" data-id="<?php echo $row['UserId'] ?>">Profile</button>
                                            <button type="button" class="cardbook-btn px-4" data-toggle="modal" data-target="#booking_form" data-id="<?php echo $row['UserId'] ?>" <?php if ($row['UserId'] == $_SESSION['id']) { ?> disabled <?php } ?> data-toggle="tooltip" title="Self-booking is not allowed." data-placement="bottom">Book</button>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                            }
                        }
                    } ?> 
                </div>
            </div>
        </div> <!-- end of recommended cards -->
    </div> <!-- end of container -->

    <!-- start of view profile pop-up modal -->
    <div class="view-profile">
        <div id="viewModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content border">
                    <div class="modal-header border-0">
                        <h6 class="view-modal-header pt-1">Profile</h6> 
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body pt-0 border-0">
                        <div class="fetched-data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of view profile pop-up modal -->

    <!-- start of booking pop-up modal -->
    <!-- booking pop-up modal -->
    <div class="class">
        <div id="booking_form" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h4 class="pt-2" style="color: #b9732f;"><b>Booking Form</b></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-11">
                            <small class="titleeee">Using Account Details (default)</small> <br><br>
                        <form action="query/postMethod.php" method="POST">
                            <?php

                                $query = "SELECT * FROM `users` WHERE id = '".$_SESSION['id']."'";
                                $result = $conn -> query($query);
                                $row = $result -> fetch_assoc();
                            ?>
                            <div class="form-group">
                                <div class="row">
                                
                                    <div class="col-lg-6 pb-2">
                                        
                                        <input type="hidden" class="form-control" name="fetch-data" id="fetch-data">
                                        <small>First Name</small>
                                        <input type="text" class="form-control shadow-sm" name="firstname" value="<?php echo $row['FirstName'] ?>" required>
                                    </div>
                                    <div class="col-lg-6 pb-2">
                                        <small>Last Name</small>
                                        <input type="text" class="form-control shadow-sm" name="lastname" value="<?php echo $row['LastName'] ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                 
                                    <div class="col-lg-6 pb-2">
                                        <small>Province</small>
                                        <select type="dropdown" class="form-control shadow-sm" name="province" id="province" class="form-control input-lg" required>
                                            <option value="<?php echo $row['Province'] ?>" selected="selected"><?php echo $row['Province'] ?></option>
                                            <?php
                                            $query = "SELECT * FROM `province` WHERE status = 1 ORDER BY province_name ASC";
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['province_name'] . '"> ' . $row['province_name'] . ' </option>';
                                                }
                                            } else {
                                                echo '<option value="">Country not available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 pb-2">
                                        <?php

                                            $query = "SELECT * FROM `users` WHERE id = '".$_SESSION['id']."'";
                                            $result = $conn -> query($query);
                                            $row = $result -> fetch_assoc();
                                        ?>
                                        <small>City/Municipality</small>

                                        <select type="dropdown" class="form-control shadow-sm" name="city" id="city" class="form-control input-lg" required>
                                            <option value="<?php echo $row['City'] ?>" selected="selected"><?php echo $row['City'] ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <small>Barangay</small>
                                        <select type="dropdown" class="form-control shadow-sm" style="max-height: 75px" name="barangay" id="barangay" class="form-control input-lg">
                                            <option value="<?php echo $row['Barangay'] ?>" selected="selected"><?php echo $row['Barangay'] ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <small>Contact #</small>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+63</div>
                                            </div>
                                            <input type="text" class="form-control shadow-sm" name="contact_number" value="<?php echo $row['ContactNumber'] ?>" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <small>Home Address (Unit No., Street No.)</small>
                                        <input type="text send_email" class="form-control shadow-sm" name="book_address" value="<?php echo $row['Address'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <small>Starting Date</small>
                                        <input type="date" class="form-control shadow-sm" name="date">
                                    </div>
                                    <div class="col-lg-6">
                                        <small>End Date</small>
                                        <input type="date" class="form-control shadow-sm" name="end_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small for="description">Description</small>
                                <textarea type="text"class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="State your home repair concerns."></textarea>
                            </div>
                            <div class="row">
                                <div class="col-6 my-2">
                                    <div class="form-group">
                                        <input type="submit" name="submit_booking" class="btn btn-primary w-100" value="Submit">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group my-2">
                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
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
    </div> <!-- end of booking pop-up modal -->
    <?php include($IPATH . "footer.php"); ?>
<script>
    // start of script for view profile modal
    $(document).ready(function() {
        $('#viewModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'post',
                url: 'fetch/fetch_record.php', //Here you will fetch records 
                data: 'rowid=' + rowid, //Pass $id
                success: function(data) {
                    $('.fetched-data').html(data); //Show fetched data from database
                }
            });
        });
    }); // end of script for view profile modal

    // start of script for tooltip
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    }); // End of start of script for tooltip

    //booking form modal open on button clck
    $(document).on("click", ".cardbook-btn", function() {
        var bookhmid = $(this).data('id');
        $(".modal-body #fetch-data").val(bookhmid);
    }); //End of booking form modal open on button clck


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
    }); // End of Dependent drop-down matrix

</script>
</body>

</html>