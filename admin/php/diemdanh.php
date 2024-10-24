<?php
    // require_once 'components/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Student | Điểm danh</title>
    <link href="../image/logoFaceWeb.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
    <?php
        require_once'../php/includes/sidebar.php'
    ?>

    <div class="main">
        <nav class="nav navbar navbartoggle">
            <span  id="togglebar" class="iconNavbar icon las la-bars"></span>
            <span>Admin</span>
        </nav>

        <div class="main-content">
            <div id="formMaincontent" class="form-container container-lg">
                <div class="fdiemdanh">
                    <div class="diemdanh title">
                        <h2>Điểm danh</h2>
                        <button class="btnXemDSLop btn btn-primary" id="btnXemDSLop"><i class="icon1 la la-list"></i>Xem</button>
                    </div>
                    <div class="lich">
                        <span for="">Lịch học</span>
                        <input type="date" name="" id="todayDate" class="date">
                    </div>
                </div>
                <div id="formDSLop" class="form-container" style="display: none; border:none;">
                    <div class="title">
                            <h4 for="">Danh sách các lớp học</h4>
                    </div>
                    <form class="formSearch">
                        <input type="text" class="textSearch form-check-label" placeholder="Tìm tên, mã lớp..">
                        <button class="btnSearch btn btn-outline-primary" id="btnTim"><i class="icon1 las la-search"></i>Tìm kiếm</button>
                    </form>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Lớp</th>
                            <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>N3_1</td>
                                <td>
                                    <button class="btnXem" id="btnXem" type="button"><i class="icon1 iconview las la-list"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="formxem" class="form-container" style="display: none;">
                <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
                    <div class="title">
                        <h4 class="p">Danh sách lớp học phần <span id="tenlop"></span> </h4>
                    </div>
                    <div class="room-cards">
                        <a href="#" class="room-card">
                           <div class="room-card-box">
                                <div class="room-img">
                                    <div class="room-imgbox">
                                        <img src="../image/logostudent.png" alt="">
                                    </div>
                                </div>
                                <p class="free">Trần Thị <br> Thanh Phương</p>
                           </div>
                            <div class="attendance-status"></div>
                        </a>
                        <a href="#" class="room-card">
                           <div class="room-card-box">
                                <div class="room-img">
                                    <div class="room-imgbox">
                                        <img src="../image/logostudent.png" alt="">
                                    </div>
                                </div>
                                <p class="free">Trần Thị <br> Thanh Phương</p>
                           </div>
                            <div class="attendance-status"></div>
                        </a>
                        <a href="#" class="room-card">
                           <div class="room-card-box">
                                <div class="room-img">
                                    <div class="room-imgbox">
                                        <img src="../image/logostudent.png" alt="">
                                    </div>
                                </div>
                                <p class="free">Trần Thị <br> Thanh Phương</p>
                           </div>
                            <div class="attendance-status"></div>
                        </a>
                    </div>

                    <button id="btnDong" type="button" class="btn btnDong"><i class="icon1 la la-sign-out "></i>Đóng</button>
                </form>
            </div>

    </div>

    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('todayDate').value = today;
    </script>

    <script>
        let menu = document.querySelector('.iconNavbar');
        let sidebar = document.querySelector('.sidebar');
        let main = document.querySelector('.main');

        document.addEventListener("DOMContentLoaded", function() {
            var currentUrl = window.location.href;
            var links = document.querySelectorAll('.sidebar a');
            links.forEach(function(link) {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                }
            });
            
            menu.onclick = function() {
                sidebar.classList.toggle('active');
                main.classList.toggle('active');
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(){ 
            var currentUrl = window.location.href;
            var links = document.querySelectorAll('.sidebar a');
            links.forEach(function(link) { 
                if (link.href === currentUrl) { 
                    link.id = 'active-link' 
                }
            });
        });
    </script>

    <script>
        const formDSLop = document.getElementById('formDSLop');
        const formMaincontent = document.getElementById('formMaincontent');
        const formSearch = document.querySelector('.formSearch');
        const btnTim = document.getElementById('btnTim');
        const btnDong = document.getElementById('btnDong')

        const btnXems = document.querySelectorAll(".btnXem"); 
        const btnXemDSLop = document.querySelectorAll(".btnXemDSLop"); 

        formSearch.addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn trang tải lại
            // 
            console.log('Tìm kiếm đã được thực hiện.');
        });

        btnXemDSLop.forEach(function(button) {
            button.addEventListener("click", function() {
                formDSLop.style.display = "block";
            });
        });

        btnXems.forEach(function(button) {
            button.addEventListener("click", function() {
                formxem.style.display = "block";
                formMaincontent.style.display = "none";
            });
        });

        btnDong.addEventListener("click", function(event){
            event.preventDefault();
            formxem.style.display = "none";
            formMaincontent.style.display = "block";
        });

    </script>

</body>
</html>