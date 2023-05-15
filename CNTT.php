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
    <title>Công Nghệ Thông Tin & Truyền Thông</title>
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
        </ul>
    </header>
    <div class="container_fluid">
        <div class="container_1">
            <div class="pdf_list" id="pdf_list">
                <?php
                    $sql = "SELECT pdf FROM file WHERE nganh = 'CNTT&TT'";
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