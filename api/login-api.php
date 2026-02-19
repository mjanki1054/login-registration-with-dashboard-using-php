<?php

session_start();

require_once("../config/database.php");

header("Content-Type:application/json");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    echo json_encode([
        "status"=>"error",
        "message"=>"invalid request method"
    ]);
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if(empty($email) || empty($password)){
    echo json_encode([
        "status"=>"error",
        "message"=>"all fields are required"
    ]);
    exit;
}

try{
    $stmt = $pdo->prepare("SELECT * FROM registration WHERE email = :email LIMIT 1");
    $stmt->execute(['email'=>$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$user){
        echo json_encode([
            "status"=>"error",
            "message"=>"user not found"
        ]);
        exit;
    }

    if(!password_verify($password, $user['password'])){
        echo json_encode([
            "status"=>"error",
            "message"=>"invalid password"
        ]);
        exit;
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['fullname'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];

    echo json_encode([
        "status"=>"success",
        "message"=>"login success"
    ]);

    exit;
    
} catch(PDOException $e){
    echo json_encode([
        "status" => "error",
        "message" => "Database error"
    ]);
}

?>