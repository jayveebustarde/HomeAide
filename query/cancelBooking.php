<?php

    session_start();
    include '../configs/connect.php';

    $cancel = "UPDATE `bookings` SET `Status` = 'cancelled' WHERE `booking.id` = '".$_GET['id']."' ";

    if (mysqli_query($conn, $cancel)) {

		header('Location: ../history.php?err=success'); 

	} else {

		header('Location: ../history.php?err=something_went_wrong');

	}


?>