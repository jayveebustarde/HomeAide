<?php 

    session_start();
    
    include 'configs/connect.php';

    if (isset($_POST['submit'])) {

        $full_name = $_POST['full_name'];
        $email_address = $_POST['email_address'];
        $message = $_POST['message'];

        if (empty($full_name)) {
            array_push($errors, "Please provide your name.");
        }

        if (empty($email_address)) {
            array_push($errors, "We need your email address to get in touch with you.");
        }

        if (empty($message)) {
            array_push($errors, "Please provide a message.");
        }

        if (empty($errors)) {

            $insertQuery = "INSERT INTO `messages` (`email_address`, `full_name`, `msg`) VALUES ('$email_address', '$full_name' ,'$message')";

            if (mysqli_query($conn, $insertQuery)) {
                array_push($messages, "Your message has been sent to Home Aide Team!");
            } else {
                array_push($errors, "There was an error sending your message. Please try again!");
                $conn->error;
            } 
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
    }
    .main-title {
        color: #b9732f;
        font-size: 24px;
        font-weight: 600;
    }
    .sub-title {
        color: #606060;
        font-size: 14px;   
    }
    label {
        font-size: 12px;
        color: #606060;
    }
    form input[type=text]:focus,
    form input[type="email"]:focus,
    .md-textarea:focus {
        box-shadow: none;
        border-color: #da8334;
    }
    form input[type=text],
    form input[type=email],
    textarea[type=text] {
        font-size: 14px;
    }
    .submit {
        color: #fff;
        background-color: #b9732f;
    }
    .submit:hover {
        background-color: #da8334;
    }
    .card-c {
        border: none;
    }
    .getintouch {
        color: #b9732f;
        font-size: 16px;
        font-weight: 600;
    }
    .letusknow {
        color: #606060;
        font-size: 14px;
    }
    .card-c:hover {
        border-radius: 4px;
        color: #fff;
        background-color: #da8334;
    }
    .card-contact {
        font-size: 14px;
    }

</style>
<body>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/home_aide/assets/"; include($IPATH. "header.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="img-container d-none d-md-block">
                    <img src="https://drive.google.com/uc?export=view&id=16t5GFmtQl5Ud-1-HgzaBMrxifOjwDUtR" width="500px" class="img-fluid"> <br>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-content">
                        <div class="card-body mx-4">

                            <?php include 'configs/error.php' ?>

                            <h6 class="text-center main-title pt-2">Contact Us</h6> <br>
                            <h6 class="text-center sub-title">Need to get in touch with our team? We're all ears.</h6> <br>
                            <form class="mx-4" action="" method="POST">
                                <div class="form-group">
                                    <label for="">Name</label> <br>
                                    <input type="text" name="full_name" class="form-control shadow-sm">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email  </label>
                                    <input type="email" name="email_address" class="form-control shadow-sm">
                                </div>
                                <div class="form-group">
                                    <label for="">Write your message here</label> <br>
                                    <textarea type="text" name="message" class="form-control md-textarea shadow-sm" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for=""></label> <br>
                                    <input type="submit" name="submit" class="form-control submit shadow-sm" value="Send Message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="container pb-5">
        <div class="row"> 
            <div class="col-lg-12 text-center py-4">
                <h6 class="getintouch">Get in touch</h6>
                <h6 class="letusknow">Let us know if there is anything else we can do to help you</h6>
            </div>     
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <div class="card card-c">
                    <div class=" card-content">
                        <div class="card-body text-center">
                            <i class="fa fa-twitter"></i> <br><br>
                            <h6 class="card-contact">@HomeAide_</h6>                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-c">
                    <div class="card-content">
                        <div class="card-body text-center"> 
                            <i class="fa fa-envelope"></i> <br><br>
                            <h6 class="card-contact">service.homeaide@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-c">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <i class="fa fa-youtube-play"> </i> <br><br>
                            <h6 class="card-contact">Home Aide</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include($IPATH . "footer.php"); ?>
</body>
</html>