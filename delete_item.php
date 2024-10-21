<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ลบข้อมูลออกจากฐานข้อมูล
    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    // Redirect กลับไปยังหน้า index.php
    header("Location: index.php?success=1");
    exit();
}
?>
