<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "my_project");
$sql = "DELETE FROM poses WHERE id = $id";
$conn->query($sql);
$conn->close();
?>