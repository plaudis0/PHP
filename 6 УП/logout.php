<?php
// 9 zadanie
    session_start();
    $_SESSION['auth'] = null;
    // 10 zadanie
    header("Location: index.php");
    $_SESSION['logout_message'] = 'Вы вышли из аккаунта :(((';
    die();
?>