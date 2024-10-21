<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // จัดการอัปโหลดรูปภาพ
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // บันทึกข้อมูลลงฐานข้อมูล
    $sql = "INSERT INTO items (name, description, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $description, $target_file]);

    // Redirect กลับไปยังหน้า index.php
    header("Location: index.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-center text-3xl font-bold mb-8">Add New Item</h1>

        <!-- ฟอร์มเพิ่มสินค้า -->
        <div class="bg-white shadow-md rounded p-6 max-w-lg mx-auto">
            <form action="add_item.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea id="description" name="description" class="w-full px-4 py-2 border rounded"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image</label>
                    <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded">
                </div>
                <div class="flex justify-between">
                    <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
