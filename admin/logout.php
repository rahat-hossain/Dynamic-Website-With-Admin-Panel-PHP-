<?php
    session_start();
    unset($_SESSION['user_status']);
    unset($_SESSION['user_email']);
    header('location: ../login.php')
?>