<!-- <?php
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
?> -->


<?php
// Database connection
include "./db_connection.php";
// Fetch class names
$sql = "SELECT class_id, class_name FROM class";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .conatiner{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .conatiner a{
            color:"green";
            text-decoration: none;
        }
        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            background-color: #4CAF50;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
        }
        li:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
    echo "<div class='conatiner'><h1>Class List</h1>";
    echo "<a href='./dashboard.php'>Back home</a>";
if ($result->num_rows > 0) {
    echo "<div><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='class_feedbacks.php?class_id=" . $row['class_id'] . "'>" . $row['class_name'] . "</a></li>";
    }
    echo "</div></ul></div>";
} else {
    echo "No classes found.";
}

$conn->close();
?>

</body>
</html>
