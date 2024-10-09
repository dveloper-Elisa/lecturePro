<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// $user_id = $_SESSION['user_id'];
// $email = $_SESSION['email'];

// if(!isset($_SESSION['user_id']) || !isset($_SESSION['email'])){
//     header("location:cp_login.php");
// }


include "./db_connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $department = $_POST['department'];
    $option_name = $_POST['option_name'];
    $class_name = $_POST['class_name'];
    $promotion_year = $_POST['promotion_year'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if($password != $confirm_password){
        echo "password not match";
        exit;
    }

    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    
$query = "SELECT * FROM class WHERE class_name = ?";
$stmt = $conn->prepare($query);
$stmt ->bind_param("s", $class_name);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){
    echo "The class already registered";
}else{
    $insert_query = "INSERT INTO class (department, option_name, class_name, promotion, password) VALUES (?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("sssss", $department, $option_name, $class_name, $promotion_year, $hashed_password);
    
    if ($insert_stmt->execute()) {
        echo "Class registered successfully.";
        header("location: dashboard.php");
    } else {
        echo "Error: " . $insert_stmt->error;
    }
}

}

?>