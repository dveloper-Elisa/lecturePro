
<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

include "./db_connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $class_name = $_POST['class_name'];
    $password = $_POST['password'];

    $query = "SELECT * FROM class WHERE class_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s',$class_name);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $user = $result->fetch_assoc();

        if($user['status'] == 0){
            echo "<span style='color:red'>Class is Innactive, Contact AccademicQA to activate </span> <br><br>";

            echo "<a href='./cp_login.php'>Back to login</a>";
            exit;
        }

        if(password_verify($password, $user['password'])){
            $_SESSION['class_id'] = $user['class_id'];

            header("location:cp_dashboard.php");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            width: 300px;
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
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
    <div class="form-container">
        <h1>Login</h1>
        <form method="POST" action="">
            <label for="class_name">Username</label>
            <input type="text" id="class_name" name="class_name" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
