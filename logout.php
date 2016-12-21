<?php
session_start();
ob_start();
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['type']);
unset($_SESSION);
header("Location: index.php?action=logout");
exit;
?>