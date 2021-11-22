<?php

// start the session
session_start();

//desttroy the session
if (session_destroy()) {
    // redirect to signin page
    header("Location: /home_aide/signin.php");
    exit;
}
?>