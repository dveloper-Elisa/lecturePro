<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}

include "./db_connection.php";

// Query to get data from `class` and `feadback` tables using INNER JOIN
$selectQuery = "SELECT * FROM `class` INNER JOIN feadback ON class.class_id = feadback.class_id";
$stmt = $conn->prepare($selectQuery);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error: " . $stmt->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .report-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .report-item {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .report-label {
            font-weight: bold;
            color: #555;
        }

        .report-value {
            margin-left: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto 0;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h1>Class and Feedback Report</h1>
        <?php foreach ($data as $row): ?>
            <div class="report-item">
                <span class="report-label">Department:</span>
                <span class="report-value"><?= htmlspecialchars($row['department']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Option Name:</span>
                <span class="report-value"><?= htmlspecialchars($row['option_name']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Class Name:</span>
                <span class="report-value"><?= htmlspecialchars($row['class_name']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Promotion:</span>
                <span class="report-value"><?= htmlspecialchars($row['promotion']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Module Name:</span>
                <span class="report-value"><?= htmlspecialchars($row['module_name']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Module Code:</span>
                <span class="report-value"><?= htmlspecialchars($row['module_code']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Lecturer:</span>
                <span class="report-value"><?= htmlspecialchars($row['lecturer']); ?></span>
            </div>
            
            <div class="report-item">
                <span class="report-label">Comment:</span>
                <span class="report-value"><?= htmlspecialchars($row['comment']); ?></span>
            </div>
        <?php endforeach; ?>
        <button onclick="generatePDF()">Generate PDF</button>
    </div>

    <script>
        function generatePDF() {
            alert('PDF generation logic to be implemented.');
        }
    </script>
</body>
</html>
