<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// register_aqa.php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $names = $_POST['names'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username is already taken
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username already taken.";
        exit;
    }

    // Insert the new AQA user into the database
    $insert = "INSERT INTO users (names,email, password) VALUES (?, ?,?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param('sss', $names,$email, $hashed_password);

    if ($stmt->execute()) {
        echo "Account created successfully! <a href='login.php'>Login here</a>";
    } else {
        echo "Error registering account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Academic QA</title>
</head>
<body>
    <h2>Register Academic QA</h2>
    <form method="post" action="">
        <label>Full Names</label><br>
        <input type="text" name="names" required><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br>
        
        <label>Password</label><br>
        <input type="password" name="password" required><br>

        <label>Confirm Password</label><br>
        <input type="password" name="confirm_password" required><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
