<?php 
    
    //Clear old sessions
	session_start();

    include 'configs/connect.php';

    //include required phpmailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    //define namespaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['signup'])){
        $first_name = mysqli_real_escape_string ($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string ($conn, $_POST['last_name']);
        $email = trim(htmlspecialchars($_POST['email']));
        $_SESSION['email'] = $_POST['email'];
	    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
		$password = mysqli_real_escape_string ($conn,$_POST['password']);
        $c_password = mysqli_real_escape_string ($conn,$_POST['c_password']);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        if ($_POST['password'] !== $_POST['c_password']) {
            array_push($errors, "The passwords did not match!");  
        } 

        // email validation
        if ($email === false) {
            array_push($errors, "Wrong email format");
        }
        if (empty($_POST["email"])) {
            array_push($errors,"Please input an email.");
            } else {
            $email = ($_POST["email"]);
        }
        $emailQuery = "SELECT * FROM `users` WHERE `EmailAddress` = '$email' ";

        $results = mysqli_query($conn, $emailQuery);
        $row = mysqli_fetch_assoc($results);

        if ($row) { 
            if ($row['EmailAddress'] === $email) {
                array_push($errors, "Another user is already using this email address.");
            } 
        }

        if(count($errors) == 0) {

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
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 20px;">' .$code. '</b></p>';
    
            $mail->send();

            $mail->smtpClose();
                
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $userQuery = "INSERT INTO `users` (`FirstName`, `LastName`, `EmailAddress`, `verification_code`, `Password`, `verified_at`) VALUES ('" .$first_name."' , '" .$last_name."' , '" .$email."' , '" .$code."' , '" .$password_hash."' , NULL)";

            $result = mysqli_query($conn, $userQuery);

            header('Location: auth_signup.php?verify_email='); // Go to verification page
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
    }
    .container p {
        color: #606060;
        font-size: 14px;
    }
    .btn-submit {
        color: #fff;
        background-color: #b9732f;
        border-color: #b9732f;
    }
    .btn-submit:hover {
        color: #fff;
        background-color: #da8334;
    }
    .second_division {
        display: none;
    }
    form input[type=text],
    form input[type=email],
    form input[type=password] {
        font-size: 14px;
    }
    form input[type=text]:focus,
    form input[type=email]:focus,
    form input[type="password"]:focus {
        box-shadow: none;
        border-color: #da8334;
    }
</style>
<body>

<!-- navigation bar -->
<nav class="navbar sticky-top navbar-light navbar-expand-lg bg-#fff">
    <div class="col-8">
        <a class="navbar-brand" href="landing.php"><img src="https://drive.google.com/uc?export=view&id=1xlR9M1FzmUxVYpGCvxkkyaSIMl0S3Xxc" alt="" width="180px" height="60px"></a>
    </div>
</nav>
<div class="container">
        <div class="row">
            <div class="col-lg-6 px-4">
                <div class="img-container">
                    <img src="https://drive.google.com/uc?export=view&id=17oXlkyzEHiSI3QSVaqwyM2k1oSOJO9ee" class="img-fluid d-none d-md-block" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card py-4 rounded-lg shadow">
                    <?php include('configs/error.php') ?>
                    <div class="row justify-content-center pt-2">
                        <div class="col-10">
                            <form method="POST">
                            <h6>Sign Up</h6>
                            <p>Please fill in this form to create an account.</p>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for=""><small>First Name</small></label>
                                            <input type="text" class="form-control shadow-sm" name="first_name" placeholder="First name" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for=""><small>Last Name</small></label>
                                            <input type="text" class="form-control shadow-sm" name="last_name" placeholder="Last name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""><small>Enter Email Address</small></label>
                                    <input type="email" id="email" class="form-control shadow-sm" name="email" aria-describedby="emailHelp" placeholder="Enter Email address" required>
                                </div>
                                <div class="form-group">
                                    <label for=""><small>Enter Password</small></label>
                                    <input type="password" class="form-control shadow-sm" name="password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                    <label for=""><small>Re-enter Password</small></label>
                                    <input type="password" class="form-control shadow-sm" name="c_password" placeholder="Re-enter Password" required>
                                </div>
                                <div class="form-group">
                                <label></label>
                                    <input type="submit" name="signup" id= "signup" class="btn btn-submit w-100" value="Register"> <br><br>
                                    <p>Already have an account? <a href="signin.php" class="text-danger">Login.</a></p>
                                </div>
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

