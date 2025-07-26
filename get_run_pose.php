<?php
// إعدادات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_project"; // ← اسم قاعدة البيانات الصحيح

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// فحص الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب البيانات من جدول pose
$sql = "SELECT * FROM poses ORDER BY id DESC";
$result = $conn->query($sql);

$poses = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $poses[] = $row;
    }
}

// إرسال البيانات بصيغة JSON
header('Content-Type: application/json');
echo json_encode($poses);

// إغلاق الاتصال
$conn->close();
?>