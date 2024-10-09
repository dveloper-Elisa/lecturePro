<?php
// Database connection
include "./db_connection.php";

// Get module_name from URL
$module_name = urldecode($_GET['module_name']);

// Fetch all feedbacks for the selected module
$sql = "SELECT * FROM feadback WHERE module_name = '$module_name'";
$result = $conn->query($sql);

// Display feedbacks one after another with "Generate PDF" button
if ($result->num_rows > 0) {
    echo "<h1>Feedbacks for Module: $module_name</h1>";
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;'>";
        echo "<p><strong>Lecturer:</strong> " . $row['lecturer'] . "</p>";
        echo "<p><strong>Comment:</strong> " . $row['comment'] . "</p>";
        echo "<form action='generate_pdf.php' method='POST'>";
        echo "<input type='hidden' name='feedback_id' value='" . $row['feedback_id'] . "'>";
        echo "<button type='submit'>Generate PDF</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No feedbacks found for this module.";
}

$conn->close();
?>
