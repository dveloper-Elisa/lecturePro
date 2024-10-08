<?php
include "./db_connection.php";

if (isset($_POST['class_id']) && isset($_POST['status'])) {
    $class_id = $_POST['class_id'];
    $status = $_POST['status'];

    $query = "UPDATE class SET status = ? WHERE class_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $status, $class_id);

    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
