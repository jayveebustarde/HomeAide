<?php

    include '../configs/connect.php';


    if(isset($_POST["checkbox"])){ 
        // Fetch state data based on the specific province
        $query = "SELECT * FROM `users` WHERE id = '".$_SESSION['id']."'";
        $result = $conn -> query($query);
		$row = $result -> fetch_assoc();
         
        // Generate HTML of city options list 
        if($result->num_rows > 0){ 
            echo '<option value="">Select City</option>'; 
            while($row = $result->fetch_assoc()){  
                echo '<option value="'.$row['Province'].'">'.$row['Province'].'</option>'; 
            } 
        }else{ 
            echo '<option value=""></option>';
        }
    }

?>