<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<div class="container">
		<h1>Iniciar sesión</h1>
		<form action="validacion.php" method="post">
			<label for="usuario">Usuario:</label>
			<input type="text" id="usuario" name="usuario" required>

			<label for="contrasena">Contraseña:</label>
			<input type="password" id="contrasena" name="contrasena" required>

			<button type="submit" name="login">Iniciar sesión</button>
		</form>
	</div>
</body>
</html>
