<?php
//Conexión a la BD: "cursos"
$connection = mysqli_connect('localhost','root','root','cursos');
//for testing connection
if(!$connection){
    echo 'Error de conexión a la BD...'. mysqli_connect_error();
    exit();
}
else{
    //Tomamos las variables que viene del Post del forulario "registrar.html"
    $iNombre = $_POST['txtNombre'];
    $iCorreo = $_POST['eCorreo'];
    $iPassw = $_POST['pContrasenia']; //Se aplica la funcion MD5
    //Verifica si ya existe un correo en la tabla login.
    $query = "SELECT correo FROM login WHERE correo='$iCorreo'";
    $resultcorreo = mysqli_query($connection, $query);
    //Verificamos cuantas filas (row) trae la consulta
    $num_rows = mysqli_num_rows($resultcorreo);
    if($num_rows>=1){
        echo "<script> alert('Este correo ya existe. ')</script>";
        header('Location: formulario.php?Error= Este correo ya existe.&Nombre='.$iNombre.'&Correo='.$iCorreo);
    }
    else{
    //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
        //En este caso, la Consulta fue un INSERT-INTO
    $resultado = mysqli_query($connection, "INSERT INTO login(nombre, correo, contrasenia) VALUES('$iNombre','$iCorreo','$iPassw')");

    if(!$resultado){
    echo 'Error en la Consulta.'.mysqli_connect_error();
    //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
     header('Location: formulario.html');
    }
    else{
      echo'Se realizó correctamente le registro.';
      header('Location: loginvista.php');
    }
    }  
}
?>