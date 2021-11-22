<?php 
session_start();
include '../configs/connect.php';

//include required phpmailer files
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';

//define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	$bookingMail = "SELECT * FROM `bookings` INNER JOIN `handyman` ON bookings.HandymanId = handyman.UserId WHERE bookings.HandymanId = '".$_GET['id']."' ";
    
    $result = $conn -> query($bookingMail);
    $row = $result -> fetch_assoc(); 

    $recepientEmail = $row['hEmailAddress'];
    $recepientFN = $row['hFirstName'];       
    $senderFN = $_SESSION['first_name'];
    $senderLN = $_SESSION['last_name'];

    ///// ----- SMTP SETTINGS ----- /////
    //Create instance of phpmailer
    $mail = new PHPMailer();
    //Set mailer to use smtp
    $mail -> isSMTP();
    //define smtp host
    $mail -> Host = "smtp.gmail.com";
    //enable smtp authentication
    $mail -> SMTPAuth = "true";
    //set type of encryption
    $mail -> Port = "tls";
    //set port to connect smtp
    $mail -> Port = "587";
    //set gmail username
    $mail -> Username = "services.homeaide@gmail.com";
    //set gmail password
    $mail -> Password = "capstone2021";
    //set email subject
    $mail -> Subject = "Home Aide Booking Request";
    //set sender email
    $mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
    //email body
    $mail -> Body = "Good day, $recepientFN!\r\n\r\nYou have received a new booking request. \r\nPlease login to your account regarding the booking details. \r\n\r\nImportant Note: If you have questions about the request, please contact the customer first before accepting the request and/or going to the location.\r\n\r\nThank you!\r\n\r\n\r\nBest,\r\nThe Home Aide Team";
    //email recepient
    $mail -> addAddress("$recepientEmail");

    if ( $mail->Send()){
        header('Location: /home_aide/history.php?err=Booking_Success!');
    } else {
        echo "Something went wrong";
    }

    //close smtp conn
    $mail->smtpClose();


    ///// REJECT BOOKING QUERY /////
if (isset($_POST['submit-reason'])){

	$id = $_POST['bookId'];
	$reason = $_POST['reason'];

	$updateQuery = "UPDATE `bookings` SET `Status` = 'rejected', `RejectReason` = '".$reason."' WHERE `booking.id` = '".$id."'";

	if (mysqli_query($conn, $updateQuery)) {

		$rejectQuery = "SELECT * FROM `users` INNER JOIN `bookings` ON users.id = bookings.UserId  WHERE `booking.id` = '".$id."'";

			$result = $conn -> query($rejectQuery);
			$row = $result -> fetch_assoc();

			$bookingID = $row['booking.id'];
			$recepientFN = $row['FirstName'];
			$recepientEmail = $row['EmailAddress'];

			$mail = new PHPMailer();
			$mail -> isSMTP();
			$mail -> Host = "smtp.gmail.com";
			$mail -> SMTPAuth = "true";
			$mail -> Port = "tls";
			$mail -> Port = "587";
			$mail -> Username = "services.homeaide@gmail.com";
			$mail -> Password = "capstone2021";
			$mail -> Subject = "Home Aide Booking Update";
			$mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
			$mail -> Body = "Good day, $recepientFN!\r\n\r\nYour booking request with Booking ID #$bookingID has been declined by your chosen handyman.\r\n\r\nReason: $reason\r\n\r\nWe are sorry!\r\n\r\n\r\nBest,\r\nThe Home Aide Team";
			
			$mail -> addAddress("$recepientEmail");

			if ( $mail->Send()){
					header('Location: /home_aide/handyman_dashboard.php?err=Booking_declined!');
			} else {
					echo "Something went wrong";
			}
		//close smtp conn
		$mail->smtpClose();
	}
}

