<?php 
    //Clear old sessions
    session_start();
    session_destroy();
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

    if(isset($_POST['login'])){

        $email = mysqli_real_escape_string ($conn, $_POST['email']);
        $password = mysqli_real_escape_string ($conn, $_POST['password']);
        
        $userQuery = "SELECT * FROM `users` WHERE `EmailAddress` = '" . $email . "' ";
        $result = mysqli_query($conn, $userQuery);

        if (mysqli_num_rows($result) > 0 ){ 
            
            $row = mysqli_fetch_array($result);

            if ($row['verified_at'] == '0000-00-00 00:00:00' || $row['verified_at'] == NULL) {     
                array_push($errors, "Please verify your email <a style ='color: #b9732f;' href='auth_signup.php?email=" . $email . "'> from here.</a> ");
                $_SESSION['email'] = $row['EmailAddress'];

            } else if (password_verify($password, $row['Password'])) {

                $_SESSION['role'] = $row['UserRole'];
                $_SESSION['first_name'] = $row['FirstName'];
                $_SESSION['last_name'] = $row['LastName'];
                $_SESSION['email'] = $row['EmailAddress'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['image'] = $row['profileImage'];
                $_SESSION['verified'] = $row['verified_at']; 
                $_SESSION['loggedin'] = "true"; // SET loggedin status to true id Email Address is verified 

                header('Location: configs/index.php');
            } else {     
                array_push($errors, "The password you have entered is incorrect!");
            } 
        } else {  
            array_push($errors, "Email Address does not exist!");
        }
    }

    if (isset($_POST['emailExist'])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // ensure that the user exists in our system
        $emailExistQuery = "SELECT * FROM `users` WHERE `EmailAddress` = '". $email ."' ";

        $results = mysqli_query($conn, $emailExistQuery);
        $row = mysqli_fetch_array($results);

        if (empty($email)) {
         array_push($errors, "Your email is required.");
        } elseif (mysqli_num_rows($results) <= 0) {
            array_push($errors, "This email address is not in our system.");
        } 
            
       
        
        // generate a unique random token of length 50
        $token = bin2hex(random_bytes(50));
      
        if (count($errors) == 0) {

          // store token in the database table against the user's email
            $sql = "UPDATE `users` SET `token` = '" . $token . "' WHERE `EmailAddress` = '" . $email . "' ";
            $results = mysqli_query($conn, $sql);

            $mail = new PHPMailer();
            $mail -> isSMTP();
            $mail -> Host = "smtp.gmail.com";
            $mail -> SMTPAuth = "true";
            $mail -> Port = "tls";
            $mail -> Port = "587";
            $mail -> Username = "services.homeaide@gmail.com";
            $mail -> Password = "capstone2021";
            $mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
            $mail -> addAddress("$email");
            $mail -> isHTML(true);

            $mail-> Subject = "Home Aide Password Reset";
            $mail-> Body = "Good day!\r\n\r\nTo reset your password on our website, follow this <a href=http://localhost/home_aide/password_reset.php?token=" . $token . ">link.</a>";
            
            if ( $mail->Send()){
                array_push($messages, "A link has been sent to your email address.");
			} else {
				array_push($errors, "Something went wrong");
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
    .signup-btn button{
        padding: 4px 18px;
        background-color: #b9732f;
        color: #fff;
        border-radius: 3px;
        font-weight: 400;
        font-size: 14px;
        border-style: none;
    }
    .signup-btn button:hover {
        background-color: #da8334;
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
    .login-btn {
        color: #fff;
        background-color: #b9732f;
    }
    .login-btn:hover {
        color: #fff;
        background-color: #da8334;
    }
    .modaltitle {
        color: #b9732f;
        font-size: 18px;
    }
    .btn-forgot {
        color: #fff;
        background-color: #b9732f;
    }
    .btn-forgot:hover {
        color: #fff;
        background-color: #da8334;
    }
    form input[type=text],
    form input[type=email],
    form input[type=password] {
        font-size: 14px;
    }
    form input[type=text]:focus,
    form input[type=email]:focus,
    form input[type="password"]:focus,
    .md-textarea:focus {
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

    <!-- start of signin container -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-left">
                <div class="img-container">
                    <img src="https://drive.google.com/uc?export=view&id=17oXlkyzEHiSI3QSVaqwyM2k1oSOJO9ee" class="img-fluid d-none d-lg-block" alt="" width="600">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card py-4 rounded-lg shadow">
                    <div class="row justify-content-center pt-2">
                        <div class="col-11">
                            <?php include('configs/error.php') ?>
                            <form action="" method="POST" class="px-4">
                                <h6>Sign In</h6>
                                <p>To keep connected with us please login with your personal information.</p>
                                <div class="form-group my-4 shadow-sm">
                                    <label><small> Username or Email address</small></label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                </div>
                                <div class="form-group my-4 shadow-sm">
                                    <label><small>Password</small></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="must be at least 6 character" required>
                                </div>
                                <div class="form-check my-2 p-0">
                                    <input type="checkbox" onclick="myFunction()"> <label for=""><small>Show Password </small></label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" class="btn login-btn w-100 " value="Login">
                                </div>
                                <p>Don't have an account? <a href="signup.php" class="text-danger">Register.</a></p>
                                <p><a href="signin.php" class="text-danger" data-toggle="modal" data-target="#forgotModal" data-dismiss="modal">Forgot Password?</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of signin container -->

    <!-- start of forgot pw modal-->
    <div id="forgotModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body text-center ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <form method="POST" action="">
                                <div class="form-group my-4">
                                    <label class="modaltitle"> <b>Forgot Password</b> </label>
                                    <div class="img-container my-3">     
                                        <img src="https://drive.google.com/uc?export=view&id=1g9y-vbYe3p_znwzymEFDQsPtxDAtHTvI" class="img-fluid" alt=""width="100px">
                                    </div>
                                    <label class="float-left"><small><b>Note:</b> A link to reset your password will be sent to your email address. Please check your inbox and/or spam folder.</small></label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                                </div>
                                <input type="submit" class="form-control btn btn-forgot mb-4" name="emailExist" value="Submit" data-toggle="modal" data-target="#notifModal">
                            </form>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
    </div>
    <!-- end of forgot pw modal-->

<script>
    function myFunction() {
    var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 
    $('.alert').alert()
</script>

</body>

</html>

