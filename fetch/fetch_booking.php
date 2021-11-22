<?php 

include '../configs/connect.php';

if ($_POST['bookID']) {

    $bookID = $_POST['bookID'];

    $query = "SELECT * FROM `bookings` WHERE `booking.id` = '".$bookID."' ";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if (mysqli_query($conn, $query)) { ?>

        <div class="letter">
            <h6>umaaay</h6>
        </div>
           
<?php }
}

?>