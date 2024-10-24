<?php
// Kết nối đến database
include('database.php');

// Kiểm tra xem yêu cầu có chứa tham số ID của học viên hay không
if (isset($_POST['studentID'])) {
    $studentID = $_POST['studentID'];

    // Chuẩn bị câu truy vấn SQL để xóa học viên
    $sql = "DELETE FROM hocvien WHERE ID = ?";

    // Chuẩn bị câu lệnh truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $studentID);

    if ($stmt->execute()) {
        // Nếu xóa thành công
        echo json_encode(['status' => 'success', 'message' => 'Xóa học viên thành công']);
    } else {
        // Nếu có lỗi xảy ra trong quá trình xóa
        echo json_encode(['status' => 'error', 'message' => 'Xóa học viên không thành công']);
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy ID học viên']);
}
?>
