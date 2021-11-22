<?php

	session_start();
	include '../configs/connect.php';

	$query = "UPDATE `bookings` SET `hmConfirmation` = 'done' WHERE `booking.id` = '".$_GET['id']."' ";

	if (mysqli_query($conn, $query)) {

		header('Location: ../history.php?err=success'); 
		
	} else {

		header('Location: ../history.php?err=something_went_wrong');
	}
	
?>