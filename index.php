<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div class="login-container">
		<h2>Login</h2>
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" required>
			<label for="password">Password:</label>
			<input type="password" name="password" required>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>

<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Validar usuario y contraseña en la base de datos
	if ($username == 'usuario' && $password == 'password') {
		$_SESSION['username'] = $username;
		header('Location: seguridad.php');
		exit();
	} else {
		echo '<div class="error">Invalid username or password</div>';
	}
}
?>