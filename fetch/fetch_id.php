<?php

include '../configs/connect.php';

if ($_POST['rowid']) {

    $id = $_POST['rowid'];

    $userQuery = "SELECT * FROM `handyman` WHERE `UserId` = '$id' ";

    $result = $conn->query($userQuery);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) { ?>
            <label>
                <h6><?php echo $row['hFirstName'] . " " . $row['hLastName'];
                    echo "<br>"; ?></h6>
                <label>
                    <div class="card-body">
                        <?php echo "<img src='resources/validID/" . $row['validID'] . "' width='400px' class=''>"; ?>
                    </div>
        <?php }
    }
}
        ?>