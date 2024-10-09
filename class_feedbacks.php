<?php
// Database connection
include "./db_connection.php";

// Get class_id from URL
$class_id = $_GET['class_id'];

// Fetch feedbacks for the selected class, ordered by latest
$sql = "SELECT feadback_id, module_name, comment, lecturer 
        FROM feadback 
        WHERE class_id = $class_id 
        ORDER BY feadback_id DESC";
$result = $conn->query($sql);

// Display feedbacks arranged by module name
if ($result->num_rows > 0) {
    echo "<h1>Feedbacks for Class</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='feedbacks_by_module.php?module_name=" . urlencode($row['module_name']) . "'>" . $row['module_name'] . "</a> - Lecturer: " . $row['lecturer'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No feedbacks found for this class.";
}

$conn->close();
?>
