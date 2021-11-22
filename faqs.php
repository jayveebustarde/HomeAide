<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        padding-top: 2%;
    }
    .empty-container {
        height: 120px;
    }
    .card-header h6{
        color: #b9732f;
        font-weight: 600;
    }
    .card-header {
        background-color: transparent;
    }
    .card-header:hover {
        border-width: thin;
        border: 1px solid #b9732f;
    }
    .card-header h6:hover {
        color: #404040;
    }
    .maintitle {
        font-size: 18px;
    }
    .subtitle {
        color: #606060;
    }

</style>

<body>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/home_aide/assets/";
    include($IPATH . "header.php"); ?> 

    <div class="container">
        <div class="row py-4">
            <div class="col text-center faq-title">
                <h6 class="maintitle">We are here to help you!</h6>
                <h6 class="subtitle"> <small> Browse through the most frequently asked questions.</small></h6>
            </div>
        </div>
        <div class="row text-center d-none d-sm-block py-4">
            <div class="img-container">
                <img src="https://drive.google.com/uc?export=view&id=1e6I2_soGj9FZzjU4INeXKnd4BEPt1iGQ" class="zoom img-fluid" alt="" width="340px">
            </div>
        </div>
        
        <div id="accordion">
            <div class="card mb-2">
                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="btn text-left">
                                I’m having trouble finding the right handyman.
                            </h6>
                        </div>
                        <div class="col-2 text-right">
                            <h6 class="btn btn-link">
                                <i class="fa fa-caret-down fa-lg"></i>
                            </h6>
                        </div>
                    </div>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body m-4">
                        To find a suitable handyman for the service you require, go to the <b>Bookings</b> navigation and select <b>Book a Service</b>.It will redirect you to the <b>Book a Service</b> page. You can then search for the service you require or use the provided search query. Following your search, it will provide you with a list of handymen who specialize in the chosen category. You can check their credentials and rating by viewing their profile, making your search easier and more organized.
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="btn text-left">
                                Is it possible to request a specific date for the service?
                            </h6>
                        </div>
                        <div class="col-2 text-right">
                            <h6 class="btn">
                                <i class="fa fa-caret-down fa-lg"></i>
                            </h6>
                        </div>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body m-4">
                        During the booking process, you are required to provide a start and end date for the service that you need. So, as long as the handyman is available, you can start the service whenever you want. The handyman's availability is shown in their profile.
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="btn text-left">
                                How can I cancel a booked appointment?
                            </h6>
                        </div>
                        <div class="col-2 text-right">
                            <h6 class="btn">
                                <i class="fa fa-caret-down fa-lg"></i>
                            </h6>
                        </div>
                    </div>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body m-4">
                        Customers can cancel a scheduled appointment by going to the <b>Active Bookings</b> section of their <b>History</b> page. If you click the <b>Cancel Booking</b> button, you will be asked if you are sure you want to cancel the booking. If the handyman has not yet accepted the bookings, you can cancel and edit them. <br><br>

                        For handyman, you can cancel a scheduled appointment by going to your <b>My Job/s</b> under the <b>History</b> page. Simply click the <b>Decline</b> button, which will be followed by a confirmation question and an explanation of why you are declining. The cancellation will be communicated to the customer via email.

                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="btn text-left">
                                How can I apply as a handyman?
                            </h6>
                        </div>
                        <div class="col-2 text-right">
                            <h6 class="btn">
                                <i class="fa fa-caret-down fa-lg"></i>
                            </h6>
                        </div>
                    </div>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body m-4">
                        After logging in, select the <b>Apply as Handyman</b> button, then fill out the <b>Handyman Application Form</b> with your details. You must submit a Valid ID to be authenticated by the administrator. An email will be sent to the email address you supplied with information about the status of your application.
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="btn text-left">
                                How can I verify my email address?
                            </h6>
                        </div>
                        <div class="col-2 text-right">
                            <h6 class="btn">
                                <i class="fa fa-caret-down fa-lg"></i>
                            </h6>
                        </div>
                    </div>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body m-4">
                        After signing up, you will get a <b>One-Time-Password</b> to the email address you provided to verify your email address. If the OTP you entered matches the OTP sent to your email address, you may proceed to login to your account. <b>You will not be able to log in until your email address has been verified</b>.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty-container">
    </div>

<?php include($IPATH . "footer.php"); ?>
</body>
<script>
    $('.collapse').collapse()
</script>

</html>