<?php
include('database.php'); // Kết nối đến cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenLop = $_POST['tenLop'];
    $capDo = $_POST['capDo']; // ID cấp độ

    $sql = "INSERT INTO lop (TenLop, ID_CapDo) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $tenLop, $capDo); // 'si' nghĩa là string, integer

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
