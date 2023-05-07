<?php
session_start();

// Verificar si el usuario ya inició sesión
if (isset($_SESSION['usuario'])) {
  header('Location: seguridad.php');
  exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['usuario'];
  $contrasenia = $_POST['contrasenia'];

  // Verificar si el usuario y la contraseña son correctos
  // En este ejemplo, se utiliza el usuario "admin" y la contraseña "12345"
  if ($usuario == 'admin' && $contrasenia == '12345') {
    $_SESSION['usuario'] = $usuario;
    header('Location: seguridad.php');
    exit;
  } else {
    $mensaje_error = 'El usuario o la contraseña son incorrectos.';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario de acceso</title>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <?php if (isset($mensaje_error)): ?>
    <div class="mensaje-error"><?php echo $mensaje_error; ?></div>
  <?php endif; ?>
  <form method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required><br>
    <label for="contrasenia">Contraseña:</label>
    <input type="password" name="contrasenia" required><br>
    <button type="submit">Acceder</button>
  </form>
</body>
</html>