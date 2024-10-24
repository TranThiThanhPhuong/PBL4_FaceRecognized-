<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Student | Học sinh</title>
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
            <span id="togglebar" class="iconNavbar icon fas fa-bars"></span>
            <span>Admin</span>
        </nav>

        <div class="main-content">
            <div id="formMaincontent" class="form-container container-lg">
                <div class="title">
                    <h2>Overview</h2>
                </div>
                <div class="stats">
                    <a id="cardn1" href="" class="stat">
                        <span>N1</span>
                        <h3>150</h3>
                        <p>Học viên</p>
                    </a>
                    <a id="cardn2" href="" class="stat">
                        <span>N2</span>
                        <h3>150</h3>
                        <p>Học viên</p>
                    </a>
                    <a id="cardn3" href="" class="stat">
                        <span>N3</span>
                        <h3>150</h3>
                        <p>Học viên</p>
                    </a>
                </div>
                <div class="stats the2">
                    <a id="cardn4" href="" class="stat">
                        <span>N4</span>
                        <h3>150</h3>
                        <p>Học viên</p>
                    </a>
                    <a id="cardn5" href="" class="stat">
                        <span>N5</span>
                        <h3>150</h3>
                        <p>Học viên</p>
                    </a>
                </div>
            </div>

            <div id="formHS" class="form-container" style="display: none;">
                <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
                    <div class="title">
                        <h4>Danh sách học viên</h4>
                        <button id="btnThem" class="btnThem btn btn-primary"><i class="icon las la-plus-circle"></i>Thêm
                            mới</button>
                    </div>
                    <form class="formSearch" action="" method="POST" id="formSearch">
                        <input type="text" class="textSearch form-check-label" placeholder="Tìm tên, mã học viên .."
                            required>
                        <button class="btnSearch btn btn-outline-primary" id="btnTim" type="button"><i
                                class="icon1 fas fa-search"></i>Tìm kiếm</button>
                    </form>

                    <table class="table table-hover" style="margin: 20px 0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Cấp độ</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="studentList">
                            <!-- Dữ liệu học viên sẽ được tải từ AJAX ở đây -->
                        </tbody>
                    </table>
                    <button id="btnDong" type="button" class="btn btnDong"><i
                            class="icon1 las la-sign-out"></i>Đóng</button>
                </form>
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

            // Thêm sự kiện click cho các card
            const cards = document.querySelectorAll('.stat');
            cards.forEach(function (card) {
                card.addEventListener('click', function (event) {
                    event.preventDefault();
                    const levelMap = {
                        'N1': '1',
                        'N2': '2',
                        'N3': '3',
                        'N4': '4',
                        'N5': '5'
                    };
                    const level = levelMap[card.querySelector('span').textContent];

                    // AJAX request để lấy danh sách học viên theo cấp độ
                    fetch(`get_students_by_level.php?level=${level}`)
                        .then(response => response.json())
                        .then(data => {
                            const studentList = document.getElementById('studentList');
                            studentList.innerHTML = ''; // Xóa dữ liệu cũ

                            // Mapping giữa ID_CapDo và cấp độ N1 đến N5
                            const capDoMap = {
                                1: 'N1',
                                2: 'N2',
                                3: 'N3',
                                4: 'N4',
                                5: 'N5'
                            };

                            // Hiển thị dữ liệu học viên mới
                            data.forEach(student => {
                                const row = `
                    <tr>
                        <th scope="row">${student.ID}</th>
                        <td>${student.Ten}</td>
                        <td>${new Date(student.NgaySinh).toLocaleDateString()}</td>
                        <td>${student.GioiTinh}</td>
                        <td>${student.Email}</td>
                        <td>${student.DiaChi}</td>
                        <td><img src="${student.Anh}" alt="student image" width="50"></td>
                        <td>${capDoMap[student.ID_CapDo]}</td> <!-- Ánh xạ ID_CapDo thành cấp độ -->
                        <td><button class="btnXem" id="btnXem" type="button"><i class="icon1 iconview las la-info"></i></button></td>
                    </tr>`;
                                studentList.innerHTML += row;
                            });

                            // Hiển thị danh sách học viên
                            document.getElementById('formHS').style.display = 'block';
                            document.getElementById('formMaincontent').style.display = 'none';
                        });
                });
            });

            // Đóng form học sinh
            document.getElementById('btnDong').addEventListener('click', function () {
                document.getElementById('formHS').style.display = 'none';
                document.getElementById('formMaincontent').style.display = 'block';
            });
        });

        // Tìm kiếm học sinh
        document.addEventListener("DOMContentLoaded", function () {
            const formSearch = document.getElementById('formSearch');

            formSearch.addEventListener('submit', function (event) {
                event.preventDefault(); // Ngăn chặn tải lại trang
                const searchQuery = document.querySelector('.textSearch').value;

                // Gửi yêu cầu AJAX để tìm kiếm học sinh
                fetch(`search_students.php?query=${encodeURIComponent(searchQuery)}`)
                    .then(response => response.json())
                    .then(data => {
                        const studentList = document.getElementById('studentList');
                        studentList.innerHTML = ''; // Xóa dữ liệu cũ

                        if (data.length > 0) {
                            // Mapping giữa ID_CapDo và cấp độ N1 đến N5
                            const capDoMap = {
                                1: 'N1',
                                2: 'N2',
                                3: 'N3',
                                4: 'N4',
                                5: 'N5'
                            };

                            // Hiển thị dữ liệu học sinh mới
                            data.forEach(student => {
                                const row = `
                                <tr>
                                    <th scope="row">${student.ID}</th>
                                    <td>${student.Ten}</td>
                                    <td>${new Date(student.NgaySinh).toLocaleDateString()}</td>
                                    <td>${student.GioiTinh}</td>
                                    <td>${student.Email}</td>
                                    <td>${student.DiaChi}</td>
                                    <td><img src="${student.Anh}" alt="student image" width="50"></td>
                                    <td>${capDoMap[student.ID_CapDo]}</td>
                                    <td><button class="btnXem" id="btnXem" type="button"><i class="icon1 iconview las la-info"></i></button></td>
                                </tr>`;
                                studentList.innerHTML += row;
                            });
                        } else {
                            studentList.innerHTML = '<tr><td colspan="9" class="text-center">Không tìm thấy học sinh nào.</td></tr>';
                        }
                    });
            });
        });
    </script>
    <div id="confirmBox" class="confirm-box hidden">
        <div class="confirm-content">
            <p>Bạn có chắc chắn muốn xóa không?</p>
            <div class="confirm-buttons">
                <button id="btnYes">Có</button>
                <button id="btnNo">Không</button>
            </div>
        </div>
    </div>

    <div id="formthem" class="form-container" style="display: none;">
        <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
            <div class="title">
                <h4 class="p">Thêm học sinh mới</h4>
            </div>
            <div class="mb-3">
                <label for="id" class="lable form-label">ID</label>
                <input type="text" class="form-control" id="id" readonly>
            </div>
            <div class="mb-3">
                <label for="ten" class="lable form-label">Họ và tên</label>
                <input type="text" class="form-control" id="ten">
            </div>
            <div class="mb-3">
                <label for="sdt" class="lable form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt">
            </div>
            <div class="mb-3">
                <label for="email" class="lable form-label">Email</label>
                <input type="text" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="" class="lable form-label">Giới tính</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh">
                    <label class="form-check-label" for="">
                        Nữ
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh1" checked>
                    <label class="form-check-label" for="">
                        Nam
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="lable form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi">
            </div>
            <div class="mb-3 select">
                <label for="" class="lable form-label">Cấp độ</label>
                <select id="selectCapdoLopthem" class="form-select" aria-label="Default select example">
                    <option selected>N5</option>
                    <option value="1">N4</option>
                    <option value="2">N3</option>
                    <option value="3">N2</option>
                    <option value="3">N1</option>
                </select>
            </div>
            <div class="mb-3 select">
                <label for="" class="lable form-label">Lớp</label>
                <select id="selectCapdoLopthem" class="form-select" aria-label="Default select example">
                    <option selected>N3_1</option>
                    <option value="1">N3_2</option>
                    <option value="2">N3_3</option>
                </select>
            </div>
            <div class="mb-3">
                <a id="importAnhGV" class="importAnh"><i class="la la-file-import"></i>Import file ảnh</a>
            </div>
            <button id="btnLuuThem" type="button" class="btn btnSave"><i class="icon1 las la-save"></i>Lưu</button>
            <button id="btnHuyThem" type="button" class="btn btnClose"><i class="icon1 las la-times"></i>Hủy</button>
        </form>
    </div>
    <div id="successMessageThem" class="alert alert-success hidden" role="alert">
        Thêm thành công!
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
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var currentUrl = window.location.href;
            var links = document.querySelectorAll('.sidebar a');
            links.forEach(function (link) {
                if (link.href === currentUrl) {
                    link.id = 'active-link'
                }
            });
        });
    </script>

    <script>
        const cardn1 = document.getElementById('cardn1');
        const btnDong = document.getElementById('btnDong')
        const btnThem = document.getElementById('btnThem');

        const btnHuyThem = document.getElementById('btnHuyThem');
        const btnLuuThem = document.getElementById('btnLuuThem');

        const btnXems = document.querySelectorAll(".btnXem");
        const btnXoas = document.getElementById("btnXoas");
        const btnTim = document.getElementById('btnTim');

        const btnHuySua = document.getElementById('btnHuySua');
        const btnLuuSua = document.getElementById('btnLuuSua');

        const formHS = document.getElementById('formHS');
        const formMaincontent = document.getElementById('formMaincontent');
        const formxem = document.getElementById('formxem');
        const formthem = document.getElementById('formthem');


        cardn1.addEventListener('click', function (event) {
            event.preventDefault();
            formMaincontent.style.display = 'none';
            formHS.style.display = 'block';
        });

        btnDong.addEventListener("click", function (event) {
            event.preventDefault();
            formHS.style.display = "none";
            formMaincontent.style.display = "block";
        });

        btnThem.addEventListener("click", function () {
            event.preventDefault();
            formHS.style.display = "none";
            formthem.style.display = "block";
            formMaincontent.style.display = "none";
        });

        btnLuuThem.addEventListener('click', function () {
            successMessageThem.classList.remove('hidden');
            setTimeout(function () {
                successMessageThem.classList.add('hidden');
            }, 1000);
            event.preventDefault();
            formthem.style.display = "none";
            formMaincontent.style.display = "none";
            formHS.style.display = "block";
        });

        btnHuyThem.addEventListener("click", function (event) {
            event.preventDefault();
            formthem.style.display = "none";
            formMaincontent.style.display = "none";
            formHS.style.display = "block";
        });

        btnXems.forEach(function (button) {
            button.addEventListener("click", function () {
                formxem.style.display = "block";
                formHS.style.display = "none";
                formMaincontent.style.display = "none";
            });
        });

        btnHuySua.addEventListener("click", function (event) {
            event.preventDefault();
            formMaincontent.style.display = "none";
            formxem.style.display = "none"
            formHS.style.display = "block";
        });

        btnLuuSua.addEventListener('click', function () {
            successMessageSua.classList.remove('hidden');
            setTimeout(function () {
                successMessageSua.classList.add('hidden');
            }, 1000);
            event.preventDefault();
            formMaincontent.style.display = "none";
            formxem.style.display = "none"
            formHS.style.display = "block";
        });

        btnXoas.forEach(function (button) {
            button.addEventListener("click", function () {
                document.getElementById("confirmBox").classList.remove("hidden");
            });
        });

        document.getElementById("btnNo").addEventListener("click", function () {
            document.getElementById("confirmBox").classList.add("hidden");
        });

        document.getElementById("btnYes").addEventListener("click", function () {
            document.getElementById("confirmBox").classList.add("hidden");
        });

        formSearch.addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn chặn trang tải lại
            // 
            console.log('Tìm kiếm đã được thực hiện.');
        });
    </script>
</body>

</html>