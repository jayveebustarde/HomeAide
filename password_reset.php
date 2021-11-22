<?php 
    include 'configs/connect.php';
    session_start();
    
    if (isset($_POST['forgot_pw'])) {
        $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
        $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
      
        // Grab the token that came from the email link
         $token = $_GET['token'];

        if (empty($pass1) || empty($pass2)) array_push($errors, "Password is required.");
        if ($pass1 !== $pass2) array_push($errors, "Passwords did not match.");

        if (count($errors) == 0) {
            $pass1 = password_hash($pass1, PASSWORD_BCRYPT);
            $forgotQuery = "UPDATE `users` SET `Password` ='$pass1' WHERE `token` ='".$token."' ";
            $results = mysqli_query($conn, $forgotQuery);
            header('location: configs/index.php');
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
    form input[type=text],
    form input[type=email],
    form input[type=password] {
        font-size: 14px;
    }
    
</style>

<body>
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
                        <?php include('configs/error.php') ?>
                            <form method="POST">
                                <div class="form-group">
                                <h6>Reset Password</h6>
                                <div class="img-container my-4">     
                                    <img src="https://drive.google.com/uc?export=view&id=1aKZ2oN5NstvkMpw8vpcqaMX5aNXg6kiq" class="img-fluid" alt=""width="100px">
                                </div>
                                <label class="float-left"><small> Enter New Password </small></label>
                                    <input type="password" class="form-control shadow-sm" name="pass1" placeholder="Enter New Password" required>
                                </div>
                                <div class="form-group my-2">
                                <label class="float-left"><small> Re-enter New Password </small></label>
                                    <input type="password" class="form-control shadow-sm" name="pass2" placeholder="Re-enter New Password" required> <br>
                                </div>
                                <input type="submit" class="form-control btn btn-primary mb-2" name="forgot_pw" value="Reset">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="emailModal" class="modal fade mx-4" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border">
            <div class="modal-body text-center ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row justify-content-center">
                    <div class="col-10">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>