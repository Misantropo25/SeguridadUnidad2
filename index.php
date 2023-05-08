<?php
session_start(); // Iniciamos una sesión para almacenar los datos del usuario

// Si el usuario ya está logueado, lo redirigimos a la página de seguridad
if(isset($_SESSION['id_usuario'])) {
  header("Location: seguridad.php");
  exit();
}

// Verificamos si el formulario ha sido enviado
if(isset($_POST['submit'])) {

  // Conectamos a la base de datos
  $conexion = mysqli_connect('localhost', 'root', 'misan', 'SEGURIDAD');

  // Verificamos si la conexión fue exitosa
  if(!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
  }

  // Obtenemos los datos del formulario
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];

  // Preparamos la consulta para verificar si el usuario existe en la base de datos
  $consulta = "SELECT id, nombre FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";

  // Ejecutamos la consulta
  $resultado = mysqli_query($conexion, $consulta);

  // Verificamos si se encontró un usuario con los datos ingresados
  if(mysqli_num_rows($resultado) == 1) {

    // Almacenamos los datos del usuario en la sesión
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['id_usuario'] = $fila['id'];
    $_SESSION['nombre_usuario'] = $fila['nombre'];

    // Redirigimos al usuario a la página de seguridad
    header("Location: seguridad.php");
    exit();

  } else {

    // Mostramos un mensaje de error si no se encontró un usuario con los datos ingresados
    $mensaje = "Usuario o contraseña incorrectos.";

  }

  // Cerramos la conexión a la base de datos
  mysqli_close($conexion);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Formulario de acceso</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

  <h1>Formulario de acceso</h1>

  <?php if(isset($mensaje)) { ?>
    <p><?php echo $mensaje; ?></p>
  <?php } ?>

  <form method="post" action="index.php">

    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required>

    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required>

    <button type="submit" name="submit">Acceder</button>

  </form>

</body>
</html>
