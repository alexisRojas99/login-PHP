<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">
    <title>Registrate</title>
</head>

<body>
    <div class="contenedor">
        <h1 class="titulo"></h1>
        <hr class="border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            method="POST" class="row g-3 formulario" name="login">

            <span class="titulo">Crea tu cuenta</span>

            <div class="col-md-7 form-floating">
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="txtNombre">
                <label for="Nombre" class="text-muted">Nombre</label>
            </div>
            <div class="col-md-5 form-floating">
                <input type="text" class="form-control" id="Telefono" placeholder="Telefono" name="txtTelefono">
                <label for="Telefono" class="text-muted">Teléfono</label>
            </div>
            <div class="col-md-12 form-floating">
                <input type="password" class="form-control" id="Clave" placeholder="Clave" name="txtClave">
                <label for="Clave" class="text-muted">Contraseña</label>
            </div>
            <div class="col-md-12 form-floating">
                <input type="password" class="form-control" id="RClave" placeholder="Repetir Clave"
                    name="txtRepetirClave">
                <label for="RClave" class="text-muted">Repetir Contraseña</label>
            </div>

            <div class="fecha-nacimiento">
                <span class="titulo">Fecha de nacimiento</span>
                <p>Esta información no será pública. Confirma tu propia edad, incluso si esta cuenta es para tu mascota
                    u otra cosa.</p>
            </div>

            <div class="col-md-5 form-floating">
                <select class="form-select" id="Mes" placeholder="Mes" name="slctMes">
                    <option selected></option>
                    <option value="Enero">Enero</option>
                    <option value="Febrero">Febrero</option>
                    <option value="Marzo">Marzo</option>
                    <option value="Abril">Abril</option>
                    <option value="Mayo">Mayo</option>
                    <option value="Junio">Junio</option>
                    <option value="Julio">Julio</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Septiembre">Septiembre</option>
                    <option value="Octubre">Octubre</option>
                    <option value="Noviembre">Noviembre</option>
                    <option value="Diciembre">Diciembre</option>
                </select>
                <label for="Mes" class="text-black">Mes</label>
            </div>
            <div class="col-md-4 form-floating">
                <select class="form-select" id="Dia" placeholder="Dia" name="slctDia">
                    <option selected></option>
                    <?php for ($i = 1; $i <= 31; $i++) {
                         echo "<option value='$i'>".$i."</option>";
                    } ?>
                </select>
                <label for="Dia" class="text-black">Día</label>
            </div>
            <div class="col-md-3 form-floating">
                <select class="form-select" id="Year" placeholder="Año" name="slctYear">
                    <option selected></option>
                    <?php for ($i = 2021; $i >= 1901; $i--) {
                         echo "<option value='$i'>".$i."</option>";
                    } ?>
                </select>
                <label for="Year" class="text-black">Año</label>
            </div>

            <div class="texto-sesion">
                <p class="text-muted"><span>¿Ya tienes una cuenta? </span><a href="login.php">Inicia sesión</a></p>
            </div>

            <?php if (!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="col-12 contenedor-submit">
                <button type="button" class="btn btn-primary btn-submit" onclick="login.submit()">Registrarse</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>