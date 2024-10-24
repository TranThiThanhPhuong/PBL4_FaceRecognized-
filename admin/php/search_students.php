<?php
include('database.php');

// Kiểm tra kết nối cơ sở dữ liệu
if (!$conn) {
    echo json_encode(['error' => 'Không thể kết nối đến cơ sở dữ liệu.']);
    exit();
}

// Kiểm tra phương thức và tham số 'query' trong GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $query = $_GET['query'];

    // Chuẩn bị câu truy vấn tìm kiếm với các giá trị LIKE
    $sql = "SELECT * FROM hocvien WHERE Ten LIKE ? OR ID LIKE ? OR Email LIKE ? OR Diachi LIKE ? OR GioiTinh LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeQuery = '%' . $query . '%';
    $stmt->bind_param("sssss", $likeQuery, $likeQuery, $likeQuery, $likeQuery, $likeQuery);

    // Thực thi câu truy vấn và lấy kết quả
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $students = [];

        // Đổ dữ liệu vào mảng
        while ($row = $result->fetch_assoc()) {
            $students[] = [
                'ID' => $row['ID'],
                'Ten' => $row['Ten'],
                'NgaySinh' => $row['NgaySinh'],
                'GioiTinh' => $row['GioiTinh'],
                'Email' => $row['Email'],
                'DiaChi' => $row['DiaChi'],
                'Anh' => $row['Anh'],
                'ID_CapDo' => $row['ID_CapDo']
            ];
        }

        // Trả kết quả dạng JSON
        header('Content-Type: application/json');
        if (!empty($students)) {
            echo json_encode($students, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['message' => 'Không tìm thấy học viên nào.']);
        }
    } else {
        // Trường hợp câu truy vấn thất bại
        echo json_encode(['error' => 'Lỗi truy vấn cơ sở dữ liệu.']);
    }

    // Đóng câu truy vấn
    $stmt->close();
} else {
    // Trường hợp không có tham số query
    echo json_encode(['error' => 'Không có tham số truy vấn hợp lệ.']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
