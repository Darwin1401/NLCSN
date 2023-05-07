<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "essay_file";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception){
        echo "<script> alert('Could not connect!'); </script><br>";
    }
?>