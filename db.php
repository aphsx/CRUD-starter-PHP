<?php
$servername = "localhost";
$username = "root";  // เปลี่ยนให้ตรงกับฐานข้อมูลของคุณ
$password = "";      // เปลี่ยนให้ตรงกับฐานข้อมูลของคุณ
$dbname = "crud_system";  // ชื่อฐานข้อมูล

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
