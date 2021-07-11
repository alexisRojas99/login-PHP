<?php session_start();
 
require 'comprobar-sesion.php';
comprobarSesion();

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $telefono = filter_var($_POST['txtTelefono'], FILTER_SANITIZE_STRING);
     $clave = $_POST['txtClave'];
     // $clave = hash('sha512', $clave);

     try {
        $conexion = new PDO('mysql:host=localhost;dbname=curso-php', 'root', '');
     } catch (PDOException $e) {
         echo "Error: ".$e->getMessage();
     }

     $sql = $conexion->query("SELECT * FROM users WHERE Telefono = $telefono");
     $fila = $sql->fetch(PDO::FETCH_ASSOC);

     if (password_verify($clave, $fila['Clave']) == true && $telefono == $fila['Telefono']) {
          $_SESSION['Usuario'] = $telefono;
          header('Location: contenido.php');
     } else {
          $errores .= '<li>Datos Incorrectos</li>';
     }

     // $statement = $conexion->prepare('SELECT * FROM users WHERE Telefono = :telefono AND Clave = :clave');
     // $statement->execute(array(':telefono' => $telefono, ':clave' => $clave));

     // $resultado = $statement->fetch();
     
     /* if ($resultado != false) {
          $_SESSION['Usuario'] = $telefono;
          header('Location: contenido.php');
     } else {
          $errores .= '<li>Datos Incorrectos</li>';
     } */
}

require 'views/login.view.php';