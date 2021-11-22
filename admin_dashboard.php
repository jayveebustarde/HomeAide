<?php

    session_start();
    include 'configs/connect.php';

    if($_SESSION['loggedin']!="true"){
        header('Location: signin.php');
    }
    if($_SESSION['role']!='admin') {
        header('location: signin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="img/png" href="https://drive.google.com/uc?export=view&id=11faVxeXoK02-bDkLHPG1a4tA1SjCwh_n">
    <title>Home Aide</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="img/png" href="https://drive.google.com/uc?export=view&id=11faVxeXoK02-bDkLHPG1a4tA1SjCwh_n">
    <title>Home Aide</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
    }
    .navbar {
        padding: 10px 8% 0px 8%;
        background-color: #fff;
    }

    .container {
        padding-top: 2%;
        padding-bottom: 2%;
    }

    .dash-title {
        color: #404040;
        font-size: 14px;
        font-weight: 500;
    }
    .dash-title-b {
        color: #404040;
        font-size: 28px;
        font-weight: 600;
    }

    input[type=button], input[type=submit], input[type=reset] {
        background-color: transparent;
        border: none;
        color: white;
        text-decoration: none;
        cursor: pointer;
    }

    .table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        width: 100%;
    }    
    .table thead {
        display: block;
    } 
    .table tbody {
        height: 400px; 
        overflow-y: auto;
        overflow-x: auto;
        display: block;
    }       
    tbody td, thead th {
        width : 300px;
    }
    .table thead tr {
        background-color: #b9732f;
        color: #fff;
    }


    #idDisplay{
        display: block;
        border-radius: 10%;
        width: 30px;
        margin: auto;
    }

    .fa-check {
        color: #b9732f;
        font-size: 20px;
    }
    .fa-close {
        color: #606060;
        font-size: 20px;
    }
    .fa-photo {
        color: #606060;
        font-size: 30px;

    }
    .reject-application button {
        border-style: none;
        background-color: transparent;
        color: #404040;
        font-weight: 600;
    }
    .accept-application button {
        border-style: none;
        background-color: transparent;
        color: #404040;
        font-weight: 600;
    }

    .card-side {
        border-radius: 8px;
    }
    .card-side:hover {
        border: 1px solid #b9732f;
    }
    .card-body h5{
        font-size: 12px;
        color: #606060;
    }
    .card-body h6{
        font-size: 16px;
        color: #606060;
    }
    .card-body h4{
        font-size: 22px;
        font-weight: 600;
        color: #404040;
    }
    .fa {
        color: #b9732f;
        font-size: 24px;
    }
    .card-body p{
        font-size: 14px;
        
    }

    #view_bookings,
    #view_requests,
    #view_users,
    #view_messages { 
        color: #b9732f;
        font-size: 14px;
        font-weight: 500;
    }
    #view_bookings:hover,
    #view_requests:hover,
    #view_users:hover,
    #view_messages:hover { 
        color: #404040;
        font-size: 14px;
        font-weight: 500;
    }


    .table-title {
        font-size: 16px;
        color: #606060;
        font-weight: 600;
    }
    .th-sm {
        font-size: 14px;
    }
    .card-message:hover {
        border: 1px solid #b9732f;
    }

    .card-info h6{
        font-size: 14px;
        color: #404040;
    }
    .card-info h3 {
        font-size: 12px;
        color: #404040;
    }
    .card-footer button {
        background-color: transparent;
        border-style: none;
    }
    .fa-mail-reply {
        color: #b9732f;
    }
    .fa-mail-reply:hover {
        color: #da8334;
    }
    .card-footer button:hover {
        background-color: transparent;
        border-style: none;
    }
    :focus {
    outline: none !important;
    }
    .message-respond button {
        border-style: none;
        background-color: transparent;
        color: #404040;
        font-weight: 600;
    }


</style>
<body>
<nav class="navbar sticky-top navbar-light navbar-expand-lg bg-#fff">

    <a class="navbar-brand d-block order-0 order-md-0 w-25" href="landing.php"><img src="https://drive.google.com/uc?export=view&id=1xlR9M1FzmUxVYpGCvxkkyaSIMl0S3Xxc"  alt="" width="180px" height="60px"></a>
 
