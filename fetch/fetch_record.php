<?php

include '../configs/connect.php';

if ($_POST['rowid']) {

    $id = $_POST['rowid'];

    $average = mysqli_query($conn, "SELECT ROUND(AVG(rating), 2) AS AveragePrice FROM `ratings` WHERE Ratee = '$id' ");
    $row = mysqli_fetch_array($average);
    $aveRating=$row['AveragePrice'];

    $userQuery = "SELECT * FROM ((`ratings`  INNER JOIN `handyman` ON ratings.Ratee = handyman.UserId) INNER JOIN `users` ON ratings.Ratee = users.id ) WHERE ratings.Ratee = '$id' ";
    $result = mysqli_query($conn, $userQuery);
        
    if ($result->num_rows > 0) {
        $row = $result -> fetch_assoc(); ?>
            <div class="row">
                <div class="col-6">
                    <div class="card text-center my-1 p-2">
                        <div class="img-container text-center">
                            <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" width='100px' height='100px' class='rounded border' onerror="this.src='https://image.flaticon.com/icons/png/128/2983/2983067.png';"> 
                        </div>
                        <h6 class="mb-1 pt-2"> &nbsp; <?php echo $aveRating?> <i class="fa fa-star"></i></h6>
                        <h6 class="card-titles">
                            <?php echo $row['hFirstName'] . " " . $row['hLastName'];
                            echo "<br>"; ?></h6>
                        <h6 class="pt-2"><small>Service Description:</small> </h6>
                        <?php 
                            if ($row['ServiceDesc'] == "") {
                                echo ('<small>No description yet.</small>');
                            } else { ?>
                            <h6 class="mb-3 text-muted"><small> <?php echo $row['ServiceDesc'] ?></small></h6>
                            <?php 
                            } 
                        ?>
                    </div>
                    <?php 
                    if ($row['credentials'] == "") { ?>
                        <h6 class="text-center"><small>Have not uploaded any credential.</small></h6>        
                    <?php 
                    } else { ?>
                        <button class="mb-3 text-muted credentials w-100"><a href ="resources/credentials/<?php echo $row['credentials']?>" target="_blank" rel="noopener noreferrer"> <small>View Credential</small> </a></button>
                    <?php 
                    } ?>
                </div>
                <div class="col-6 text-center">  
                    <h6> <small> Recent Reviews:</small></h6>
                    <?php
                    $query = "SELECT * FROM `ratings` INNER JOIN `bookings` ON ratingId = `booking.id` WHERE `Ratee` = '$id' ORDER BY ratingId DESC LIMIT 4";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="card my-1">
                                <div class="card-body p-1">
                                    <?php   
                                    for ($i = 1; $i <= 5; $i++) {
                                        if (round($row['rating'] - .25) >= $i) {
                                            echo "<i class='fa fa-star mt-2'></i>"; //fas fa-star
                                        } elseif (round($row['rating'] + .25) >= $i) {
                                            echo "<i class='fa fa-star-half-o mt-2'></i>"; //fas fa-star-half-alt 
                                        } else {
                                            echo "<i class='fa fa-star-o mt-2'></i>"; //far fa-star
                                        }
                                    }
                                    echo "<h6 class = 'mt-1 text-muted'> <small>" . $row['review'] . " </small></h6>"; ?>
                                </div>
                            </div>
                        <?php 
                        }
                    } ?>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-lg-12 text-center">
                    <h6> <small> <b> Sample Works </b> </small> </h6>
                </div>
         
                <div class="row img-container justify-content-center">
                    <div id = "thumbnail" class="thumbnail">   
                        <?php 
                        $query = mysqli_query($conn, "SELECT `sampleWorks` FROM `handyman` WHERE `UserId` = '$id' ");
                        if ($row = mysqli_fetch_array($query)) {
                            if ($row['sampleWorks'] == "") {
                                echo "<img src='https://drive.google.com/uc?export=view&id=1Jc0cv2rejXxgLdpmYtYZbTRvFW-qI0Jn'>";
                            } else {
                                $temp = explode(',',$row['sampleWorks'] );

                                foreach($temp as $image){
                                    $images[]="resources/sampleWorks/".trim( str_replace( array('[',']') ,"" ,$image ) );
                                }
                                foreach($images as $image){
                                echo "<img src='{$image}' >";
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>

    <?php } else {

            $userQuery = "SELECT * FROM `handyman`  INNER JOIN `users` ON handyman.UserId = users.id WHERE handyman.UserId = '$id' "; 
            $result = mysqli_query($conn, $userQuery);

            if ($result->num_rows > 0) {

            $row = $result -> fetch_assoc(); ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="card text-center my-1 p-2">
                            <div class="img-container">
                                <img src="<?php echo 'resources/profileImage/' . $row['profileImage'] ?>" width='70px' height='70px' class='rounded-circle mb-2' onerror="this.src='https://image.flaticon.com/icons/png/128/2983/2983067.png';">
                                <h6>0 <i class="fa fa-star"></i></h6>
                                <h6 class="card-titles"> <?php echo $row['hFirstName'] . " " . $row['hLastName']; echo "<br>"; ?></h6>
                                <h6 class="pt-2"><small> Service Description:</small></h6>
                            <?php if ($row['ServiceDesc'] == "") {
                                 echo ('<small>No description yet.</small>');
                            } else { ?>
                                <h6 class="mb-3 text-muted"> <small> <?php echo $row['ServiceDesc'] ?></small></h6>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card py-2 my-1">
                            <?php if ($row['credentials'] == "") { ?>
                                <h6><small>Have not uploaded any credential.</small></h6>
                            <?php } else { ?>
                                <button class="mb-3 text-muted credentials"><a href ="resources/credentials/<?php echo $row['credentials']?>" target="_blank" rel="noopener noreferrer"> <small>View Credential</small> </a></button>
                            <?php } ?> 
                        </div>
                        <div class="card py-2 my-1">
                            <h6><small>No reviews yet.</small></h6>
                        </div>

                        <h6> <small> <b> Sample Works </b> </small> </h6>
                        <div class="row img-container justify-content-center">
                            <div id = "thumbnail" class="thumbnail">   
                                <?php 
                                $query = mysqli_query($conn, "SELECT `sampleWorks` FROM `handyman` WHERE `UserId` = '$id' ");
                                if ($row = mysqli_fetch_array($query)) {
                                    if ($row['sampleWorks'] == "") { ?>
                                        <img src="https://drive.google.com/uc?export=view&id=1Jc0cv2rejXxgLdpmYtYZbTRvFW-qI0Jn">
                                    <?php } else {
                                        $temp = explode(',',$row['sampleWorks'] );

                                        foreach($temp as $image){
                                            $images[]="resources/sampleWorks/".trim( str_replace( array('[',']') ,"" ,$image ) );
                                        }
                                        foreach($images as $image){
                                        echo "<img src='{$image}' >";
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>  
                </div>     
            <?php }
}
} ?>

<style> 
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
</style>
