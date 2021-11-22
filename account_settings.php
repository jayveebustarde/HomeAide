<?php
session_start();

include 'configs/connect.php';

if ($_SESSION['loggedin'] != "true") {
    header('Location: signin.php');
}

if (isset($_POST['update'])) {

    if ($_SESSION['role'] == 'user') {

        // for the database
        $profileImageName = $_FILES["profileImage"]["name"];
        $fileType = $_FILES["profileImage"]["type"];
        $fileSize = $_FILES["profileImage"]["size"];
        $temp = $_FILES["profileImage"]["tmp_name"];
        $error = array();
        $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
        $image_type = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
        $target_dir = 'resources/profileImage/';
        $target_file = $target_dir . basename($profileImageName);
        $extension = strtolower(substr($profileImageName, strpos($profileImageName, '.') + 1));
        $newName = +time() . $profileImageName;

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact_number = $_POST['contact_number'];
        $email_address =  $_POST['email_address'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay =  $_POST['barangay'];
        $address = $_POST['address'];

        //Update Info       
        //if there is no selected image just update these fields
        if ($profileImageName == "") {

            $query = "UPDATE `users` SET `FirstName` = '" . $first_name . "', `LastName` = '" . $last_name . "', `EmailAddress` = '" . $email_address . "', `ContactNumber` = '" . $contact_number . "', `Address` = '" . $address . "', `Barangay` = '" . $barangay . "', `City` = '" . $city . "', `Province` = '" . $province . "' WHERE `id` = '" . $_SESSION['id'] . "' ";

            if (mysqli_query($conn, $query)) {

                array_push($messages, "Your data has been updated successfully!");
            } else {
                array_push($errors, "Error updating your data!");
                $conn->error;
            }        // if there is a selected image execute the ff statements
        } else {

            if (in_array($extension, $allowed_exts) === false) {
                array_push($errors, "Image extension not allowed! GIF, JPG, JPEG, PNG only.");
            }

            if (in_array($fileType, $image_type) === false) {
                array_push($errors, "Only images are the allowed file type.");
            }

            if ($fileSize > 5000000) {
                array_push($errors, "File size must not be more than 5MB!");
            }

            if (!file_exists($target_dir)) {
                array_push($errors, "No directory ' . $target_dir. ' on the server Please create a folder ' .$target_dir");
            }

            // if there is no error, upload the image
            if (empty($error)) {

                move_uploaded_file($temp, $target_dir . $newName);

                $query = "UPDATE `users` SET `profileImage` = '" . $newName . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                $query .= "UPDATE `users` SET `FirstName` = '" . $first_name . "', `LastName` = '" . $last_name . "', `EmailAddress` = '" . $email_address . "', `ContactNumber` = '" . $contact_number . "', `Address` = '" .    $address . "' ,`Barangay` = '" .    $barangay . "', `City` = '" . $city . "', `Province` = '" . $province . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                // Save new updated image into session variables //
                $_SESSION['image'] = $newName;

                if (mysqli_multi_query($conn, $query)) {
                    array_push($messages, "Your data/image has been updated successfully!");
                } else {
                    array_push($errors, "Error updating your data!");
                    $conn->error;
                }
            }
        }
    } else {
        //  info for the database of handyman

        //for profile image
        $profileImageName = $_FILES["profileImage"]["name"];
        $fileType = $_FILES["profileImage"]["type"];
        $fileSize = $_FILES["profileImage"]["size"];
        $temp = $_FILES["profileImage"]["tmp_name"];
        $error = array();
        $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
        $image_type = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
        $target_dir = 'resources/profileImage/';
        $target_file = $target_dir . basename($profileImageName);
        $extension = strtolower(substr($profileImageName, strpos($profileImageName, '.') + 1));
        $newName = +time() . $profileImageName;


        //for data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact_number = $_POST['contact_number'];
        $email_address =  $_POST['email_address'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay =  $_POST['barangay'];
        $address = $_POST['address'];
        $service_type = $_POST['service_type'];
        $price_range =  $_POST['price_range'];
        $service_desc = $_POST['service_desc'];
        
        //for credentials
        $doc1 = $_FILES['doc']['name'];
        $doctemp = $_FILES["doc"]["tmp_name"];
        $docfolder = 'resources/credentials/';
        $doctargetfolder = $docfolder . basename( $_FILES['doc']['name']);
        $doc_allowed_exts = array ('jpg', 'jpeg', 'png', 'pdf'); 
        $doctype = $_FILES['doc']['type'];
        $docextension = strtolower(substr($_FILES['doc']['name'], strpos ($_FILES['doc']['name'], '.') +1));
        $docnewName = +time() . $doc1;

        // for sample works
        $works= [];

        if (!empty($_FILES['sampleWorks']['name'][0])) {

            for($i = 0; $i < count($_FILES['sampleWorks']['name']); $i++){

                $filetmp  = $_FILES['sampleWorks']['tmp_name'][$i];
                $works[] = +time() . basename($_FILES['sampleWorks']['name'][$i]);
                $workType = $_FILES['sampleWorks']['type'][$i];
                $filepath = "resources/sampleWorks/".$works[$i];

                move_uploaded_file($filetmp, $filepath);
            }

            $workImage = implode(", ", $works);

            $query = "UPDATE `handyman` SET `sampleWorks` = '" . $workImage . "' WHERE `UserId` = '" . $_SESSION['id'] . "' ;";

            $result = $conn->query($query);
        }

        //if there is no selected image just update these fields
        if ($profileImageName == "" ) {

            if (!empty($_FILES['doc']['name'])) {

                if ($doctype == "application/pdf" || $doctype == "image/png" || $doctype == "image/jpeg") {
                    if (in_array($docextension, $doc_allowed_exts) === false) {
                        array_push($errors, "Certification/Resume extension is not allowed! PDF, JPG, JPEG, PNG only.");
                    }
                } else {
                    array_push($errors, "Only images/pdf are the allowed file type for Certification/Resume.");
                }
                if($_FILES['doc']['size'] > 5000000) {
                    array_push($errors,"Certification/Resume size must not be more than 5MB!");    
                }

                if (empty($errors)) {

                    move_uploaded_file($doctemp, $docfolder . $docnewName);

                    $query = "UPDATE `handyman` SET `hFirstName` = '" . $first_name . "', `hLastName` = '" . $last_name . "', `hEmailAddress` = '" . $email_address . "', `hContactNumber` = '" . $contact_number . "', `hAddress` = '" .    $address . "' ,`hBarangay` = '" .    $barangay . "', `hCity` = '" . $city . "', `hProvince` = '" . $province . "' , `Services` = '" . $service_type . "', `ServicePrice` = '" . $price_range . "', `ServiceDesc` = '" . $service_desc . "' , `credentials` = '" . $docnewName . "' WHERE `UserId` = '" . $_SESSION['id'] . "' ;";

                    $query .= "UPDATE `users` SET `FirstName` = '" . $first_name . "', `LastName` = '" . $last_name . "', `EmailAddress` = '" . $email_address . "', `ContactNumber` = '" . $contact_number . "', `Address` = '" . $address . "', `Barangay` = '" . $barangay . "', `City` = '" . $city . "', `Province` = '" . $province . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                    $query .= "UPDATE `bookings` SET `hmFirstName` = '" . $first_name . "', `hmLastName` = '" . $last_name . "', `bServiceType` = '" . $service_type . "' WHERE `HandymanId` = '" . $_SESSION['id'] . "' ";

                    if (mysqli_multi_query($conn, $query)) {
                        array_push($messages, "Your data has been updated sucessfully!");
                    } else {
                        array_push($errors, "Error updating your data!");
                        $conn->error;
                    }
                } 
            } else {

                move_uploaded_file($doctemp, $docfolder . $docnewName);

                $query = "UPDATE `handyman` SET `hFirstName` = '" . $first_name . "', `hLastName` = '" . $last_name . "', `hEmailAddress` = '" . $email_address . "', `hContactNumber` = '" . $contact_number . "', `hAddress` = '" .    $address . "' ,`hBarangay` = '" .    $barangay . "', `hCity` = '" . $city . "', `hProvince` = '" . $province . "' , `Services` = '" . $service_type . "', `ServicePrice` = '" . $price_range . "', `ServiceDesc` = '" . $service_desc . "' WHERE `UserId` = '" . $_SESSION['id'] . "' ;";

                $query .= "UPDATE `users` SET `FirstName` = '" . $first_name . "', `LastName` = '" . $last_name . "', `EmailAddress` = '" . $email_address . "', `ContactNumber` = '" . $contact_number . "', `Address` = '" . $address . "', `Barangay` = '" . $barangay . "', `City` = '" . $city . "', `Province` = '" . $province . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                $query .= "UPDATE `bookings` SET `hmFirstName` = '" . $first_name . "', `hmLastName` = '" . $last_name . "', `bServiceType` = '" . $service_type . "' WHERE `HandymanId` = '" . $_SESSION['id'] . "' ";

                if (mysqli_multi_query($conn, $query)) {
                    array_push($messages, "Your data has been updated sucessfully!");
                } else {
                    array_push($errors, "Error updating your data!");
                    $conn->error;
                } 
            }
        } else { // if there is a selected image execute the ff statements

            if (in_array($extension, $allowed_exts) === false) {

                array_push($errors, "Image extension not allowed! GIF, JPG, JPEG, PNG only.");
            }

            if (in_array($fileType, $image_type) === false) {
                array_push($errors, "Only images are the allowed file type.");
            }

            if ($fileSize > 5000000) {
                array_push($errors, "File size must not be more than 5MB!");
            }

            if (!file_exists($target_dir)) {
                array_push($errors, "No directory ' . $target_dir. ' on the server Please create a folder ' .$target_dir");
            }

            // if there is no error, upload the image
            if (empty($errors)) {

                move_uploaded_file($temp, $target_dir . $newName);

                if (!empty($_FILES['doc']['name'])) {

                    if ($doctype == "application/pdf" || $doctype == "image/png" || $doctype == "image/jpeg") {
                        if (in_array($docextension, $doc_allowed_exts) === false) {
                            array_push($errors, "Certification/Resume extension is not allowed! PDF, JPG, JPEG, PNG only.");
                        }
                    } else {
                        array_push($errors, "Only images/pdf are the allowed file type for Certification/Resume.");
                    }
                    if($_FILES['doc']['size'] > 5000000) {
                        array_push($errors,"Certification/Resume size must not be more than 5MB!");    
                    }
    
                    if (empty($errors)) {

                        move_uploaded_file($doctemp, $docfolder . $docnewName);

                        $query = "UPDATE `users` SET `profileImage` = '" . $newName . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                        $query .= "UPDATE `handyman` SET `hFirstName` = '" . $first_name . "', `hLastName` = '" . $last_name . "', `hEmailAddress` = '" . $email_address . "', `hContactNumber` = '" . $contact_number . "', `hAddress` = '" .    $address . "' ,`hBarangay` = '" .    $barangay . "', `hCity` = '" . $city . "', `hProvince` = '" . $province . "', `Services` = '" . $service_type . "', `ServicePrice` = '" . $price_range . "', `ServiceDesc` = '" . $service_desc . "' , `credentials` = '" . $docnewName . "' WHERE `UserId` = '" . $_SESSION['id'] . "' ;";

                        $query .= "UPDATE `users` SET `FirstName` = '" . $first_name . "', `LastName` = '" . $last_name . "', `EmailAddress` = '" . $email_address . "', `ContactNumber` = '" . $contact_number . "', `Address` = '" .    $address . "' ,`Barangay` = '" .    $barangay . "', `City` = '" . $city . "', `Province` = '" . $province . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                        $query .= "UPDATE `bookings` SET `hmFirstName` = '" . $first_name . "', `hmLastName` = '" . $last_name . "', `bServiceType` = '" . $service_type . "' WHERE `HandymanId` = '" . $_SESSION['id'] . "' ";

                        // Save new updated image into session variables //
                        $_SESSION['image'] = $newName;

                        if (mysqli_multi_query($conn, $query)) {
                            array_push($messages, "Your data/image has been updated successfully!");
                        } else {
                            array_push($errors, "There was an error updating your data.");
                            $conn->error;
                        }
                    } 
                } else {

                    move_uploaded_file($doctemp, $docfolder . $docnewName);

                    $query = "UPDATE `users` SET `profileImage` = '" . $newName . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                    $query .= "UPDATE `handyman` SET `hFirstName` = '" . $first_name . "', `hLastName` = '" . $last_name . "', `hEmailAddress` = '" . $email_address . "', `hContactNumber` = '" . $contact_number . "', `hAddress` = '" .    $address . "' ,`hBarangay` = '" .    $barangay . "', `hCity` = '" . $city . "', `hProvince` = '" . $province . "', `Services` = '" . $service_type . "', `ServicePrice` = '" . $price_range . "', `ServiceDesc` = '" . $service_desc . "' WHERE `UserId` = '" . $_SESSION['id'] . "' ;";

                    $query .= "UPDATE `users` SET `FirstName` = '" . $first_name . "', `LastName` = '" . $last_name . "', `EmailAddress` = '" . $email_address . "', `ContactNumber` = '" . $contact_number . "', `Address` = '" .    $address . "' ,`Barangay` = '" .    $barangay . "', `City` = '" . $city . "', `Province` = '" . $province . "' WHERE `id` = '" . $_SESSION['id'] . "' ;";

                    $query .= "UPDATE `bookings` SET `hmFirstName` = '" . $first_name . "', `hmLastName` = '" . $last_name . "', `bServiceType` = '" . $service_type . "' WHERE `HandymanId` = '" . $_SESSION['id'] . "' ";

                    // Save new updated image into session variables //
                    $_SESSION['image'] = $newName;

                    if (mysqli_multi_query($conn, $query)) {
                        array_push($messages, "Your data/image has been updated successfully!");
                    } else {
                        array_push($errors, "There was an error updating your data.");
                        $conn->error;
                    }
                }
            }
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>
    <link rel="shortcut icon" type="img/png" href="https://drive.google.com/uc?export=view&id=11faVxeXoK02-bDkLHPG1a4tA1SjCwh_n">
    <title>Home Aide</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }

    .container {
        padding-top: 2%;
        padding-top: 2%;

    }
    .container h2 {
        font-weight: 600;
        font-size: 36px;
    }
    .container h1 {
        font-weight: 700;
        font-size: 64px;
        color: #b9732f;
    }
    .container p {
        color: #606060;
        font-size: 16px;
    }
    .profileDisplay {
        display: block;
        border-radius: 50%;
        width: 80px;
        margin: 10px auto;
        height: 80px;
        object-fit: cover;
        background-position: center;
    }
    .card h6 {
        font-weight: 700;
        font-size: 22px;
        color: #b9732f;
    }
    .accept-btn button {
        padding: 6px 10px;
        background-color: transparent;
        color: #b9732f;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .decline-btn button {
        padding: 6px 10px;
        background-color: transparent;
        color: #606060;
        font-weight: 600;
        font-size: 14px;
        border-style: none;
    }
    .submit-btn {
        padding: 7px 8px;
        background-color: #b9732f;
        border-radius: 3px;
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        border-style: none;
    }
    .submit-btn:hover {
        background-color: #da8334;
    }
    .delete-action a{
        color: red;
        text-decoration: none;
    }
    form input[type="text"]:focus,
    form input[type="email"]:focus,
    form select[type="dropdown"]:focus,
    form select[type="dropdown"]:hover,
    textarea[type="text"]:focus,
    .md-textarea:focus {
        box-shadow: none;
        border-color: #da8334;
    }
    form input[type="text"],
    form input[type="email"],
    textarea[type="text"],
    form select[type="dropdown"],
    .input-group-text {
        font-size: 14px;
    }
    .delete-btn-modal {
        padding: 3px 6px;
        background-color: #c5c5c5;
        color: #303030;
        border-style: none;
        border-radius: 2px;
    }
    .cancel-delete-btn-modal {
        padding: 3px 6px;
        background-color: #b9732f;
        color: #fff;
        border-style: none;
        border-radius: 2px;
    }
    .lagayan {
        display: flex;
        flex-wrap: nowrap;
        max-width: 100px;
    }
    #thumbnail{
         display: flex;
    }
    #thumbnail img{
        border-radius: 4px;
        object-fit: cover;
        width: 150px;
        height: 150px;
        margin: 10px auto auto 5px;  
    }
   
    #files::file-selector-button {
        color: #fff;
        padding: 4px 14px;
        border-style: none;
        border-radius: 2px;
        background-color: #b9732f;
    }

    #files::file-selector-button:hover {
        background-color: #da8334;
    }
    
    #files::-webkit-file-upload-button {
        color: #fff;
        padding: 4px 8px;
        border-radius: 2px;
        background-color: #b9732f;
    }

    #files::-webkit-file-upload-button:hover {
        background-color: #e9e9e9;
        background-color: transparent;
    }

    #doc::file-selector-button {
        color: #fff;
        padding: 4px 14px;
        border-style: none;
        border-radius: 2px;
        background-color: #b9732f;
    }

    #doc::file-selector-button:hover {
        background-color: #da8334;
    }
    
    #doc::-webkit-file-upload-button {
        color: #fff;
        padding: 4px 8px;
        border-radius: 2px;
        background-color: #b9732f;
    }

    #doc::-webkit-file-upload-button:hover {
        background-color: #e9e9e9;
        background-color: transparent;
    }


    .thumbnail {
        overflow-x: auto;
    }
    .file-input {
        font-size: 14px;
    }
    .viewcred button {
        padding: 4px;
        border-radius: 2px;
        border-style: none;
        background-color: #b9732f;
    }
    .viewcred button:hover {
        background-color: #da8334;
    }
    .viewcred a {
        font-weight: 600;
        color: #fff;
        text-decoration: none;
    }
