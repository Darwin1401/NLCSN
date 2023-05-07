<!-- them SQL, sua lai chuc nang tim kiem, upload them file pdf, login -->
<?php
    @include "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nien luan co so</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="preloader">
        <div class="loading">
            <span class="shape shape-1"></span>
            <span class="shape shape-2"></span>
            <span class="shape shape-3"></span>
            <span class="shape shape-4"></span>
        </div>
    </div>
    <header>
        <a href="#" class="logo">LVTN<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="#banner" onclick="toggleMenu();">Trang chủ</a></li>
            <li><a href="#detail" onclick="toggleMenu();">Chi tiết</a></li>
            <li><a href="#menu" onclick="toggleMenu();">Gợi ý</a></li>
            <?php
                if(!isset($_SESSION["admin_name"]) && !isset($_SESSION["user_name"])){
                    echo '<li><a href="login_form.php" onclick="toggleMenu();">Log in</a></li>';
                }
                elseif(isset($_SESSION["admin_name"])){
                    echo '<li><a href="admin_page.php">'.$_SESSION['admin_name'].'</a>|<a href="logout.php">Logout</a></li>';
                }
                else{
                    echo '<li><a href="user_page.php">'.$_SESSION['user_name'].'</a>|<a href="logout.php">Logout</a></li>';
                }
            ?>
            <li>
                <div class="search">
                    <div class="icon"></div>
                    <div class="input">
                        <input type="text" placeholder="Search" id="mysearch" onkeyup="search_func()" data-search>
                    </div>
                    <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
                </div>
            </li>
        </ul>
    </header>
    <section class="banner" id="banner">
        <div class="content">
            <h2>Luận văn tốt nghiệp</h2>
            <a href="#detail" class="btn">Chi Tiết</a>
        </div>
    </section>
    <section class="Detail" id="detail">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>C</span>hi tiết</h2>
                <p>Luận văn tốt nghiệp (Khóa luận) là văn bản nghiên cứu khoa học của sinh viên các trường Đại học về một chủ đề nào đó vào học kỳ cuối làm điều kiện tốt nghiệp ra trường. Khái niệm luận văn tốt nghiệp cũng tương đương với đồ án tốt nghiệp, nhưng luận văn mang tính chất nghiên cứu lý thuyết nhiều hơn – còn đồ án (dành cho khối ngành kỹ thuật, thiết kế…) chủ yếu là thực hành, có thể tạo thành 1 sản phẩm cụ thể.</p>
                <a href="https://edu.hoteljob.vn/tin-tuc/luan-van-tot-nghiep-la-gi-7-kinh-nghiem-huu-ich-can-biet-khi-lam-luan-van-tot-nghiep-39">Xem thêm.</a>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <img src="images\\pexels-cottonbro-studio-5076522.jpg">
                </div>
            </div>
        </div>
    </section>
    <section class="menu" id="menu">
        <div class="title">
            <h2 class="titleText">Gợi <span>Ý</span></h2>
            <p>Gợi ý một số mẫu luận văn các khoa, ngành</p>
        </div>
        <div class="content">
            <div class="box">
                <div class="imgBx">
                    <img src="images\\pexels-pixabay-270348.jpg" alt="This is menu picture">
                </div>
                <div class="text">
                    <a href="search.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        CNTT&TT
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images\\pexels-caio-46274.jpg" alt="This is menu picture">
                </div>
                <div class="text">
                    <a href="search.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Bách Khoa
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images\\pexels-sora-shimazaki-5669602.jpg" alt="This is menu picture">
                </div>
                <div class="text">
                    <a href="search.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Luật
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images\\pexels-john-guccione-wwwadvergroupcom-3483098.jpg" alt="This is menu picture">
                </div>
                <div class="text">
                    <a href="search.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Kinh Tế
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images\\pexels-pixabay-265216.jpg" alt="This is menu picture">
                </div>
                <div class="text">
                    <a href="search.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Nông Nghiệp
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="imgBx">
                    <img src="images\\pexels-leon-huang-13430559.jpg" alt="This is menu picture">
                </div>
                <div class="text">
                    <a href="search.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Chính Trị
                    </a>
                </div>
            </div>
        </div>
        <div class="title">
            <a href="search.php" class="btn">View All</a>
        </div>
    </section>
    <div class="copyrightText">
        <p>Copyright 2023 <span>Trần Hải Đăng.</span> All Right Reserved</p>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>