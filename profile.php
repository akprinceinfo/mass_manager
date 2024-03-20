<?php 

    session_start();

    if ($_SESSION['login']) {
        echo $_SESSION['login'];
    }else {
        header('location:index.php');
    }



?>

<h3><a href="log_out.php">Logout</a></h3>