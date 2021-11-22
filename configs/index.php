<?php
  session_start();

	include 'configs/connect.php';

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!="true") {
		header('Location: /home_aide/signin.php');
        exit;
    }

    if ($_SESSION['role']=="user") {
            header('Location: /home_aide/user_dashboard.php');
    } else if ($_SESSION['role']=="handyman") {
        header('Location: /home_aide/handyman_dashboard.php');
    } else if ($_SESSION['role']=="admin") {
        header('Location: /home_aide/admin_dashboard.php');
    } else {
        header('Location: /home_aide/signin.php?err=error');
    }
?>
