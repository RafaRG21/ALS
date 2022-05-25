<?php
session_start(); //Inicializa que puedas tener o crear sesiones de usuario.
//Realizamos la conexion a la BD: cursos
$connection = mysqli_connect('localhost','root','','cursos');
// for testing connection

if(!$connection){
    echo'Error de conexión a la BD...'. mysqli_connect_error();
    exit();
}
else{
     //Tomamos las variables que viene del POST del formulario "loginvista.html".
     $cCorreo = $_POST['txtCorreo'];
     $cPassw = $_POST['txtContra']; //Se aplica la función MD5 a la contraseña.
      //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
      //En este caso, la Consulta fue un SELECT-FROM-WHERE
      $resultado =mysqli_query($connection, "SELECT * FROM login WHERE correo='$cCorreo' AND contrasenia='$cPassw'"); 
    if(!$resultado){
        echo'Error en la Consulta.'.mysqli_connect_error();
        //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de "loginvista.html".
        header('Location: loginvista.php');
    }
    else{
        $num_rows = mysqli_num_rows($resultado);
        if($num_rows==0){
            echo "<script> alert('Correo y/o contraseña incorrectos. ')</script>";
            header('Location: loginvista.php?Error= Correo y/o contraseña incorrectos.&Correo='.$iCorreo);
        }
        else{
        echo'Se realizó correctamente la consulta.';
        //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "menuresponsivo.html"
        $row = mysqli_fetch_array($resultado);
            
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['Nombre'] = $row['nombre'];
                $_SESSION['eMail'] = $row['correo'];
            mysqli_close($connection); // se cierra la conexion
                //Se genera la Sesión para el usuario y se manda llamar al index.php de la carpeta: admin
            header('Location: admin/index.php'); 
        
    }}
}
?>