</nav>
    <div class="container">
        <h6 class="dash-title">Dashboard</h6>
        <h5 class="dash-title-b">Overview</h5>
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-side shadow-sm">
                    <div class="card-body">

                    <?php 
                        $bookingsQuery = "SELECT * FROM `bookings`";
                        $result = $conn -> query($bookingsQuery);
                        $total_bookings = $result -> num_rows;

                        $completedQuery = "SELECT * FROM `bookings` WHERE Status = 'completed'";
                        $result = $conn -> query($completedQuery);
                        $completed = $result -> num_rows; 
                    ?>
                        
                        <h6 class="text-center"><i class="fa fa-calendar float-center"></i></h6>
                        <h4 class="text-center"><?php echo "$total_bookings" ?> </h4> 
                        <h5 class="card-title text-center">Total no of bookings</h5>
                        <form action="" method="POST" class="text-center">
                            <input type="submit" name="view_bookings" id="view_bookings" class="text-center view-all" value="View">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-side shadow-sm" type="submit">
                    <div class="card-body">
                    
                    <?php 
                        $requestQuery = "SELECT * FROM `handyman`";
                        $result = $conn -> query($requestQuery);
                        $total_requests = $result -> num_rows;

                        $acceptedQuery = "SELECT * FROM `handyman` WHERE ApplyStatus = 'accepted'";
                        $result = $conn -> query($acceptedQuery);
                        $accepted = $result -> num_rows;
                        
                        $rejectedQuery = "SELECT * FROM `handyman` WHERE ApplyStatus = 'rejected'";
                        $result = $conn -> query($rejectedQuery);
                        $rejected = $result -> num_rows; 
                    ?>
                        
                        <h6 class="text-center"><i class="fa fa-user float-center"></i></h6>
                        <h4 class="text-center"> <?php echo "$total_requests" ?></h4>
                        <h5 class="card-title text-center">Total no of applications</h5>
                        <form action="" method="POST" class="text-center">
                            <input type="submit" name="view_requests" id="view_requests" value="View">
                        </form>
                    </div>
                </div>
           </div>
           <div class="col-lg-3">
                <div class="card card-side shadow-sm">
                    <div class="card-body">
                    <?php 
                        $usersQuery = "SELECT * FROM `users`";
                        $result = $conn -> query($usersQuery);
                        $total_users = $result -> num_rows;

                        $userQuery = "SELECT * FROM `users` WHERE UserRole = 'user'";
                        $result = $conn -> query($userQuery);
                        $user = $result -> num_rows; 
                    ?>
                        
                        <h6 class="text-center"><i class="fa fa-users float-center"></i></h6>
                        <h4 class="text-center"><?php echo "$total_users" ?></h4>
                        <h5 class="card-title text-center">Total no of Users</h5>
                        <form action="" method="POST" class="text-center">
                            <input type="submit" name="view_users" id="view_users" class="float-center" value="View">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-side shadow-sm">
                    <div class="card-body">
                        <?php 
                        $msgQuery = "SELECT * FROM `messages`";
                        $result = $conn -> query($msgQuery);
                        $total_msgs = $result -> num_rows;
                        ?>
                        <h6 class="text-center"><i class="fa fa-envelope float-center"></i></h6>
                        <h4 class="text-center"><?php echo "$total_msgs" ?></h4>
                        <h5 class="card-title text-center">Messages</h5>
                        <form action="" method="POST" class="text-center">
                            <input type="submit" name="view_messages" id="view_messages" class="float-center" value="View">
                        </form>
                    </div>
                </div>
           </div>
        </div>      
                
        
        
        <div class="row">     
            <div class="col-lg-12 table-responsive">
                <table class="table table-hover rounded-lg shadow ">

                <!-- check bookings table -->
                <?php 
                        if(isset($_POST['view_bookings'])) {

                        $sql = "SELECT * FROM ((bookings INNER JOIN users ON bookings.UserId = users.id) INNER JOIN handyman ON bookings.HandymanId = handyman.UserId)";
                        
                        $result = $conn -> query($sql);

                        if ($result-> num_rows > 0){ ?>
 
                        <h6 class="dash-title pt-4">Booking Table</h6>
                        
                        <thead>
                            <tr>
                                <th class="th-sm" scope="col">#</th>
                                <th class="th-sm" scope="col">Customer</th>
                                <th class="th-sm" scope="col">Service</th>
                                <th class="th-sm" scope="col">Handyman</th>
                                <th class="th-sm" scope="col">Status</th>
                                <th class="th-sm" scope="col">Book Date</th>      
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
                            while ($row = $result -> fetch_assoc()) { ?>
                            <tr>
                                <td> <?php echo $row['booking.id'] ?></td>
                                <td> <?php echo $row['FirstName'] ?> </td>
                                <td> <?php echo $row['bServiceType'] ?></td>
                                <td> <?php echo $row['hFirstName'] ?> </td>
                                <td> <?php echo $row['Status'] ?></td>
                                <td> <?php echo $row['BookingDate'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    <?php } ?>
                <?php } ?>

                <!-- applications tables -->
                    <?php 
                        if(isset($_POST['view_requests'])) {

                    $sql = "SELECT * FROM `users` INNER JOIN `handyman` ON users.id = handyman.UserId WHERE ApplyStatus = 'pending'";
                        $result = $conn -> query($sql);
                        if ($result-> num_rows > 0){ ?>
                        <h6 class="dash-title pt-4">Applications Table</h6>
                        <thead>
                        <tr>
                            <th class="th-sm" scope="col">#</th>
                            <th class="th-sm text-center" scope="col">Full Name</th>
                            <th class="th-sm text-center" scope="col">Service/s</th>
                            <th class="th-sm text-center" scope="col">Service Area</th>
                            <th class="th-sm text-center" scope="col">Valid ID</th>
                            <th class="th-sm text-center" scope="col">Actions</th>        
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                            while ($row = $result -> fetch_assoc()) { ?>
                            <tr>
                                <td> <?php echo $row['id'] ?></td>
                                <td> <?php echo $row['hFirstName']," ", $row['hLastName'] ?> </td>
                                <td> <?php echo $row['Services'] ?></td>
                                <td> <?php echo $row['hCity'],", ", $row['hProvince'] ?></td>
                                <td>
                                    <div class="col-6">
                                        <a data-toggle="modal" class="view-btn" href="#viewID" data-id="<?php echo $row['UserId']?>"><i class="fa fa-photo"></i></a>
                                    </div>
                                </td> 
                                <td> <div class="row justify-content-center">
                                        <div class="col-6">
                                            <a data-toggle="modal" class="accept-btn" href="#acceptModal" data-id="<?php echo $row['UserId']?>"><i class="fa fa-check"></i></a>  
                                        </div>
                                        <div class="col-6">
                                            <a data-toggle="modal" class="reject-btn" href="#rejectModal" data-id="<?php echo $row['UserId']?>"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div> 
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    <?php } else {
                        echo "There are no pending applications as of the moment.";
                    } ?>
                <?php } ?>
                      
                    

                 <!-- users tables -->
                <?php 
                    if(isset($_POST['view_users'])) {
                    $sql = "SELECT * FROM `users`";
                    $result = $conn -> query($sql);
                    if ($result-> num_rows > 0){ ?>
                        <h6 class="dash-title pt-4">Users Table</h6>
                        <thead>
                        <tr>
                            <th class="th-sm" scope="col">#</th>
                            <th class="th-sm" scope="col">User Type</th>
                            <th class="th-sm" scope="col">Full Name</th>
                            <th class="th-sm" scope="col">Email Address</th>      
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            while ($row = $result -> fetch_assoc()) { ?>
                            <tr>
                                <td> <?php echo $row['id'] ?></td>
                                <td> <?php echo $row['UserRole'] ?></td>
                                <td> <?php echo $row['FirstName']," ", $row['LastName'] ?> </td>
                                <td> <?php echo $row['EmailAddress'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    <?php } ?>
                <?php } ?> 
                </table>
            </div> 

            
    
                <?php
                if (isset($_POST['view_messages'])) {

                    $message = "SELECT * FROM `messages` WHERE response != 'yes' ";
                    $result = $conn -> query($message); ?>
                    <div class="col-lg-9">
                <h6 class="dash-title">Messages</h6> 
                <hr style="height:.5px; background-color:#b9732f"> 
                <div class="row">

                <?php while ($row = $result -> fetch_assoc()) { ?>
            
                    <div class="col-lg-4 pb-2">
                        <div class="card card-message">
                            <div class="card-body card-info">
                                <h3><?php echo $row['id'] ?></h3>
                                <h6><?php echo $row['email_address'] ?></h6>
                                <h6><?php echo $row['full_name'] ?></h6>
                                <hr style="height:.1px; background-color:909090">
                                <h6><?php echo $row['msg'] ?></h6>
                            </div>
                            <div class="card-footer text-right border-0">
                                <a data-toggle="modal" class="message_response" href="#respondModal" data-id="<?php echo $row['id'] ?>" data-msg="<?php echo $row['msg'] ?>"data-email="<?php echo $row['email_address'] ?>"><i class="fa fa-mail-reply"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3">
                <h6 class="dash-title">Responded messages</h6>
                <hr style="height:.5px; background-color:#b9732f">

                <?php 
                $query = "SELECT * FROM `messages` WHERE response = 'yes' ORDER BY id DESC LIMIT 3" ;
                $result = $conn -> query($query);
                
                while ($row = $result -> fetch_assoc()) { ?>
                <div class="card card-message pt-0 mb-2">
                    <div class="card-body card-info">
                        <h3><?php echo $row['id'] ?></h3>
                        <h6><?php echo $row['email_address'] ?></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div> 
           
            <?php } ?>        
        </div>            
    </div>


<!-- MODALS -->

    <!-- ACCEPT APPLICATION MODAL -->
    <div class="accept-application">
        <div id="acceptModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <form action="email/sendMail.php" class="" method="POST">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Accept Application?</p>
                        <input type="hidden" name="acceptId" id="acceptId" value=""/>
                    </div>
                    <div class="modal-footer border-0">
                        <button name="accept-application" class="btn-reject float-right">Yes</button>
                    </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <!-- REJECT APPLICATION MODAL -->
    <div class="reject-application">
        <div id="rejectModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <form action="email/sendMail.php" class="" method="POST">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Reject Application?</p>
                        <input type="hidden" name="rejectId" id="rejectId" value=""/>
                    </div>
                    <div class="modal-footer border-0">
                        <button name="reject-application" class="btn-reject float-right">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- RESPOMD TO MESSAGE -->
    <div class="message-respond">
        <div id="respondModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <form action="email/sendMail.php" method="POST">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Write Response</p>
                        <input type="hidden" name="msgres" id="msgres" value=""/>
                        <input type="hidden" name="message" id="message" value=""/>
                        <input type="hidden" name="full_name" id="full_name" value=""/>
                        <b><input type="text" style="border:0" class="text-center" name="msgem" id="msgem" value=""/></b> <br><br>
                        <textarea name="response" id="" cols="30" rows="4"></textarea>
                    </div>
                    <div class="modal-footer border-0">
                        <button name="send-response" class="btn-respond float-right">Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- VIEW ID MODAL -->
    <div class="view-profile">
        <div id="viewID" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content border">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body modal-bodyy text-center">
                                        <!-- DITO -->
                        <input type="submit" name="viewId" id="viewId" value=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<script>

//accept application modal toggle
$(document).on("click", ".accept-btn", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #acceptId").val( myBookId );
});

//reject application modal toggle
$(document).on("click", ".reject-btn", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #rejectId").val( myBookId );
});

// respond to message modal toggle
$(document).on("click", ".message_response", function () {
    var myBookId = $(this).data('id');
    var eMail = $(this).data('email');
    var message = $(this).data('msg');
    $(".modal-body #msgres").val( myBookId );
    $(".modal-body #msgem").val( eMail );
    $(".modal-body #message").val( message );
});

//view id for application modal toggle
$(document).on("click", ".view-btn", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #viewId").val( myBookId );
});

      // start of script for view profile modal
      $(document).ready(function(){
        $('#viewID').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'fetch/fetch_id.php', //Here you will fetch records 
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                $('.modal-bodyy').html(data);//Show fetched data from database
                }
            });
        });
    }); // end of script for view profile modal

</script>
</body>
</html>