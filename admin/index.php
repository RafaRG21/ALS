<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Menú Responsive</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class='bx bx-menu'></i>
        </label>
        <a href="index.php" class="enlace">
            <i class='bx bxs-game logo'></i>
        
        <?php
            if (!isset($_SESSION["ID"]))
            {
                header('Location: ../index.html');
            }
            else
            {
                echo'<p class=name>'; echo "Bienvenid@: ".$_SESSION['Nombre']; echo '</p>';
            }
        ?>
        </a>
        <ul>
            <li><a href="#" class="active">Inicio</a></li>
            <li><a href="usuarios.php" >Usuarios</a></li>
            <li><a href="192.168.122.237" >Descargar Información</a></li>
            <li><a href="../php/salir.php" >Salir</a></li>
        </ul>
    </nav>

    <section></section>
    <footer>
    <p style="color: #FFF;" >Copyright &copy; 2021</p>
    </footer>


</body>
</html>