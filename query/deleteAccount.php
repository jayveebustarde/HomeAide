<?php 

include '../configs/connect.php';

if (isset($_POST['delete-button'])) {

    $id = $_POST['sessionID'];

    $delete = "DELETE FROM `users` WHERE `id` = '$id';";
    $delete .= "DELETE FROM `handyman` WHERE UserId = '$id';";
    $delete .= "DELETE FROM `bookings` WHERE UserId = '$id' OR HandymanId = '$id'";

    if (mysqli_multi_query($conn, $delete)) {

		header('Location: ../signin.php'); 
	}
}

?>