<?php
    @include 'config.php';
    session_start();
    if(!isset($_SESSION['admin_name'])){
        header('location:login_form.php', true);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="login.css">
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
        </ul>
    </header>
    <div class="container">
        <div class="content">
            <h3>Hi, <span>admin</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1>
            <p>This is an admin page</p>
            <a href="register_form.php" class="btn">Register</a>
            <a href="logout.php" class="btn">Logout</a>
            <a href="delete_account.php" class="btn">Delete this account</a>
        </div>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>