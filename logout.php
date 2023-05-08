<?php
// Iniciar sesión
session_start();

// Eliminar las variables de sesión y redirigir a index.php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cerrar sesión</title>
</head>
<body>
	<h1>Cerrar sesión</h1>
	<?php
	// Eliminar las variables de sesión
	session_unset();
	session_destroy();
	?>
	<p>La sesión ha sido cerrada correctamente.</p>
	<a href="index.php">Volver a inicio</a>
</body>
</html>