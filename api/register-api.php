<?php

header("Content-type:application/json");

require_once("../config/database.php");

if($_SERVER["REQUEST_METHOD"]!=="POST"){
    echo json_encode(["status"=>"error", "message"=>"invalid request"]);
    exit;
}

//GET FORM DATA HERE

$fullName = $_POST['fullName'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


//CONVERT INTO HASH PASSWORD

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


try{
    $stmt = $pdo->prepare("INSERT INTO registration (fullname,phone,email,password) VALUES(?,?,?,?)");
    $stmt->execute([$fullName,$phone,$email,$hashedPassword]);

    echo json_encode([
        "status"=>"success",
        "message"=>"Registration success"
    ]);
}catch(PDOException $e) {
    echo json_encode([
        "status"=>"error",
        "message"=>$e->getMessage()
    ]);
}

?>