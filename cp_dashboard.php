<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
// $_SESSION = array();
// session_destroy();


if(!isset($_SESSION['class_id'])){

    header("location:cp_login.php");

}

 include "./db_connection.php";
$cp = $_SESSION['class_id'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $module_name = $_POST['module_name'];
    $module_code = $_POST['module_code'];
    $lecture_name = $_POST['lecture_name'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO feadback (module_name, module_code, lecturer,	comment, class_id) VALUES (?,?,?,?,?)";
if($stmt = $conn->prepare($query)){

    
    $stmt -> bind_param('sssss',$module_name, $module_code,  $lecture_name, $comment,$cp);

    $data = $stmt -> execute();
    if($data){
        ?>
        <script>
            alert(" Report submited successfully")
        </script>
        
         <?php
    }else{
        ?>
        <script>
            alert(" Report not submitted")
        </script>
        
         <?php
    }
}


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        input[type="text"],
        input[type="submit"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 100px; /* Set the height of the textarea */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }
    </style>
    
</head>
<body>
    <?php include "./header.php"?>
    <div class="form-container">
        <div>

        <h1>Feedback Form</h1>
        <a href="./logout.php">Logout</a>

        </div>
        <form method="POST" action="">
            <label for="module_name">Module Name</label>
            <input type="text" id="module_name" name="module_name" required>

            <label for="module_code">Module Code</label>
            <input type="text" id="module_code" name="module_code" required>

            <label for="lecture_name">Lecture Name</label>
            <input type="text" id="lecture_name" name="lecture_name" required>

            <label for="comment">Comments</label>
            <textarea id="comment" name="comment" required></textarea>

            <input type="submit" value="Send Feedback">
        </form>
    </div>
</body>
</html>
