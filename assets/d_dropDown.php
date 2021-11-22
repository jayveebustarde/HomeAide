<?php 
// Include the database config file 
include_once '../configs/connect.php'; 
 
if(!empty($_POST["province_id"])){ 
    // Fetch state data based on the specific province
    $query = "SELECT * FROM city WHERE province_id = '".$_POST['province_id']."' AND status = 1 ORDER BY city_name ASC"; 
    $result = $conn -> query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select City</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
}elseif(!empty($_POST["city_id"])){ 
    // Fetch city data based on the specific barangay
    $query = "SELECT * FROM barangay WHERE city_id = '".$_POST['city_id']."' AND status = 1 ORDER BY barangay_name ASC"; 
    $result = $conn -> query($query); 
     
    // Generate HTML of barangay options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Barangay</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['barangay_name'].'">'.$row['barangay_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Barangay not available</option>'; 
    } 
} 
?>