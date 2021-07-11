<?php session_start();

if (isset($_SESSION['Usuario'])) {
    require 'views/contenido.view.php';
} else {
     header('Location: index.php');
}