<?php

    $dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "homeaide_db";

	$errors = array();
	$messages = array();

    /*Connect to database */
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


	if(!$conn)
	{
		die("Connection Failed. ". mysqli_connect_error());
		echo "Can't connect to database";
  }

	function getResult($Query){ //Requires Query eg. "SELECT * FROM tbl"
		$conn = $GLOBALS['conn'];
		$Result = mysqli_query($conn ,$Query);
		return $Result; //Returns SQL Result - use loop to go through the data
	}

?> 


