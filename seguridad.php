<?php
// Iniciar sesión
session_start();

// Verificar que el usuario ha iniciado sesión
if(!isset($_SESSION['usuario'])) {
	// Si el usuario no ha iniciado sesión, redirigir a index.php
	header('Location: index.php');
	exit();
}

// Obtener el usuario de la sesión
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seguridad</title>
</head>
<body>
	<h1>Bienvenido, <?php echo $usuario; ?></h1>
	<p>Esta es información confidencial para usuarios validados.</p>
	<form action="logout.php" method="POST">
		<input type="submit" value="Cerrar sesión">
	</form>
</body>
</html>