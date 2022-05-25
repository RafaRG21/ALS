<?php session_start(); ?>
<html>
<head>
	<title>Eliminar Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/editar_eliminar.css">
</head>
<body>
	<div id="wrapper">
		<h3>Eliminar usuario</h3>
		<p>¿Estás seguro que quiere eliminar este registro permanentemente de la base de datos?</p>
		<form action="eliminar.php" method="post">
			<input class="btn-danger" type="submit" name="eliminar" value="Eliminar" />
			<input type="hidden" name="sw" value="1" />
			<?php if(isset($_GET['ID'])): ?>
				<input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>" />
			<?php endif; ?>
		</form><br />
		<a class="btn" href="index.php">Regresar</a>
	</div>
</body>
</html>
<?php 
 
//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'cursos');
 
//si el formulario fue enviado
if(isset($_POST['sw']) == 1){
 
	//cadena con la consulta de eliminacion segun el id de usuario
	$query = "DELETE FROM login WHERE ID=".$_POST['ID']; 
    if($query){
        echo 'fallo el query';
    }
    
	if(mysqli_query($link, $query)){ //si la consulta devuelve un resultado
		header("Location: index.php"); //redirecciono a index.php
	}else{ //si hubo un error
		echo "Ocurrio un error al intentar eliminar el registro"; //mensaje de error
	}
}
 
//cierro conexion a bbdd
mysqli_close($link);
?>