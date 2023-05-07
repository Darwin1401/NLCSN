<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display PDF</title>
</head>
<body>
    <div class="div1">
        <?php
            include 'config.php';
            $sql = "SELECT pdf FROM file";
            $query = mysqli_query($conn, $sql);
            while($info=mysqli_fetch_array($query)){
                ?>
                <embed src="pdf_files/<?php echo $info['pdf'] ?>" type="application/pdf" width="900" height="500">
                <br>
                <?php
            }
        ?>
    </div>
</body>
</html>