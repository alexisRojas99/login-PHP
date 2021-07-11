<?php session_start();

if (isset($_SESSION['Usuario'])) {
    header('Location: contenido.php');
} else {
     header('Location: login.php');
}