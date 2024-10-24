<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Student | Khoa</title>
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
                <div class="title">
                    <h4 for="">Danh sách các khoa</h4>
                    <button id="btnThem" class="btnThem btn btn-primary"><i class="icon las la-plus-circle"></i>Thêm mới</button> 
                </div>
                <form class="formSearch">
                    <input type="text" class="textSearch form-check-label" placeholder="Tìm tên, mã khoa..">
                    <button class="btnSearch btn btn-outline-primary" id="btnTim"><i class="icon1 las la-search"></i>Tìm kiếm</button>
                </form>
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Khoa</th>
                          <th scope="col">Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>
                            <button class="btnSua" id="btnSua" type="button"><i class="icon1 iconedit las la-edit"></i></button>
                            <button class="btnXoa" id="btnXoa" type="button"><i class="icon1 icondel las la-trash"></i></button>
                          </td>
                        </tr>
                      </tbody>
                </table>
            </div>

            <div id="formthem" class="form-container" style="display: none;">
                <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
                    <div class="title">
                        <h4 class="p">Thêm khoa mới</h4>
                    </div>
                    <div class="mb-3">
                        <label for="" class="lable form-label">Tên khoa</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <button id="btnLuuThem" type="button" class="btn btnSave"><i class="icon1 las la-save"></i>Lưu</button>
                    <button id="btnHuyThem" type="button" class="btn btnClose"><i class="icon1 las la-times"></i>Hủy</button>
                </form>
            </div>
            <div id="successMessageThem" class="alert alert-success hidden" role="alert">
                Thêm thành công!
            </div>

            <div id="formsua" class="form-container" style="display: none;">
                <form class="form" action="" method="POST" name="" enctype="multipart/form-data">
                    <div class="title">
                        <h4 class="p">Sửa thông tin</h4>
                    </div>
                    <div class="mb-3">
                        <label for="" class="lable form-label">Tên khoa</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <button id="btnLuuSua" type="button" class="btn btnSave"><i class="icon1 las la-save"></i>Lưu</button>
                    <button id="btnHuySua" type="button" class="btn btnClose"><i class="icon1 las la-times"></i>Hủy</button>
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
        const formthem = document.getElementById('formthem');
        const formsua = document.getElementById('formsua');
        const formMaincontent = document.getElementById('formMaincontent');
        const formSearch = document.querySelector('.formSearch');
        const btnTim = document.getElementById('btnTim');

        const btnHuyThem = document.getElementById('btnHuyThem');
        const btnHuySua = document.getElementById('btnHuySua');
        const btnLuuThem = document.getElementById('btnLuuThem');
        const btnLuuSua = document.getElementById('btnLuuSua');

        const btnThem = document.getElementById('btnThem');
        const btnXoas = document.querySelectorAll(".btnXoa");
        const btnSuas = document.querySelectorAll(".btnSua"); 

        const successMessageThem = document.getElementById('successMessageThem');
        const successMessageSua = document.getElementById('successMessageSua');

        formSearch.addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn trang tải lại
            // 
            console.log('Tìm kiếm đã được thực hiện.');
        });

        btnThem.addEventListener("click", function(){
            formthem.style.display = "block";
            formMaincontent.style.display = "none";
        });

        btnSuas.forEach(function(button) {
            button.addEventListener("click", function() {
                formsua.style.display = "block";
                formMaincontent.style.display = "none";
            });
        });

        btnXoas.forEach(function(button) {
            button.addEventListener("click", function() {
                document.getElementById("confirmBox").classList.remove("hidden");
            });
        });

        btnHuyThem.addEventListener("click", function(event){
            event.preventDefault();
            formthem.style.display = "none";
            formMaincontent.style.display = "block";
        });

        btnHuySua.addEventListener("click", function(event){
            event.preventDefault();
            formsua.style.display = "none";
            formMaincontent.style.display = "block";
        });

        btnLuuThem.addEventListener('click', function() {
            successMessageThem.classList.remove('hidden');
            setTimeout(function() {
                successMessageThem.classList.add('hidden');
            }, 1000);
            event.preventDefault();
            formthem.style.display = "none";
            formMaincontent.style.display = "block";
        });

        btnLuuSua.addEventListener('click', function() {
            successMessageSua.classList.remove('hidden');
            setTimeout(function() {
                successMessageSua.classList.add('hidden');
            }, 1000);
            event.preventDefault();
            formsua.style.display = "none";
            formMaincontent.style.display = "block";
        });

        document.getElementById("btnNo").addEventListener("click", function() {
            document.getElementById("confirmBox").classList.add("hidden");
        });

        document.getElementById("btnYes").addEventListener("click", function() {
            document.getElementById("confirmBox").classList.add("hidden");
        });

    </script>

</body>
</html>