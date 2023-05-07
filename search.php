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
    <title>Searching</title>
    <link rel="stylesheet" href="style2.css">
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
    <header class="sticky">
        <a href="index.php" class="logo">LVTN<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="index.php#banner" onclick="toggleMenu();">Trang chủ</a></li>
            <li><a href="index.php#detail" onclick="toggleMenu();">Chi tiết</a></li>
            <li><a href="index.php#menu" onclick="toggleMenu();">Gợi ý</a></li>
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
            <!-- <li><a href="login.html" onclick="toggleMenu();">Log in</a></li> -->
            <li>
                <div class="search">
                    <form action="search.php" method="post">
                        <div class="icon"></div>
                        <div class="input">
                            <input type="text" placeholder="Search" id="mysearch" onkeyup="search_func()" data-search>
                        </div>
                        <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
                    </form>
                </div>
            </li>
        </ul>
    </header>
    <div class="container_fluid">
        <?php
            if(isset($_SESSION["admin_name"])){
                echo '<div class="container_2">
                        <div class="upload">
                            <a href="upload.php">Click here to upload file</a>
                        </div>
                    </div>';
            }
            else{
                echo '<div class="container_2">
                        <div class="upload">
                            <p>To upload, you need to login as admin.</p>
                        </div>
                    </div>';
            }
        ?>
        <div class="container_1">
            <div class="pdf_list" id="pdf_list">
                <!-- <div class="pdf">
                    <img src="images\\CNTT_1.png" alt="this is a picture">
                    <a href="pdf_CNTT_1.html"><h3>Nghiên cứu tính toán lưới và áp dụng giải bài toán trong an toàn thông tin - CNTT&TT</h3></a>
                </div>
                <div class="pdf">
                    <img src="images\\CNTT_2.png" alt="this is a picture">
                    <a href="pdf_CNTT_2.html"><h3>Tìm hiểu và phát triển ứng dụng tra cứu thông tin tàu xe trên thiết bị di động sử dụng hệ điều hành Android - CNTT&TT</h3></a>
                </div>
                <div class="pdf">
                    <img src="images\\CNTT_3.png" alt="this is a picture">
                    <a href="pdf_CNTT_3.html"><h3>Xây dựng website quản lý nhân sự cho công ty - CNTT&TT</h3></a>
                </div>
                <div class="pdf">
                    <img src="images\\KT_1.png" alt="this is a picture">
                    <a href="pdf_KT_1.html"><h3>Thiết lập mô hình nghiên cứu ảnh hưởng của một số biến vĩ mô đến tăng trưởng kinh tế Hoa Kỳ - Kinh Tế</h3></a>
                </div>
                <div class="pdf">
                    <img src="images\\KT_2.png" alt="this is a picture">
                    <a href="pdf_KT_2.html"><h3>Kinh tế nông nghiệp nông thôn, cơ sở và lý luận thực tiễn tại Ấn Độ - Kinh Tế</h3></a>
                </div> -->
                <?php
                    $sql = "SELECT pdf FROM file";
                    $query = mysqli_query($conn, $sql);
                    while($info=mysqli_fetch_array($query)){
                        ?>
                        <div class="pdf">
                            <embed src="pdf_files/<?php echo $info['pdf']; ?>" type="application/pdf">
                            <h3><?php echo $info['pdf']; ?></h3>
                            <br>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>