<?php
// Database connection
include "./db_connection.php";
// Fetch class names
$sql = "SELECT class_id, class_name FROM class";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Class List</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='class_feedbacks.php?class_id=" . $row['class_id'] . "'>" . $row['class_name'] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "No classes found.";
}

$conn->close();
?>
