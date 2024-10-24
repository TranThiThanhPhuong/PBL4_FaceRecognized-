<?php
include('database.php');

$level = $_GET['level']; // Lấy cấp độ từ URL

$sql = "SELECT ID, Ten, NgaySinh, GioiTinh, Email, DiaChi, Anh, ID_CapDo FROM hocvien WHERE ID_CapDo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $level); // Gán giá trị cho câu truy vấn
$stmt->execute();
$result = $stmt->get_result();

$students = [];
while($row = $result->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode($students); // Trả về dữ liệu dưới dạng JSON
?>
