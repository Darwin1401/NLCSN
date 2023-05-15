<?php
    @include 'config.php';
    session_start();
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);

        $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                header('location:admin_page.php', true);
            }elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                header('location:user_page.php', true);
            }
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['name'];
        }else{
            $error[] = 'incorrect email or password!';
        }
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
    <div class="form_container">
        <form action="" method="post">
            <h3>Đăng nhập</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class = "error_msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="email" name="email" required placeholder="Nhập vào email của bạn">
            <input type="password" name="password" required placeholder="Nhập vào mật khẩu của bạn">
            <input type="submit" name="submit" value="Đăng nhập" class="form_btn">
            <p>Không có tài khoản? <a href="register_form.php">Đăng ký</a></p>
        </form>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>