<?php 

    include 'configs/connect.php';

    session_start();

    //include required phpmailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    //define namespaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST["verify_email"])) {

        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // mark email as verified

        $sql = "SELECT * FROM `users` WHERE `EmailAddress` = '$email' ";

        $result  = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0 ) { 
            
            $row = mysqli_fetch_array($result);

            if ($row['verification_code'] == $verification_code) {
                
                $update = "UPDATE `users` SET `verified_at` = NOW() WHERE `verification_code` = '$verification_code' AND `EmailAddress` =  '$email' "; 

                if (mysqli_query($conn, $update)) {

                header("Location: configs/index.php");
                exit(); 

                } else {
                    array_push($errors, "There was an error verifying your email.");
                }
            } else {
                array_push($errors, "The OTP that you have entered is incorrect.");
            }
        } 
    }

    if (isset($_POST['resend'])) {

        $email = $_POST["email"];

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "services.homeaide@gmail.com";
        $mail->Password = "capstone2021";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom("services.homeaide@gmail.com", "Home Aide");
        $mail->addAddress($email);
        $mail->isHTML(true);

        $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Home Aide Email Verification';
        $mail->Body    = '<p>Your new verification code is: <b style="font-size: 20px;">' . $code . '</b></p>';
        $mail->send();
        $mail->smtpClose();
            
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $resQuery = "UPDATE `users` SET verification_code = '".$code."' WHERE EmailAddress = '".$email."' ";
        $result = mysqli_query($conn, $resQuery);

        header('Location: auth_signup.php?success'); // Go to verification page
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
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    .signin-btn button{
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
        padding-bottom: 4%;
    }
    .container h6 {
        font-weight: 600;
        color: #b9732f;
    }
    .container p {
        color: #606060;
        font-size: 18px;
    }
    input[type=text] {
        border: 1px solid #b9732f;
        border-radius: 4px;
    }
    .btn-primary {
        background-color: #b9732f !important;
        border-color: #b9732f;
    }
    label, small {
        color: #606060;
    }
    .resend_link {
        color: #b9732f;
        background-color: white;
        border-style: none;
    }
        .resend_link:hover {
            color: #b9732f;
            text-decoration: underline;
        }
input[type="text"]{ 
        text-align: center;
    }
</style>
<body>

<!-- navigation bar -->
<nav class="navbar sticky-top navbar-light navbar-expand-lg bg-#fff">

        <a class="navbar-brand d-block order-0 order-md-0 w-25" href="landing.php"><img src="https://drive.google.com/uc?export=view&id=1xlR9M1FzmUxVYpGCvxkkyaSIMl0S3Xxc" alt="" width="180px" height="60px"></a>

        <div class="navbar-collapse collapse dual-nav w-25 order-2 order-md-2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active pl-4">
                    <a class="signin-btn nav-item pl-2" href="signin.php"><button class="button">Sign In</button></a>
                </li>
            </ul>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
</nav> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4">
            <div class="card px-4 py-5 rounded-lg shadow ">
                <div class="row justify-content-center">
                    <div class="col-10 text-center">
                        <form method="POST">

                        <?php include 'configs/error.php' ?>

                            <?php 
                             $qq = "SELECT * FROM `users` WHERE EmailAddress = '".$_SESSION['email']."'";
                             $result = mysqli_query($conn, $qq);
                             $row = $result -> fetch_assoc();
                            
                            ?>
                            <h6>Email Verification</h6>
                            <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>" > <br>
                            <div class="img-container">     
                                <img src="https://drive.google.com/uc?export=view&id=1mmuxRCBR0jEhpy2L4KMovS-cifquXqnY" class="img-fluid" alt=""width="200px">
                            </div>
                            <label for=""> <small><b><?php echo $row['EmailAddress'] ?> </b><br> <br> A<b> One-Time-Password</b> has been sent to your email address.<br> Please, check your inbox or spam folder and verify it below.</small></label> <br><br>
                            <input type="text" class="form-control" name="verification_code" placeholder="Enter your OTP code here" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <small> Didn't receive an OTP? <input type="submit" class="resend_link my-4" name="resend" value="Resend OTP"> 
                            <input type="submit" class="form-control btn btn-primary"  name="verify_email" value="Verify">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>

