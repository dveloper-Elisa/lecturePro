<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include "./db_connection.php";

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("location:cp_login.php");
    exit();
}

// DISPLAY CLASSES
$getclass = "SELECT * FROM class";
$stmt = $conn->prepare($getclass);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $classes = $result->fetch_all(MYSQLI_ASSOC);
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
    <title>Class Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-info {
            flex-grow: 1;
        }

        .card-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-activate {
            background-color: #28a745;
            color: white;
        }

        .btn-deactivate {
            background-color: #dc3545;
            color: white;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        /* Popup form */
        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        .modal-content label {
            display: block;
            margin-bottom: 8px;
        }

        .modal-content input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .modal-content .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content .btn-close {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #headerr{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        #headerr a{
            text-decoration: none;
            color:green;

        }
        #headerr a:hover{
            cursor: pointer;
            background-color: green;
            color: white;
            font-weight: bold;
            transition: ease 0.5s;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="headerr">
    <h1>Class Management</h1> <a href="./dashboard.php">Back dashboard</a> </div>
    <?php foreach ($classes as $class): ?>
        <div class="card">
            <div class="card-info">
                <p><strong>Class Name:</strong> <?= htmlspecialchars($class['class_name']); ?></p>
                <p><strong>Department:</strong> <?= htmlspecialchars($class['department']); ?></p>
                <p><strong>Option Name:</strong> <?= htmlspecialchars($class['option_name']); ?></p>
                <p><strong>Promotion:</strong> <?= htmlspecialchars($class['promotion']); ?></p>
            </div>
            <div class="card-buttons">
                <?php if ($class['status'] == 1): ?>
                    <button class="btn btn-deactivate" onclick="toggleStatus(<?= $class['class_id']; ?>, 0)">Deactivate</button>
                <?php else: ?>
                    <button class="btn btn-activate" onclick="toggleStatus(<?= $class['class_id']; ?>, 1)">Activate</button>
                <?php endif; ?>
                <button class="btn btn-edit" onclick="openModal(<?= htmlspecialchars(json_encode($class)); ?>)">Edit</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal for editing class information -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <h2>Edit Class Information</h2>
        <form id="editForm" method="POST" action="update_class.php">
            <input type="hidden" id="editClassId" name="class_id">

            <label for="className">Class Name:</label>
            <input type="text" id="className" name="class_name" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>

            <label for="optionName">Option Name:</label>
            <input type="text" id="optionName" name="option_name" required>

            <label for="promotion">Promotion:</label>
            <input type="text" id="promotion" name="promotion" required>

            <button type="submit" class="btn-submit">Update</button>
            <button type="button" class="btn-close" onclick="closeModal()">Close</button>
        </form>
    </div>
</div>

<script>
    function toggleStatus(classId, status) {
        // Send an AJAX request to update the status
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "toggle_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Status updated successfully");
                location.reload(); // Reload the page to reflect changes
            } else {
                alert("Failed to update status");
            }
        };
        xhr.send("class_id=" + classId + "&status=" + status);
    }

    function openModal(classData) {
        document.getElementById("editClassId").value = classData.class_id;
        document.getElementById("className").value = classData.class_name;
        document.getElementById("department").value = classData.department;
        document.getElementById("optionName").value = classData.option_name;
        document.getElementById("promotion").value = classData.promotion;
        document.getElementById("editModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("editModal").style.display = "none";
    }
</script>

</body>
</html>
