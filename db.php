<?php
$servername = "localhost";
$username = "root";  // เปลี่ยนตามชื่อผู้ใช้งานฐานข้อมูลของคุณ
$password = "";      // เปลี่ยนตามรหัสผ่านของคุณ
$dbname = "crud_database";  // เปลี่ยนตามชื่อฐานข้อมูลของคุณ

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
