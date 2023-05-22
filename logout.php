<?php
    session_start();
    echo "logout";
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
    if(isset($_SESSION['slideimg'])){
        unset($_SESSION['slideimg']);
    }
    header('location: index.php');
?>