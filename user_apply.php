<?php


    session_start();

    include 'configs/connect.php';

        $msg = "";
        $msg_class = "";

        if ($_SESSION['loggedin']!='true') {
        header('location: signin.php');
        }

        if (isset($_POST['apply'])) {

        $multiSelect = $_POST['availability'];
        $selectedOptions = implode(', ', $multiSelect);

        //for valid ID
        $validImageName = time() . '-' .  $_FILES['my_image']['name']; 
        $target_dir = 'resources/validID/';
        $target_file = $target_dir . basename($validImageName);
        $allowed_exts = array ('jpg', 'jpeg', 'png', 'gif'); 
        $image_type = array ('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
        $extension = strtolower(substr($validImageName, strpos ($validImageName, '.') +1));

        //for credentials
        $doc1 = $_FILES['doc']['name'];
        $doctemp = $_FILES["doc"]["tmp_name"];
        $docfolder = 'resources/credentials/';
        $doctargetfolder = $docfolder . basename( $_FILES['doc']['name']);
        $doc_allowed_exts = array ('jpg', 'jpeg', 'png', 'pdf'); 
        $doctype = $_FILES['doc']['type'];
        $docextension = strtolower(substr($_FILES['doc']['name'], strpos ($_FILES['doc']['name'], '.') +1));
        $docnewName = +time() . $doc1;
        
        //handyman data
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email_address'];
        $services = $_POST['services'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $book_address = $_POST['book_address'];
        $price_range = $_POST['price_range'];

        if($_FILES['my_image']['size'] > 5000000) {
            array_push($errors,"Valid ID size must not be more than 5MB!");    

        }
        // check if image file exists
        if(file_exists($target_file)) {
            array_push($errors, "Valid ID already exits");
        }

        if (in_array($extension, $allowed_exts) === false ) {
            array_push($errors, "Valid ID extension is not allowed! GIF, JPG, JPEG, PNG only.");
        }

        if(in_array($_FILES['my_image']['type'], $image_type) === false){
            array_push($errors, "Only images are the allowed file type for Valid ID.");
        }

        if (empty($errors)) { 

            move_uploaded_file($_FILES['my_image']['tmp_name'], $target_file);

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

                    $applyQuery = "INSERT INTO `handyman` (validID, credentials, UserId, ApplyStatus, hFirstName, hLastName, hEmailAddress, hContactNumber, hAddress, hBarangay, hCity, hProvince, Availability, Services, ServicePrice) VALUES ('$validImageName', '$docnewName','".$_SESSION['id']."','pending','".$_SESSION['first_name']."','".$_SESSION['last_name']."','".$email."','".$contact_number."','".$book_address."','".$barangay."','".$city."','".$province."','".$selectedOptions."','".$services."','".$price_range."')";

                    if (mysqli_query($conn, $applyQuery)){
                        array_push($messages, "Your application is now pending and under validation. Thank you!");
                        header('Location: user_dashboard.php');
                    } else {
                        array_push($errors,"There was an error in the database.");
                    }
                }
            } else {
                $applyQuery = "INSERT INTO `handyman` (validID, UserId, ApplyStatus, hFirstName, hLastName, hEmailAddress, hContactNumber, hAddress, hBarangay, hCity, hProvince, Availability, Services, ServicePrice) VALUES ('$validImageName', '".$_SESSION['id']."','pending','".$_SESSION['first_name']."','".$_SESSION['last_name']."','".$email."','".$contact_number."','".$book_address."','".$barangay."','".$city."','".$province."','".$selectedOptions."','".$services."','".$price_range."')";

                if (mysqli_query($conn, $applyQuery)){
                    array_push($messages, "Your application is now pending and under validation. Thank you!");
                    header('Location: user_dashboard.php');
                } else {
                    array_push($errors,"There was an error in the database.");
                }
            } 
        } else {
            array_push($errors, "There was an error applying as a handyman.");
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    
    <title>Home Aide</title>
    <style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
    }
    .container {
        padding-top: 2%;
        padding-bottom: 4%;
    }

    #idDisplay{
        display: block;
        border-radius: 4px;
        width: 200px;
        margin: 10px auto;
    }
    .container h6 {
        font-weight: 700;
        font-size: 22px;
        color: #b9732f;
    }
    .input-group-btn label {
        color: #b9732f;
        font-size: 14px;
        font-weight: 600;
    }
    .btn-primary {
        background-color: #b9732f;
        border-color: #b9732f;
        font-size: 14px;
    }
    .btn-secondary {
        font-size: 14px;
    }
    .btn-primary:hover {
        background-color: #da8334;
        border-color: #b9732f;
    }
    .input-group-btn{
        color: #b9732f;
    }
    .input-group-btn h5 {
        font-size: 14px;
        font-weight: 500;
    }
    .btn-browse:hover {
        color: #da8334;
    }
    form input[type="email"],
    form input[type="text"],
    form select[type="dropdown"],
    form input[type="date"],
    form textarea[type="text"],
    .input-group-text {
        font-size: 14px;
    }
    form input[type="email"]:focus,
    form input[type="text"]:focus,
    form input[type="submit"]:active,
    form select[type="dropdown"]:hover,
    form select[type="dropdown"]:focus,
    form input[type="date"]:focus,
    form textarea[type="text"]:focus {
        box-shadow: none;
        border-color: #da8334;
    }
