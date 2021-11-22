<?php 

session_start();
require 'configs/connect.php';


if(isset($_POST['uotp'])){
    
    $otp = $_POST['uotp'];

    $email = $_SESSION['email'];

    $query = "SELECT * FROM `users` WHERE EmailAddress = '".$email."' AND Auth = '".$otp."'";

    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);

    if ($row > 0) {

        $uQuery = "UPDATE `users` SET Auth = '' WHERE EmailAddress = '".$email."'";
        $_SESSION['email'] = $email;

        echo "valid";

    } else {
        echo "invalid";
    }
}   
?>