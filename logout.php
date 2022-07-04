<?php
session_start();
unset($_SESSION['admin_username']);
unset($_SESSION['admin_password']);
session_destroy();
header('Location: index.php');

?>
