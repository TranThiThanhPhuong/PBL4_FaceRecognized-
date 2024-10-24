<?php
     require_once '../php/components/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Student | Trang chủ</title>
    <link href="../image/logoFaceWeb.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
    <?php
        require_once '../php/includes/sidebar.php'
    ?>

    <div class="main">
        <nav class="nav navbar navbartoggle">
            <span  id="togglebar" class="iconNavbar icon las la-bars"></span>
            <span>Admin</span>
        </nav>

        <div class="main-content">
            <div id="formMaincontent" class="form-container container-lg">
                <div class="title">
                    <h2>Overview</h2>
                </div>
                <div class="stats">
                    <div class="stat">
                        <i class="icontc la la-user-graduate"></i>
                        <h3>
                            <?php echo 150
                            ?>
                        </h3>
                        <p>Học viên</p>
                    </div>
                    <div class="stat">
                        <i class="icontc la la-chalkboard-teacher"></i>
                        <h3>
                            <?php
                                echo 25;
                            ?>
                        </h3>
                        <p>Giáo viên</p>
                    </div>
                    <div class="stat">
                        <i class="icontc la la-school"></i>
                        <h3>
                            <?php
                                echo 25;
                            ?>
                        </h3>
                        <p>Lớp</p>
                    </div>
                </div>


                <!-- <div class="cards">
                    <div class="card">
                        <?php
                        ?>
                        <div class="card-data">
                            <div class="card-main">
                                <h3>Sinh viên</h3>
                                <h2><?php ?></h2>
                            </div>
                            <i class="iconcard icontc la la-user"></i>
                        </div>
                    </div>
                    <div class="card">
                        <?php 
                        ?>
                        <div class="card-data">
                            <div class="card-main">
                                <h3>Khoa</h3>
                                <h2><??></h2>
                            </div>
                            <i class="iconcard icontc la la-file-text"></i>
                        </div>
                    </div>
                    <div class="card">
                        <?php 
                        ?>
                        <div class="card-data">
                            <div class="card-main">
                                <h3>Lớp</h3>
                                <h2><??></h2>
                            </div>
                            <i class="iconcard icontc la la-user-tie"></i>
                        </div>
                    </div>
                </div> -->
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

</body>
</html>