<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION['id'] !== 1) {
    header("Location: menu_inicio.php");
}
?>