<?php
    @include 'config.php';
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!';
        }else{
            if($pass != $cpass){
                $error[] = 'password not matched!';
            }else{
                $insert = "INSERT INTO user_form(name, email, password, user_type)
                           VALUES ('$name', '$email', '$pass', '$user_type')";
                mysqli_query($conn, $insert);
                header('location:login_form.php', true);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
        <a href="index.html" class="logo">LVTN<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="index.php#banner" onclick="toggleMenu();">Trang chủ</a></li>
            <li><a href="index.php#detail" onclick="toggleMenu();">Chi tiết</a></li>
            <li><a href="index.php#menu" onclick="toggleMenu();">Gợi ý</a></li>
        </ul>
    </header>
    <div class="form_container">
        <form action="" method="post">
            <h3>Đăng ký tài khoản</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class = "error_msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="text" name="username" required placeholder="Nhập vào tên người dùng của bạn">
            <input type="email" name="email" required placeholder="Nhập vào email của bạn">
            <input type="password" name="password" required placeholder="Nhập vào mật khẩu của bạn">
            <input type="password" name="cpassword" required placeholder="Xác nhận lại mật khẩu của bạn">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Đăng ký" class="form_btn">
            <p>Đã có tài khoản? <a href="login_form.php">Đăng nhập</a></p>
        </form>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>