///// ACCEPT BOOKING QUERY /////
if (isset($_POST['submit-accept'])) {

	$id = $_POST['acceptId'];

	$userQuery = "UPDATE `bookings` SET `Status` = 'confirmed' WHERE `booking.id` = '$id'";

	if (mysqli_query($conn, $userQuery)) {


		$bookingMail = "SELECT * FROM `bookings` INNER JOIN `users` ON bookings.UserId = users.id WHERE `booking.id` = '$id' ";
		
			$result = $conn -> query($bookingMail);
			$row = $result -> fetch_assoc(); 
		
			$bookingID = $row['booking.id'];
			$recepientFN = $row['FirstName'];
			$recepientEmail = $row['EmailAddress'];
		
			$mail = new PHPMailer();
			$mail -> isSMTP();
			$mail -> Host = "smtp.gmail.com";
			$mail -> SMTPAuth = "true";
			$mail -> Port = "tls";
			$mail -> Port = "587";
			$mail -> Username = "services.homeaide@gmail.com";
			$mail -> Password = "capstone2021";
			$mail -> Subject = "Home Aide Booking Update";
			$mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
			$mail -> Body = "Good day, $recepientFN!\r\n\r\nYour booking request with Booking ID #$bookingID has been accepted by your chosen handyman.\r\nWe are looking forward to a successful transaction.\r\n\r\nThank you!\r\n\r\n\r\nBest, \r\nThe Home Aide Team";

			$mail -> addAddress("$recepientEmail");
		
			if ( $mail->Send()){
				header('Location: /home_aide/handyman_dashboard.php?err=success!');
			} else {
				echo "Something went wrong";
			}
		//close smtp conn
		$mail->smtpClose();
	}
}

///// ACCEPT HANDYMAN APPLICATION /////
if (isset($_POST['accept-application'])) {

	$id = $_POST['acceptId'];

	$acceptQuery = "UPDATE `users` INNER JOIN `handyman` ON users.id = handyman.UserId SET USerRole = 'handyman', ApplyStatus = 'accepted' WHERE users.id = '$id'" ;

	if (mysqli_query($conn, $acceptQuery)) {

		$updateQuery = "SELECT * FROM `handyman` WHERE UserId = '$id'";

			$result = $conn -> query($updateQuery);
			$row = $result -> fetch_assoc(); 
		
			$recepientFN = $row['hFirstName'];
			$recepientEmail = $row['hEmailAddress'];

			$mail = new PHPMailer();
			$mail -> isSMTP();
			$mail -> Host = "smtp.gmail.com";
			$mail -> SMTPAuth = "true";
			$mail -> Port = "tls";
			$mail -> Port = "587";
			$mail -> Username = "services.homeaide@gmail.com";
			$mail -> Password = "capstone2021";
			$mail -> Subject = "Handyman Application Update";
			$mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
			$mail -> Body = "Good day, $recepientFN!\r\n\r\nWe are pleased to inform you that your Home Aide Handyman application request has been approved.\r\nYou are now able to receive notifications when customers booked your service/s. \r\n\r\nCongratulations and thank you for using our system! \r\n\r\n\r\nBest, \r\nThe Home Aide Team";
			
			//"Hello, $recepientFN! \r\n \r\n Your Home Aide handyman application request has been approved. \r\n Congratulations! \r\n \r\n \r\n Best, \r\n The Home Aide Team";
			$mail -> addAddress("$recepientEmail");
		
			if ( $mail->Send()){
				header('Location: /home_aide/admin_dashboard.php?err=Handyman_Request_Success!');
			} else {
				echo "Something went wrong";
			}
		//close smtp conn
		$mail->smtpClose();
	}
}

