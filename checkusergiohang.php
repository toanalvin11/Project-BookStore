<?php 
    function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    session_start();
    // kiem tra 
    if(!empty($_SESSION['user'])) {
        header('location:giohang.php');
    } else {
        header('location:Main.php');
        die();
    }
?>