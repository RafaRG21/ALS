<?php session_start(); ?>
<?php
//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'cursos');

//si existe "id" en la url 
if(isset($_GET['ID'])){
	$ID = $_GET['ID'];//le asigno una variable 
	$query1 = "SELECT * FROM login WHERE ID =".$ID; //cadena de consulta para el elemento $ID
	if($result = mysqli_query($link, $query1)){ //si obtengo resultados ejecutando la consulta anterior
		while($login = mysqli_fetch_assoc($result)){ //asigno ese resultado a un array asociativo 
			$nombre = $login['nombre']; //creo variables con los nombres de los campos de la tabla 
			$correo = $login['correo'];
			$contrasenia = $login['contrasenia'];
		}
	}

}

if(isset($_POST['sw']) == 1){ //si se ha presionado el boton "Actualizar" 

	
		$query2 = "UPDATE login SET nombre='".$_POST['nombre']."', correo='".$_POST['correo']."', contrasenia='".$_POST['contrasenia']."' WHERE ID=".$_POST['ID'];
	if(mysqli_query($link, $query2)){ //si la consulta se ejecuta con exito
		echo "La informacion se actualizo con exito"; //mensaje de exito
		header('Location: Index.php'); //redireccion a index.php
	}else{ //si ocurrio un error
		echo "Ocurrio un error al intentar actualizar"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/editar_eliminar.css">
</head>
<body>
	<div id="wrapper">
		<h3>Editar usuario</h3>
		<form action="editar.php" method="post">
			<label for="nombre">Nombre: </label><br />
			<input type="text" name="nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" /><br /><br />

			<label for="correo">Email: </label><br />
			<input type="email" name="correo" value="<?php if(isset($correo)) echo $correo; ?>" /><br /><br />

			<label for="contrasenia">Contraseña: </label><br />
			<input type="password" name="contrasenia" value="<?php if(isset($contrasenia)) echo $contrasenia; ?>" /><br /><br />

			<input class="btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
			<a class="btn" href="index.php">Regresar</a>
			<input type="hidden" name="ID" value="<?php if(isset($ID)) echo $ID; ?>" />

			<input type="hidden" name="sw" value="1" />
		</form>
	</div>
</body>
</html>