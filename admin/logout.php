<?php

session_start();

if(isset($_SESSION['admin_id'])) {
    unset($_SESSION['admin_id']);
    session_destroy();
    header('Location: login.php');
} else {
    header('Location: login.php');
}

?>