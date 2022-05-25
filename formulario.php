<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="css/formulario.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <title>Registrate</title>
</head>
<body>
  <form action="registrar.php" method="post" class="formulario" autocomplete="off">
  <h1 class="encabezado"><span class="logo"><i class='bx bxs-game'></i></span>Registro</h1>
    <div class="contenedor">
      <div class="input-contenedor">
        <i class='bx bxs-user icon'></i>
        <input type="text" name="txtNombre" value="<?php if(isset($_GET['nombre'])) echo $_GET['nombre']; ?>" placeholder="Nombre completo" required>
      </div>
      <?php
        if(isset($_GET['Error']))
           echo $_GET['Error'];
      ?>
      <div class="input-contenedor">
        <i class='bx bx-envelope icon'></i>
        <input type="email" name="eCorreo" value="<?php if(isset($_GET['correo'])) echo $_GET['correo']; ?>" placeholder="Correo eléctronico" required>
      </div>
      <div class="input-contenedor">
        <i class='bx bx-lock-alt icon'></i>
        <input type="password" name="pContrasenia" placeholder="Contraseña" required>
      </div>
      <div class="container_button">
      <input type="submit" value="Regístrate" class="button">
      </div>
      <p>Al registrarte, aceptas las condiciones de uso y privacidad.</p>
      <p>¿Ya tienes cuenta? <a href="loginvista.php" class="link">Iniciar Sesión</a></p>
    </div>
  </form>
</body>
</html>