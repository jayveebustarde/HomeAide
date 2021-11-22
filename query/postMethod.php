<?php

session_start();
include '../configs/connect.php';

// START OF SIGNUP QUERY //
// END OF SIGNUP QUERY //

// START OF LOGIN QUERY //
// END OF LOGIN QUERY //

// START OF ACCOUNT QUERY //
// END OF ACCOUNT QUERY //
 
// START OF BOOKING QUERY //
if(isset($_POST['submit_booking'])) {

	if (isset($_POST['checkbox'])) {
		
		$query = "SELECT * FROM `users` WHERE id = '".$_SESSION['id']."'";
		$result = $conn -> query($query);
		$row = $result -> fetch_assoc();

		$province = $row['Province'];
		$city = $row['City'];
		$barangay = $row['Barangay'];

	} else {
		$province = $_POST['province'];
		$city = $_POST['city'];
		$barangay = $_POST['barangay'];
	}

	$book_address = $_POST['book_address'];
	$contact_number = $_POST['contact_number'];
	$date = $_POST['date'];
	$e_date = $_POST['end_date'];
	$description = $_POST['description'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$handymanid = $_POST['fetch-data'];

	$select = "SELECT * FROM `handyman` WHERE UserId = '$handymanid' ";

	$result = $conn -> query($select);
	$row = $result -> fetch_assoc();

	$service = $row['Services'];
	$hmFN = $row['hFirstName'];
	$hmLN = $row['hLastName'];
	
	$bookQuery = "INSERT INTO `bookings` (`Status`, `UserId`, `bFirstName` , `bLastName` , `HandymanId` , `hmFirstName`, `hmLastName`, `bProvince` , `bCity` , `bBarangay`, `bBookingAddress` , `bServiceType`, `bContact` ,`ServiceDate`, `EndDate` , `Description`) VALUES ('pending' , '".$_SESSION['id']."' , '$firstname' , '$lastname', '$handymanid' , '$hmFN' , '$hmLN', '$province' , '$city' , '$barangay' , '$book_address' , '$service', '$contact_number', '$date', '$e_date', '$description') ";

	if (mysqli_query($conn, $bookQuery)) {
		header("Location: ../email/sendMail.php?id=$handymanid");
	} else {
		array_push($errors, "Booking attempt failed");
	}
}
// END OF BOOKING QUERY //



// START OF EDIT BOOKING
if (isset($_POST['update_booking'])){

	$id = $_POST['id'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$barangay = $_POST['barangay'];
	$book_address = $_POST['address'];
	$contact_number = $_POST['contact'];
	$sdate = $_POST['sdate'];
	$edate = $_POST['edate'];
	$description = $_POST['desc'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$handymanid = $_POST['fetch-data'];

	$editBooking = "UPDATE `bookings` SET bFirstName = '$firstname', bLastName = '$lastname', bProvince = '$province', bCity = '$city', bBarangay = '$barangay', bBookingAddress = '$book_address', bContact = '$contact_number', ServiceDate = '$sdate', EndDate = '$edate', Description = '$description'  WHERE `booking.id` = '$id'";

	if (mysqli_query($conn, $editBooking)) {

		header('Location: ../history.php?err=success'); 
	}
	else{
		header('Location: ../history.php?err=something_went_wrong');
	}
}
// END OF EDIT BOOKING

// START OF RATING QUERY //

if (isset($_POST['submit-rating'])) {
	
	$bookID = $_POST['bookingId'];
	$rate = $_POST['Rating'];
	$review = $_POST['review'];

	$selectQuery = "SELECT * FROM `bookings` WHERE `booking.id` = '$bookID' ";

	$result = $conn -> query($selectQuery);
	$row = $result -> fetch_assoc(); 

	if ($row['UserId'] == $_SESSION['id']) {

		$ratee = $row['HandymanId'];

		$rateQuery = "INSERT INTO `ratings` (ratingId, Rater, Ratee, rating, review) VALUES ('$bookID', '".$_SESSION['id']."', '$ratee', '$rate', '$review') ;";
		
		$rateQuery .= "UPDATE `bookings` SET uRate = 'Yes' WHERE `booking.id` = '$bookID'";

		if (mysqli_multi_query($conn, $rateQuery)) {
			header('Location: ../history.php?err=Success');
		}
		else {
			header('Location: ../history.php?err=Error');
		}
	}
} 
// END OF RATING QUERY //


?>
