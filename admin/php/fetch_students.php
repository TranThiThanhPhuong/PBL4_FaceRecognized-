<?php
include('database.php');

if (isset($_GET['ID_Lop'])) {
    $classId = $_GET['ID_Lop'];
    $sql = "SELECT ID, Ten, NgaySinh, GioiTinh, Email, DiaChi, Anh FROM hocvien WHERE ID_Lop = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $classId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    
    echo json_encode($students); // Trả dữ liệu dưới dạng JSON
} else {
    echo json_encode([]); // Trả về mảng rỗng nếu không có ID_Lop
}

$conn->close();
?>
