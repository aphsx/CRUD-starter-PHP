<?php
$sql = "SELECT * FROM items";
$stmt = $conn->query($sql);

// ตรวจสอบข้อผิดพลาดในคำสั่ง SQL
if ($stmt === false) {
    echo "Error: " . $conn->errorInfo()[2];
    exit();
}

$items = $stmt->fetchAll();

// ตรวจสอบว่ามีข้อมูลหรือไม่
if (count($items) > 0) {
    foreach ($items as $item) {
        echo "<tr>";
        echo "<td class='border px-4 py-2'>" . htmlspecialchars($item['name']) . "</td>";
        echo "<td class='border px-4 py-2'>" . htmlspecialchars($item['description']) . "</td>";
        echo "<td class='border px-4 py-2'><img src='" . htmlspecialchars($item['image']) . "' width='100' alt='Product Image'></td>";
        echo "<td class='border px-4 py-2'>
            <a href='edit_item.php?id=" . htmlspecialchars($item['id']) . "' class='bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-700'>Edit</a>
            <a href='delete_item.php?id=" . htmlspecialchars($item['id']) . "' class='bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 ml-2'>Delete</a>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No items found</td></tr>";
}
?>
