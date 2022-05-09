<?php
    session_start();
    if($_SESSION['type']!='Student')
    {
        header('location:../Login/login.php');
        exit();
    }
    include '../connection.php'
?>
