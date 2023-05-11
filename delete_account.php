<?php
    @include 'config.php';
    session_start();
    $email = $_SESSION['email'];
    echo $email;
    $delete = "DELETE FROM user_form
               WHERE email = '$email'";
    session_unset();
    session_destroy();
    mysqli_query($conn, $delete);
    header('location:login_form.php', true);
?>