</style>
</head>


<body>
    <!-- navigation bar -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/home_aide/assets/"; include($IPATH. "header.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-4 rounded-lg shadow">
                    <form action="user_apply.php" method="post" enctype="multipart/form-data">
                    <?php 
                        include 'configs/error.php'
                    ?>
                        <h6 class="text-center">HANDYMAN APPLICATION FORM</h6>
                        <div class="form-group">
                            <label for="services"><small>Services</small></label>
                            <div class="drop-down">
                                <select type="dropdown" id="multiselect" name="services" class="form-control w-100 shadow-sm" placeholder="Services" required>
                                    <option value="Carpentry">Carpentry</option>
                                    <option value="Cleaning">Cleaning</option>
                                    <option value="Electrical">Electrical</option>
                                    <option value="Gardening">Gardening</option>
                                    <option value="Laundry">Laundry</option>
                                    <option value="Masonry">Masonry</option>
                                    <option value="Paint/Decor">Paint/Decor</option>
                                    <option value="Pest Control">Pest Control</option>
                                    <option value="Plumbing">Plumbing</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Welding">Welding</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                                    <small>Province</small>
                                    <select type="dropdown" class="form-control shadow-sm" name="province" id="province" class="form-control input-lg" required>
                                        <option value="">Select Province</option>

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
                                <div class="col-lg-6 pb-2">
                                    <small>City/Municipality</small>
                                    <select type="dropdown" class="form-control shadow-sm" name="city" id="city" class="form-control input-lg" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <small>Barangay</small>
                                    <select type="dropdown" class="form-control shadow-sm" style="max-height: 75px" name="barangay" id="barangay" class="form-control input-lg">
                                        <option value="">Select Barangay</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <small>Contact #</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+63</div>
                                        </div>
                                        <input type="text" class="form-control shadow-sm" name="contact_number" placeholder="Contact Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <small>Home Address (Unit No., Street No.)</small>
                                    <input type="text" class="form-control shadow-sm" name="book_address" placeholder="Home Address" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <small>Availability</small>
                                        <select type="dropdown" id="availability" name="availability[]" class="form-control shadow-sm selectpicker" placeholder="Select days" multiple required>
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <small>Select your hourly rate.</small>
                                        <select type="dropdown" id="price" name="price_range" class="form-control shadow-sm selectpicker" placeholder="Hourly Rate:" required>
                                            <option value="₱100">₱100</option>
                                            <option value="₱150">₱150</option>
                                            <option value="₱200">₱200</option>
                                            <option value="₱250">₱250</option>
                                            <option value="₱300">₱300</option>
                                            <option value="₱350">₱350</option>
                                            <option value="₱400">₱400</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <small>Email Address</small>
                                        <input type="email" class="form-control" name="email_address" placeholder="Email Address" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <small>Certification/Resumé if you have any (PDF/Images)</small>
                                <div class="input-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-primary"> <h5><i class="fa fa-folder-open-o"></i>
                                            Browse&hellip; </h5><input type="file" name="doc" id="doc" style="display: none;" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group text-center">
                                    <label for="idImage">
                                    <small>Please upload any valid ID for verification.</small>
                                    </label> <br>
                                    <input type="file" name="my_image" onChange="displayImage(this)" id="idImage"  class="form-control" style="display: none;" required >
                                    <img src="https://drive.google.com/uc?export=view&id=1qo5MsFQgK1H1DKt-IkdGRqDEhRWwyOnf" onClick="triggerClick()" id="idDisplay">   
                                </div> 
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-6">
                                <div class="form-group my-2">
                                    <input type="submit" name="apply" class="btn btn-primary w-100" value="Apply">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group my-2">
                                    <a class="btn btn-secondary w-100" href="user_dashboard.php">Cancel</a>
                                </div>
                            </div>
                        </div>          
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
   
    $('.my-select').selectpicker();

    // for uplaoding images
    function triggerClick(e) {
        document.querySelector('#idImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e){
            document.querySelector('#idDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    } // for uploading images

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
        }); // End of Dependent drop-down matrix

    $(function() {
    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        });
    });
});
</script>

</html>