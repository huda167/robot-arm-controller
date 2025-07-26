<?php
$data = json_decode(file_get_contents("php://input"), true);
$conn = new mysqli("localhost", "root", "", "my_project");

$stmt = $conn->prepare("INSERT INTO poses (pose_name, motor1, motor2, motor3, motor4, motor5, motor6, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$name = "Pose " . rand(1, 1000);
$status = 1;
$stmt->bind_param("siiiiiii", $name, $data['motor1'], $data['motor2'], $data['motor3'], $data['motor4'], $data['motor5'], $data['motor6'], $status);
$stmt->execute();
$conn->close();
?>