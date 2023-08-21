<?php
include "config.php";

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id); // Assuming id is an integer, adjust the type if necessary

    if ($stmt->execute()) {
        echo "Record Deleted Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