///// REJECT HANDYMAN APPLICATION /////
if (isset($_POST['reject-application'])) {

	$id = $_POST['rejectId'];

	$rejectQuery = "UPDATE `handyman` SET ApplyStatus = 'rejected' WHERE UserId = '$id'";

	if (mysqli_query($conn, $rejectQuery)) {

		$selectQuery = "SELECT * FROM `handyman` WHERE UserId = '$id'";

			$result = $conn -> query($selectQuery);
			$row = $result -> fetch_assoc(); 
		
			$recepientFN = $row['hFirstName'];
			$recepientEmail = $row['hEmailAddress'];

			$mail = new PHPMailer();
			$mail -> isSMTP();
			$mail -> Host = "smtp.gmail.com";
			$mail -> SMTPAuth = "true";
			$mail -> Port = "tls";
			$mail -> Port = "587";
			$mail -> Username = "services.homeaide@gmail.com";
			$mail -> Password = "capstone2021";
			$mail -> Subject = "Handyman Application Update";
			$mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
			$mail -> Body = "Good day, $recepientFN!\r\n\r\nWe are sorry to inform you that your Home Aide Handyman application request has been declined.\r\nHowever, here are some of possible reasons why an application was declined:\r\n    1. Submitted ID is not valid.\r\n    2. Registered full name did not match the name in the ID.\r\n\r\nThank you! \r\n\r\n\r\nBest, \r\nThe Home Aide Team";
			$mail -> addAddress("$recepientEmail");
		
			if ( $mail->Send()){
				header('Location: /home_aide/admin_dashboard.php?err=Handyman_Request_Success!');
			} else {
				echo "Something went wrong";
			}
		//close smtp conn
		$mail->smtpClose();
	}
}


	// OTP
	if (isset($_POST['email'])) {

	$email = $_POST['email'];
	$authQuery = "SELECT * FROM `users` WHERE EmailAddress = '".$email."' ";

	$result = $conn -> query($authQuery);
    $row = $result -> fetch_assoc(); 

		if ($row > 0) {

		$otp = rand(11111,99999);

		$getAuth = "UPDATE `users` SET Auth = '".$otp."'";
		$otp_code = "Your otp verification code is ".$otp;
		
		$_SESSION['email'] = $email;

		}

		$mail = new PHPMailer();
		$mail -> isSMTP();
		$mail -> Host = "smtp.gmail.com";
		$mail -> SMTPAuth = "true";
		$mail -> Port = "tls";
		$mail -> Port = "587";
		$mail -> Username = "services.homeaide@gmail.com";
		$mail -> Password = "capstone2021";
		$mail -> Subject = "Home Aide Booking Request";
		$mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
		$mail -> Body = ($otp_code);
		$mail -> addAddress("$recepientEmail");
        $mail -> SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));

		if ( $mail->Send()) {
			echo "send";
		} else {
			echo "Mail Error" . $mail->ErrorInfo;
		}

    } else {
        echo "wrong_email";
        $mail->smtpClose();
    }
    //close smtp conn
    
	//contact response
	if (isset($_POST['send-response'])) {

		$id = $_POST['msgres'];
		$email = $_POST['msgem'];
		$question = $_POST['message'];
		$response = $_POST['response'];

		$message = "SELECT * FROM `messages` WHERE id = '$id'"; 

		$result = $conn -> query($message);
		$row = $result -> fetch_assoc();

		$recepient = $row['full_name'];

		if (mysqli_query($conn, $message)) {

			$mail = new PHPMailer();
			$mail -> isSMTP();
			$mail -> Host = "smtp.gmail.com";
			$mail -> SMTPAuth = "true";
			$mail -> Port = "tls";
			$mail -> Port = "587";
			$mail -> Username = "services.homeaide@gmail.com";
			$mail -> Password = "capstone2021";
			$mail -> Subject = "Message/Suggestion Response";
			$mail -> setFrom("services.homeaide@gmail.com", "Home Aide");
			$mail -> Body = "Good day, $recepient!\r\n\r\nWe are getting in touch with you to respond to the message you sent us: '$question'.\r\n\r\nHere is our response: '$response'\r\n\r\nStay safe!\r\n\r\nBest,\r\nThe Home Aide Team  ";
			$mail -> addAddress("$email");
		
			if ( $mail->Send()){

				$query = "UPDATE `messages` SET response = 'yes' WHERE id = '$id'";
				if (mysqli_query($conn, $query)) {
					header('Location: /home_aide/admin_dashboard.php?success!');
				}	
			} else {
				echo "Something went wrong";
			}
		//close smtp conn
		$mail->smtpClose();
		}
	}
?>