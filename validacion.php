<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario_db = 'root';
$contrasenia_db = '';
$nombre_db = 'SEGURIDAD';
$conexion = mysqli_connect($host, $usuario_db, $contrasenia_db, $nombre_db);

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

// Consulta para validar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) == 1) {
	// El usuario es válido, se inicia sesión
	session_start();
	$_SESSION['usuario'] = $usuario;

	// Redirigir a seguridad.php
	header('Location: seguridad.php');
} else {
	// El usuario no es válido, se muestra un mensaje de error
	echo 'Usuario o contraseña incorrectos';
}
?>