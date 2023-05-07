<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuario'])) {
  header('Location: seguridad.php');
  exit();
}

$mensaje = '';

// Verificar si el formulario ha sido enviado
if (isset($_POST['accion']) && $_POST['accion'] === 'iniciar-sesion') {
  // Conectar a la base de datos
  $conexion = mysqli_connect('localhost', 'root', 'misan', 'SEGURIDAD');

  // Verificar si se pudo conectar a la base de datos
  if (!$conexion) {
    die('Error al conectar a la base de datos');
  }

  // Escapar los datos ingresados por el usuario para prevenir SQL injection
  $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
  $contrasenia = mysqli_real_escape_string($conexion, $_POST['contrasenia']);

  // Consultar la base de datos para verificar las credenciales del usuario
  $consulta = "SELECT * FROM usuario WHERE usuario='$usuario' AND contrasenia='$contrasenia' LIMIT 1";
  $resultado = mysqli_query($conexion, $consulta);

  // Verificar si la consulta devolvió algún resultado
  if (mysqli_num_rows($resultado) === 1) {
    // Iniciar sesión y redirigir al usuario a la página de seguridad
    $_SESSION['usuario'] = $usuario;
    header('Location: seguridad.php');
    exit();
  } else {
    // Mostrar mensaje de error si las credenciales son incorrectas
    $mensaje = 'Usuario y/o contraseña incorrectos';
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="container">
    <h1>Iniciar sesión</h1>
    <form method="POST">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="contrasenia" placeholder="Contraseña" required>
      <button type="submit">Iniciar sesión</button>
      <?php if ($mensaje !== '') { ?>
        <p><?php echo $mensaje; ?></p>
      <?php } ?>
      <input type="hidden" name="accion" value="iniciar-sesion">
    </form>
  </div>
</body>
</html>
