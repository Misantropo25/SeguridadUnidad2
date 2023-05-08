<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<h1>Acceso seguro</h1>
	<form action="validacion.php" method="POST">
		<label for="usuario">Usuario:</label>
		<input type="text" id="usuario" name="usuario"><br><br>
		<label for="contrasenia">Contraseña:</label>
		<input type="password" id="contrasenia" name="contrasenia"><br><br>
		<input type="submit" value="Ingresar">
	</form>
</body>
</html>
