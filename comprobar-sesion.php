<?php
 
function comprobarSesion() {
    if (isset($_SESSION['Usuario'])) {
        header('Location: index.php');
    }
}