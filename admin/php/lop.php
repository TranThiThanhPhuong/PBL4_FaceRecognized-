<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Student | Lớp học</title>
    <link href="../image/logoFaceWeb.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <?php
    require_once '../php/includes/sidebar.php';
    ?>

    <div class="main">
        <nav class="nav navbar navbartoggle">
            <span id="togglebar" class="iconNavbar icon las la-bars"></span>
            <span>Admin</span>
        </nav>

        <div class="main-content">
            <div id="formMaincontent" class="form-container container-lg">
                <div class="title">
                    <h4 for="">Danh sách lớp học</h4>
                    <button id="btnThem" class="btnThem btn btn-primary"><i class="icon las la-plus-circle"></i>Thêm
                        mới</button>
                </div>
                <form class="formSearch">
                    <input type="text" class="textSearch form-check-label" placeholder="Tìm tên lớp, cấp ..">
                    <button class="btnSearch btn btn-outline-primary" type="submit" id="btnTim">
                        <i class="icon1 las la-search"></i>Tìm kiếm
                    </button>
                </form>
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Lớp</th>
                            <th scope="col">Cấp độ</th>
                            <th scope="col">Danh sách học viên</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('database.php');
                        // Mảng ánh xạ ID_CapDo thành cấp độ
                        $capDoMapping = [
                            1 => 'N1',
                            2 => 'N2',
                            3 => 'N3',
                            4 => 'N4',
                            5 => 'N5'
                        ];
                        $sql = "SELECT ID, TenLop, ID_CapDo FROM lop";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row['ID'] . "</th>";
                                echo "<td>" . $row['TenLop'] . "</td>";
                                // Hiển thị cấp độ dựa trên ID_CapDo
                                echo "<td>" . $capDoMapping[$row['ID_CapDo']] . "</td>";
                                // Thêm data-id vào nút
                                echo "<td><button class='btnHS' data-id='" . $row['ID'] . "' type='button'><i class='icon1 iconedit las la-list'></i></button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="formthem" class="form-container" style="display: none;">
                <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
                    <div class="title">
                        <h4 class="p">Thêm lớp</h4>
                    </div>
                    <div class="mb-3">
                        <label for="tenLop" class="lable form-label">Tên lớp</label>
                        <input type="text" class="form-control" id="tenLop">
                    </div>
                    <div class="mb-3 select">
                        <label for="selectCapdoLopthem" class="lable form-label">Cấp độ</label>
                        <select id="selectCapdoLopthem" class="form-select" aria-label="Default select example">
                            <option value="1">N1</option>
                            <option value="2">N2</option>
                            <option value="3">N3</option>
                            <option value="4">N4</option>
                            <option value="5">N5</option>
                        </select>
                    </div>

                    <button id="btnLuuThem" type="button" class="btn btnSave"><i
                            class="icon1 las la-save"></i>Lưu</button>
                    <button id="btnHuyThem" type="button" class="btn btnClose"><i
                            class="icon1 las la-times"></i>Hủy</button>
                </form>
            </div>
            <div id="successMessageThem" class="alert alert-success hidden" role="alert">
                Thêm thành công!
            </div>

            <div id="formHS" class="form-container" style="display: none;">
                <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
                    <div class="title">
                        <h4 class="p">Danh sách học viên<span id="tenlop"></span></h4>
                    </div>
                    <table class="table table-hover" id="studentTable">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu học viên sẽ được chèn vào đây qua JavaScript -->
                        </tbody>
                    </table>
                    <button id="btnLuuHS" type="button" class="btn btnSave"><i
                            class="icon1 las la-save"></i>Lưu</button>
                    <button id="btnHuyHS" type="button" class="btn btnClose"><i
                            class="icon1 las la-times"></i>Hủy</button>
                </form>
            </div>
            <div id="successMessageSua" class="alert alert-success hidden" role="alert">
                Lưu thành công!
            </div>

        </div>

        <div id="confirmBox" class="confirm-box hidden">
            <div class="confirm-content">
                <p>Bạn có chắc chắn muốn xóa không?</p>
                <div class="confirm-buttons">
                    <button id="btnYes">Có</button>
                    <button id="btnNo">Không</button>
                </div>
            </div>
        </div>

    </div>

    <script>
        let menu = document.querySelector('.iconNavbar');
        let sidebar = document.querySelector('.sidebar');
        let main = document.querySelector('.main');

        document.addEventListener("DOMContentLoaded", function () {
            var currentUrl = window.location.href;
            var links = document.querySelectorAll('.sidebar a');
            links.forEach(function (link) {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                }
            });

            menu.onclick = function () {
                sidebar.classList.toggle('active');
                main.classList.toggle('active');
            }
        });

        const formthem = document.getElementById('formthem');
        const formHS = document.getElementById('formHS');
        const formMaincontent = document.getElementById('formMaincontent');
        const formSearch = document.querySelector('.formSearch');
        const btnTim = document.getElementById('btnTim');

        const btnHuyThem = document.getElementById('btnHuyThem');
        const btnLuuThem = document.getElementById('btnLuuThem');

        const btnHuyHS = document.getElementById('btnHuyHS');
        const btnLuuHS = document.getElementById('btnLuuHS');

        const btnThem = document.getElementById('btnThem');
        const btnXoas = document.querySelectorAll(".btnXoa");
        const btnHSs = document.querySelectorAll(".btnHS");
        const successMessageThem = document.getElementById('successMessageThem');
        const successMessageSua = document.getElementById('successMessageSua');
        const studentTableBody = document.querySelector('#studentTable tbody');

        formSearch.addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn chặn trang tải lại
            const searchTerm = document.querySelector('.textSearch').value.trim();
            if (searchTerm) {
                searchClasses(searchTerm);
            }
        });

        function searchClasses(query) {
            fetch(`search_classes.php?query=${encodeURIComponent(query)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = ''; // Xóa dữ liệu cũ trong bảng

                    if (data.length > 0) {
                        data.forEach(row => {
                            const tr = `<tr>
                                            <th scope='row'>${row.ID}</th>
                                            <td>${row.TenLop}</td>
                                            <td>${row.ID_CapDo}</td>
                                            <td><button class='btnHS' data-id='${row.ID}' type='button'><i class='icon1 iconedit las la-list'></i></button></td>
                                        </tr>`;
                            tbody.innerHTML += tr;
                        });
                    } else {
                        tbody.innerHTML = '<tr><td colspan="4">Không có dữ liệu</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching classes:', error);
                    alert('Có lỗi xảy ra trong quá trình tìm kiếm.');
                });
        }

        // Xóa học viên - sử dụng event delegation để lắng nghe sự kiện click
        document.querySelector('#studentTable').addEventListener('click', function (event) {
            if (event.target.closest('.btnXoa')) {  // Kiểm tra nếu phần tử được click là nút xóa
                const row = event.target.closest('tr');
                const studentID = row.querySelector('th').innerText; // Lấy ID học viên từ cột đầu tiên

                if (!studentID) {
                    alert("Không tìm thấy ID học viên");
                    return;
                }

                // Hiển thị hộp thoại xác nhận xóa
                document.getElementById("confirmBox").classList.remove("hidden");

                // Xử lý khi người dùng chọn "Có"
                document.getElementById("btnYes").addEventListener("click", function () {
                    // Gửi yêu cầu xóa học viên qua AJAX
                    fetch('delete_students.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `studentID=${encodeURIComponent(studentID)}`
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Xóa thành công, xóa hàng tương ứng trong bảng
                                row.remove();
                                alert('Xóa học viên thành công');
                            } else {
                                alert('Có lỗi xảy ra: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting student:', error);
                            alert('Có lỗi xảy ra trong quá trình xóa học viên.');
                        });

                    // Đóng hộp thoại xác nhận xóa
                    document.getElementById("confirmBox").classList.add("hidden");
                });

                // Xử lý khi người dùng chọn "Không"
                document.getElementById("btnNo").addEventListener("click", function () {
                    document.getElementById("confirmBox").classList.add("hidden");
                });
            }
        });



        btnThem.addEventListener("click", function () {
            formthem.style.display = "block";
            formMaincontent.style.display = "none";
        });

        btnLuuThem.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định
            const tenLop = document.getElementById('tenLop').value;
            const capDo = document.getElementById('selectCapdoLopthem').value; // ID cấp độ

            if (tenLop) {
                // Gửi yêu cầu thêm lớp
                fetch('add_classes.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `tenLop=${encodeURIComponent(tenLop)}&capDo=${encodeURIComponent(capDo)}`
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            successMessageThem.classList.remove('hidden');
                            setTimeout(() => {
                                successMessageThem.classList.add('hidden');
                            }, 1000);
                            formthem.style.display = "none";
                            formMaincontent.style.display = "block";
                            // Có thể gọi lại hàm để cập nhật danh sách lớp nếu cần
                        } else {
                            alert('Có lỗi xảy ra: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error adding class:', error);
                        alert('Có lỗi xảy ra trong quá trình thêm lớp.');
                    });
            } else {
                alert('Vui lòng nhập tên lớp.');
            }
        });

        btnHuyThem.addEventListener("click", function (event) {
            event.preventDefault();
            formthem.style.display = "none";
            formMaincontent.style.display = "block";
        });

        btnHSs.forEach(function (button) {
            button.addEventListener("click", function () {
                const classId = button.getAttribute('data-id');
                console.log(`Fetching students for class ID: ${classId}`); // Kiểm tra ID lớp
                fetchStudents(classId);
            });
        });

        function fetchStudents(classId) {
            fetch(`fetch_students.php?ID_Lop=${classId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched students data:', data); // Kiểm tra dữ liệu trả về
                    studentTableBody.innerHTML = ''; // Xóa dữ liệu cũ trong bảng
                    data.forEach(student => {
                        const row = `<tr>
                                        <th scope='row'>${student.ID}</th>
                                        <td>${student.Ten}</td>
                                        <td>${student.NgaySinh}</td>
                                        <td>${student.GioiTinh}</td>
                                        <td>${student.Email}</td>
                                        <td>${student.DiaChi}</td>
                                        <td>${student.Anh}</td>
                                        <td><button class='btnXoa' type='button'><i class='icon1 icondel las la-trash'></i></button></td>
                                    </tr>`;
                        studentTableBody.innerHTML += row;
                    });
                    formHS.style.display = "block";
                    formMaincontent.style.display = "none";
                })
                .catch(error => {
                    console.error('Error fetching students:', error);
                    alert('Có lỗi xảy ra trong quá trình lấy dữ liệu học viên.');
                });
        }

        btnXoas.forEach(function (button) {
            button.addEventListener("click", function () {
                document.getElementById("confirmBox").classList.remove("hidden");
            });
        });

        btnHuyHS.addEventListener("click", function (event) {
            event.preventDefault();
            formHS.style.display = "none";
            formMaincontent.style.display = "block";
        });

        btnLuuHS.addEventListener('click', function (event) {
            successMessageSua.classList.remove('hidden');
            setTimeout(function () {
                successMessageSua.classList.add('hidden');
            }, 1000);
            event.preventDefault();
            formHS.style.display = "none";
            formMaincontent.style.display = "block";
        });

        document.getElementById("btnNo").addEventListener("click", function () {
            document.getElementById("confirmBox").classList.add("hidden");
        });

        document.getElementById("btnYes").addEventListener("click", function () {
            document.getElementById("confirmBox").classList.add("hidden");
        });
    </script>

</body>

</html>