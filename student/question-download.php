<?php
include('../config.php');
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        
 
        // Fetch the file information
        $query = "
            SELECT `question_type`, `question_file_name`, `question_size`, `question_content`
            FROM `question`
            WHERE `question_id` = {$id}";
        $result = $connect->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Type: ". $row['question_type']);
                header("Content-Length: ". $row['question_size']);
                header("Content-Disposition: attachment; filename=". $row['question_file_name']);
 
                // Print data
                echo $row['question_content'];
            }
            else {
                echo 'Error! No data exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$connect->error}</pre>";
        }
        @mysqli_close($connect);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>