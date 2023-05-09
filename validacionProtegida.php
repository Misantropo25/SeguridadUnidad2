<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario_db = 'jair';
$contrasenia_db = 'misan';
$nombre_db = 'SEGURIDAD';
$conexion = mysqli_connect($host, $usuario_db, $contrasenia_db, $nombre_db);

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

// Consulta preparada para validar el usuario en la base de datos
$stmt = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE usuario=? AND contrasenia=?");
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasenia);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado) == 1) {
	// El usuario es válido, se inicia sesión
	session_start();
	$_SESSION['usuario'] = $usuario;

	// Redirigir a seguridad.php
	header('Location: seguridad.php');
} else {
	// El usuario no es válido, se muestra un mensaje de error
	echo 'Usuario o contraseña incorrectos';
    header('Location: index.php');
}
?>