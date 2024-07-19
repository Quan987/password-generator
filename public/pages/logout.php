<?php require_once ('../../private/initialize.php');
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header('Location: ' . 'index.php');
    } else {
        $_SESSION = [];
        session_unset();
        session_destroy();
        header('Location: ' . "login.php");
        exit;
    }
    
    
?>