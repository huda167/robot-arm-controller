<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "my_project");
$sql = "SELECT * FROM poses WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$pose = $result->fetch_assoc();
header('Content-Type: application/json');
echo json_encode($pose);
$conn->close();
?>