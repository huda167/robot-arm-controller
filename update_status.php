<?php
$conn = new mysqli("localhost", "root", "", "my_project");
$sql = "UPDATE poses SET status = 0";
$conn->query($sql);
$conn->close();
?>