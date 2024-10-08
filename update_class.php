<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include "./db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $department = $_POST['department'];
    $option_name = $_POST['option_name'];
    $promotion = $_POST['promotion'];

    $query = "UPDATE class SET class_name = ?, department = ?, option_name = ?, promotion = ? WHERE class_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssii', $class_name, $department, $option_name,$promotion, $class_id);

    if ($stmt->execute()) {
        header("location: viewclass.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
