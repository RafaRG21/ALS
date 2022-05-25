<!DOCTYPE html>
<html lang="es">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/formulario.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
  </head>
  <body>
    <form action="veriflogin.php" method="post" class="formulario" autocomplete="off">
      <h1 class="encabezado"><span class="logo"><i class='bx bxs-game'></i></span>Inicio de sesión</h1>
      <div class="contenedor">
        <div class="input-contenedor">
          <i class='bx bx-envelope icon'></i>
          <input type="email" name="txtCorreo" value="<?php if(isset($_GET['correo'])) echo $_GET['correo']; ?>" placeholder="correo electrónico" required>
        </div>
        <?php
        if(isset($_GET['Error']))
           echo $_GET['Error'];
      ?>
        <div class="input-contenedor">
          <i class='bx bx-lock-alt icon'></i>
          <input type="password" name="txtContra" placeholder="contraseña" required>
        </div>
        <div class="container_button">
        <input type="submit" value="Iniciar sesión" class="button">
        </div>
        <p>Al registrarte, aceptas las condiciones de uso y privacidad.</p>
        <p>¿No tienes cuenta? <a href="formulario.php" class="link">Regístrate</a></p>
      </div>
    </form>
  </body>
</html> 