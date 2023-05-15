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
    <title>Upload</title>
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
                    echo '<li><a href="admin_page.php">'.$_SESSION['admin_name'].'</a>|<a href="logout.php">Đăng xuất</a></li>';
                }
                else{
                    echo '<li><a href="user_page.php">'.$_SESSION['user_name'].'</a>|<a href="logout.php">Đăng xuất</a></li>';
                }
            ?>
            <!-- <li><a href="login.html" onclick="toggleMenu();">Log in</a></li> -->
            <!-- <li>
                <div class="search">
                    <form action="search.php" method="post">
                        <div class="icon"></div>
                        <div class="input">
                            <input type="text" placeholder="Search" id="mysearch" onkeyup="search_func()" data-search>
                        </div>
                        <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
                    </form>
                </div>
            </li> -->
        </ul>
    </header>
    <div class="box">
        <span class="borderLine"></span>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <h2>Upload</h2>
            <input type="file" name="file" class="upload_box">
            <p>Chọn chuyên ngành:</p>
            <select name="nganh">
                <option value="Luật">Luật</option>
                <option value="Bách Khoa">Bách Khoa</option>
                <option value="CNTT&TT">CNTT&TT</option>
                <option value="Chính Trị">Chính Trị</option>
                <option value="Nông Nghiệp">Nông Nghiệp</option>
                <option value="Kinh Tế">Kinh tế</option>
            </select>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $target_dir = "pdf_files/";
        $pdf = $_FILES['file']['name'];
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $username = $_SESSION['username'];
        $nganh = $_POST['nganh'];
        if(file_exists($target_file)){
            echo "<script> alert('Sorry, file already exists.'); </script><br>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "<script> alert('Sorry, your file was not uploaded.'); </script><br>";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO file(user_name, pdf, nganh)
                        VALUES('$username' ,'$pdf', '$nganh')";
                $query = mysqli_query($conn, $sql);
                echo "<script> alert('The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.')</script><br>";
            }
            else {
                echo "<script> alert('Sorry, there was an error uploading your file.')</script><br>";
            }
          }
    }
?>