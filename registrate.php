<?php session_start();

require 'comprobar-sesion.php';
comprobarSesion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $nombre = filter_var($_POST['txtNombre'], FILTER_SANITIZE_STRING);
     $telefono = $_POST['txtTelefono'];
     $clave = $_POST['txtClave'];
     $clave2 = $_POST['txtRepetirClave'];
     $mes = $_POST['slctMes'];
     $dia = $_POST['slctDia'];
     $year = $_POST['slctYear'];

     $errores = '';

     if (empty($nombre) or empty($telefono) or empty($clave) or empty($clave2) or empty($mes) or empty($dia) or empty($year)) {
         $errores .= '<li>Debes llenar todos los campos</li>';
     } else {
         try {
             $conexion = new PDO('mysql:host=localhost;dbname=curso-php', 'root', '');
         } catch (PDOException $e) {
             echo "Error: ".$e->getMessage();
         }

         $statement = $conexion->prepare('SELECT * FROM users WHERE Telefono = :telefono LIMIT 1');
         $statement->execute(array(':telefono' => $telefono));
         $resultado = $statement->fetch();

         if ($resultado != false) {
              $errores .= '<li>El Usuario ya Existe</li>';
         }

        //  $clave = hash('sha512', $clave);
        //  $clave2 = hash('sha512', $clave2);

         $hash = password_hash($clave, PASSWORD_DEFAULT, ['cost' => 10]);

        //  password_verify($clave, $hash);

         if ($clave != $clave2) {
             $errores .= '<li>Las contraseñas no son iguales</li>';
         }

     }

     if ($errores == '') {
          $statement = $conexion->prepare("INSERT INTO users VALUES(:telefono, :nombre, :clave, :mes, :dia, :year)");
          $statement->execute(array(':telefono' => $telefono, ':nombre' => $nombre, ':clave' => $hash, ':mes' => $mes, ':dia' => $dia, ':year' => $year));

          header('Location: login.php');
     } 
}
 
require 'views/registrate.view.php';