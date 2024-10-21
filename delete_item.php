<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ลบข้อมูล
    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header('Location: index.php');
}
?>