</style>

<body>
    <!-- navigation bar -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/home_aide/assets/";
    include($IPATH . "header.php"); ?>

    <!-- container 1 -->
    <div class="container">

    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "user")) { ?>
    <?php include 'configs/error.php' ?>

        <div class="row justify-content-center m-2">
            <div class=" card col-lg-8 p-4 pt-4 shadow">
                <form action="account_settings.php" method="POST" enctype="multipart/form-data">

                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'");
                    $row = mysqli_fetch_array($query);
                ?>

                    <div class="form-group text-center">
                        <h6>ACCOUNT INFORMATION</h6>
                        <b>Personal Details</b>
                        <div class="row text-center">
                            <div class="col-lg-12 text-center">
                                <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" onerror="this.src='https://image.flaticon.com/icons/png/128/2983/2983067.png';" onClick="triggerClick()" class="profileDisplay" id="profileDisplay">
                                <label for="profileImage"><small>Profile Image</small></label>
                                <input type="file" onChange="displayImage(this)" id="profileImage" class="form-control shadow-sm form-control-sm d-none" name="profileImage">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <small>First Name</small>
                                <input type="text" class="form-control shadow-sm" name="first_name" value="<?php echo $row['FirstName']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <small>Last Name</small>
                                <input type="text" class="form-control shadow-sm" name="last_name" value="<?php echo $row['LastName']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                            <small>Contact #</small>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+63</div>
                                    </div>
                                    <input type="text" class="form-control shadow-sm" name="contact_number" value="<?php echo $row['ContactNumber'] ?>" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <small>Email Address</small>
                                <input type="text" class="form-control shadow-sm" name="email_address" value="<?php echo $row['EmailAddress']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <small>Province</small>
                                <select type="dropdown" class="form-control shadow-sm" name="province" id="province" class="form-control input-lg" required>
                                    <option value="<?php echo $row['Province']; ?>" selected="selected"><?php echo $row['Province']; ?></option>
                                        <?php
                                        $query = "SELECT * FROM `province` WHERE status = 1 ORDER BY province_name ASC";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['province_name'] . '"> ' . $row['province_name'] . ' </option>';
                                            }
                                        } else {
                                            echo '<option value="">Country not available</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-lg-4 pb-2">
                                <?php 
                                $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'");
                                $row = mysqli_fetch_array($query);
                                ?>
                                <small>City/Municipality</small>
                                <select type="dropdown" class="form-control shadow-sm" name="city" id="city" class="form-control input-lg" required>
                                    <option value="<?php echo $row['City']; ?>" selected="selected"><?php echo $row['City']; ?></option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <small>Barangay</small>
                                <select type="dropdown" class="form-control shadow-sm" style="max-height: 75px" name="barangay" id="barangay" class="form-control input-lg">
                                    <option value="<?php echo $row['Barangay']; ?>" selected="selected"><?php echo $row['Barangay']; ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <small>Home Address (Unit No., Street No., etc.)</small>
                        <input type="text" class="form-control shadow-sm" name="address" value="<?php echo $row['Address']; ?>">
                    </div>
                    <div class="row">
                        <div class="col-6 my-2">
                            <div class="form-group">
                                <input type="submit" name="update" class="submit-btn w-100" value="Update"></a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-2">
                                <button type="submit" name="cancel" class="btn btn-secondary w-100" value="Cancel" onclick="goBack()"> Cancel</button>  
                            </div>
                        </div>
                        <div class="delete-action col-lg-12">
                            <a data-toggle="modal" name="delete-act" class="del-acct-btn" href="#delete-account" data-id="<?php echo $_SESSION['id']?>"><small><i class="fa fa-trash"> &nbsp; </i>Delete my Account</small> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php } else if (isset($_SESSION['role']) && ($_SESSION['role'] == "handyman")) { ?>

        <?php include('configs/error.php') ?>

        <div class="row justify-content-center">
            <div class="card mx-2 my-4 shadow">              
                <form action="account_settings.php" method="POST" enctype="multipart/form-data">

                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM `handyman` INNER JOIN `users` ON handyman.UserId = users.id WHERE `UserId` = '" . $_SESSION['id'] . "' ");
                        $row = mysqli_fetch_array($query);
                    ?>
                    <h6 class="text-center pt-4">ACCOUNT INFORMATION</h6>  
                    <div class="row">
                        <div class="col-lg-6 px-5">
                            <div class="form-group text-center mt-2">
                                <b>Personal Details</b>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" onerror="this.src='https://image.flaticon.com/icons/png/128/2983/2983067.png';" onClick="triggerClick()" class="profileDisplay" id="profileDisplay">
                                        <label for="profileImage"><small>Profile Image</small></label>
                                        <input type="file" onChange="displayImage(this)" id="profileImage" class="form-control shadow-sm form-control-sm d-none" name="profileImage">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <small>First Name</small>
                                        <input type="text" class="form-control shadow-sm" name="first_name" value="<?php echo $row['hFirstName']; ?>">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <small>Last Name</small>
                                        <input type="text" class="form-control shadow-sm" name="last_name" value="<?php echo $row['hLastName']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <small>Contact #</small>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+63</div>
                                            </div>
                                            <input type="text" class="form-control shadow-sm" name="contact_number" value="<?php echo $row['ContactNumber'] ?>" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <small>Email Address</small>
                                        <input type="text" class="form-control shadow-sm" name="email_address" value="<?php echo $row['hEmailAddress']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <small>Province</small>
                                        <select type="dropdown" class="form-control shadow-sm" name="province" id="province" class="form-control input-lg" required>
                                            <option value="<?php echo $row['hProvince']; ?>" selected="selected"><?php echo $row['hProvince']; ?></option>
                                            <?php
                                                $query = "SELECT * FROM `province` WHERE status = 1 ORDER BY province_name ASC";
                                                $result = $conn->query($query);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option value="' . $row['province_name'] . '"> ' . $row['province_name'] . ' </option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Country not available</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 pb-2">
                                        <?php 
                                            $query = mysqli_query($conn, "SELECT * FROM `handyman` WHERE UserId = '" . $_SESSION['id'] . "'");
                                            $row = mysqli_fetch_array($query);
                                        ?>
                                        <small>City/Municipality</small>
                                        <select type="dropdown" class="form-control shadow-sm" name="city" id="city" class="form-control input-lg" required>
                                            <option value="<?php echo $row['hCity']; ?>" selected="selected"><?php echo $row['hCity']; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <small>Barangay</small>
                                        <select type="dropdown" class="form-control shadow-sm" style="max-height: 75px" name="barangay" id="barangay" class="form-control input-lg">
                                            <option value="<?php echo $row['hBarangay']; ?>" selected="selected"><?php echo $row['hBarangay']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small>Home Address (Unit No., Street No., etc.)</small>
                                <input type="text" class="form-control shadow-sm" name="address" value="<?php echo $row['hAddress']; ?>">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12"> 
                                        <small>Certification/Resumé if you have any (PDF/Images)</small>
                                        <div class="input-group mb-3"> 
                                            <input type="file" class="file-input hidden" name="doc" id="doc">
                                        </div>
                                    </div>   
                                    <div class="col-lg-12"> 
                                        <?php if ($row['credentials'] == "") { ?>
                                            <h6 class="text-center"><small>Have not uploaded any credential.</small></h6>       
                                        <?php } else { ?>
                                            <div class="viewcred">
                                                <button class="mb-3 text-muted credentials w-100 "><a href ="resources/credentials/<?php echo $row['credentials']?>" target="_blank" rel="noopener noreferrer"><small>View Credential</small></a></button>
                                            </div>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-6 px-5">
                            <div class="form-group w-55 text-center mt-2">
                                <label for="choose_service"><b>Service Details</b></label>
                                <select id="choose_service" name="service_type" type="dropdown" class="form-control rounded-lg shadow-sm">
                                    <option><?php echo $row['Services']; ?></option>
                                    <option>Carpentry</option>
                                    <option>Cleaning</option>
                                    <option>Electrical</option>
                                    <option>Gardening</option>
                                    <option>Laundry</option>
                                    <option>Masonry</option>
                                    <option>Paint/Decor</option>
                                    <option>Pest Control</option>
                                    <option>Plumbing</option>
                                    <option>Technical</option>
                                    <option>Welding</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <small>Availability</small>
                                        <select id="availability" name="availability[]" type="dropdown" class="form-control selectpicker" multiple required>
                                            <option selected><?php echo $row['Availability']; ?></option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Weekdays">Weekdays</option>
                                            <option value="Weekends">Weekends</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <small>Hourly Rate</small>
                                        <select id="price" name="price_range" type="dropdown" class="form-control shadow-sm selectpicker" required>
                                            <option selected><?php echo $row['ServicePrice']; ?></option>
                                            <option>₱100</option>
                                            <option>₱150</option>
                                            <option>₱200</option>
                                            <option>₱250</option>
                                            <option>₱300</option>
                                            <option>₱350</option>
                                            <option>₱400</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12 ">    
                                        <small for="description">Service Description</small>
                                        <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="service_desc" rows="2" placeholder="Brief details about the service/s that you are offering."><?php echo $row['ServiceDesc']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="sampleImage"><small>Sample Works: (You can only select 3 image)</small></label>
                                        <div class="input-group">
                                            <input type="file" class="file-input" accept= "image/*" id="files" name="sampleWorks[]" onchange="checkFiles(this.files)"  multiple> 
                                        </div>
                                        <div class="row justify-content-center">
                                        <div id ="thumbnail" class="thumbnail pt-2">
                                            <?php                                           
                                                if ($row['sampleWorks'] == "") { ?>
                                                    <img src="https://drive.google.com/uc?export=view&id=1Jc0cv2rejXxgLdpmYtYZbTRvFW-qI0Jn">
                                            <?php  
                                                } else {
                                                    $temp = explode(',', $row['sampleWorks'] );

                                                    foreach($temp as $image){
                                                        $images[]="resources/sampleWorks/".trim(str_replace(array('[',']') ,"" ,$image) );
                                                    }
                                                    foreach($images as $image){
                                                    echo "<img src='{$image}' width='150px' height='150px' border-radius='4px' margin='5px 5px auto' object-fit='cover'/>";
                                                    } 
                                                } ?>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 pt-2">
                            <div class="form-group">
                                <div class="row justify-content-center text-center p-4">
                                    <div class="col-lg-4 col-md-6 py-2">
                                        <input type="submit" name="update" class="submit-btn w-100" value="Update">
                                    </div>
                                    <div class="col-lg-4 col-md-6 py-2">
                                         <button type="submit" name="cancel" class="btn btn-secondary w-100" value="Cancel" onclick="goBack()"> Cancel</button>  
                                    </div>
                                    <div class="delete-action col-lg-12 py-2">
                                        <a data-toggle="modal" name="delete-act" class="del-acct-btn" href="#delete-account" data-id="<?php echo $_SESSION['id']?>"><small><i class="fa fa-trash"> &nbsp; </i>Delete my Account</small> </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>     
        </div>
    
        <?php } ?>
    </div>
    
    <!-- end of container -->

    <!-- Start of Delete Account Modal -->
    <div class="delete-account">
        <div id="delete-account" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <form action="query/deleteAccount.php" class="" method="POST">
                        <div class="modal-header border-0">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <small>We are sad to see you go :(.</small><br><br>
                            <small>If you click <b>confirm</b> all of your details will be deleted in our system.</small><br><br>
                            <small>Are you sure you want to delete your account?</small>
                            <input type="hidden" name="sessionID" id="sessionID" value="" />
                        </div>
                        <div class="modal-footer border-0">
                            <button name="delete-button" class="delete-btn-modal float-right">Confirm</button>
                            <button name="cancel-delete-button" class="cancel-delete-btn-modal float-right" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Delete Account Modal -->

<?php include($IPATH . "footer.php"); ?>

</body>

<script>

    $('.my-select').selectpicker();
    // Dependent drop-down matrix
    $(document).ready(function() {
        $('#province').on('change', function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/d_dropDown.php',
                    data: 'province_id=' + provinceID,
                    success: function(html) {
                        $('#city').html(html);
                        $('#barangay').html('<option value="">Select City first</option>');
                    }
                });
            } else {
                $('#city').html('<option value="">Select Province first</option>');
                $('#barangay').html('<option value="">Select City first</option>');
            }
        });
        $('#city').on('change', function() {
            var cityID = $(this).val();
            if (cityID) {
                $.ajax({
                    type: 'POST',
                    url: 'assets/d_dropDown.php',
                    data: 'city_id=' + cityID,
                    success: function(html) {
                        $('#barangay').html(html);
                    }
                });
            } else {
                $('#barangay').html('<option value="">Select City first</option>');
            }
        });
    }); 
    // End of Dependent drop-down matrix

    // Delete Account Modal Toggle
    $(document).on("click", ".del-acct-btn", function() {
        var sessionId = $(this).data('id');
        $(".modal-body #sessionID").val(sessionId);
    });
    // End of Delete Account Modal Toggle

    //change profile image
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    // end ofchange profile image

    ///////////////////////////////////
    $("#choice").change(function () {
        if($(this).val() == "0") $(this).addClass("empty");
        else $(this).removeClass("empty")
    });
    $("#choice").change();
    ///////////////////////////////////

    //length of files
    function checkFiles(files) {       
        if(files.length>3) {
            alert("Length exceeded! Files have been truncated.");

            let list = new DataTransfer;
            for(let i=0; i<3; i++)
                list.items.add(files[i]) 

            document.getElementById('files').files = list.files
        }
    }
    // end of length of files

    // back button
    function goBack() {
        window.history.back();
    }

</script>

