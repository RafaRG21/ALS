<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/table.css">
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
            <li><a href="index.php">Inicio</a></li>
            <li><a href="usuarios.php" class="active">Usuarios</a></li>
            <li><a href="../php/salir.php" >Salir</a></li>
        </ul>
    </nav>

    <section>
            <div class="encabezado">
            <h1>Usuarios</h1>
            </div>
            <?php
                //Realizamos la conexion a la BD: "cursos"
                $connection = mysqli_connect('localhost', 'root', '', 'cursos');

                // for testing connection
                if(!$connection) {
                    echo 'Error de conexion a la BD...'. mysqli_connect_error();
                    exit();
                }
                else{
                    
                    if (isset($_GET['editausuario']))
                    {
                        //Aqui se muestra el formulario haciendo una consulta para extraer los datos ...
                        echo 'Aqui de edita al usuario: '.$_GET['editausuario'];
                        
                    }
                    else
                    {
                    //Consultamos todos los registros de la tabla "login"
                    $query = "SELECT ID, nombre, correo FROM login ORDER BY nombre";
                    $resultado = mysqli_query($connection, $query);

                    if (!$resultado)
                    {
                        echo 'Error en la Consulta.'.mysqli_connect_error();

                    }
                    else
                    {
                        //Verificamos cuantas filas (row) trae la consulta 
                        $num_rows = mysqli_num_rows($resultado);

                        //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "menuresponsivo.html"
                        
                        if ($num_rows==0)
                            echo "Se encontraron 0 registros.";
                        else
                        {
                            
                            echo '<table>'; //Se crea la tabla 
                            echo '<tr>'; //Crear una fila 
                            echo '<th>ID LOGIN</th> <th>NOMBRE</th> <th>CORREO</th> <th colspan="2" align="center">Acciones</th>';
                            echo '</tr>'; //Se cierra la fila 

                            //Mostramos todos los registros de la consulta 
                            while ($row = mysqli_fetch_array($resultado))
                            {
                                $cID = $row['ID'];
                                $cNombre = $row['nombre'];
                                $cCorreo = $row['correo'];

                                echo '<tr>';
                                echo '<td>'.$cID.' </td> <td>'.$cNombre.' </td> <td>'.$cCorreo.' </td>';
                                echo '<td> <a href="editar.php?ID='.$cID.'"class="boton">Editar </a></td>';
                                echo '<td> <a href="eliminar.php?ID='.$cID.'" class="boton2" value="Eliminar">Eliminar</a> </td>';
                                echo '</tr>';

                            }
                            echo '</table>';
                
                            mysqli_close($connection); //Cierra la conexión activa ...
                        }
                        
                    }
                }
                }

            ?>
    </section>

    <footer>
        <p style="color: #FFF;" >Copyright &copy; 2021</p>
    </footer>

</body>
</html>