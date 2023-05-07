<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  header('Location: index.php');
  exit;
}

// Obtener la información del usuario
// En este ejemplo, se utiliza información de ejemplo
$nombre_usuario = 'Administrador';
$email_usuario = 'admin@example.com';

// Cerrar sesión si se ha enviado el formulario de deslogueo
if (isset($_POST['accion']) && $_POST['accion'] == 'desloguear') {
  session_destroy();
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Información del usuario</title>
</head>
<body>
  <h1>Bienvenido, <?php echo $nombre_usuario; ?>!</h1>
  <p>A continuación se muestra su información de usuario:</p>
  <ul>
    <li><strong>Nombre de usuario:</strong> <?php echo $nombre_usuario; ?></li>
    <li><strong>Correo electrónico:</strong> <?php echo $email_usuario; ?></li>
  </ul>
  <p>Aquí puedes leer más información sobre seguridad en las bases de datos</p>
  <p><a href="#" onclick="document.getElementById('formulario-deslogueo').submit();">Desloguearse</a></p>
  <form id="formulario-deslogueo" method="POST">
    <input type="hidden" name="accion" value="desloguear">
  </form>
</body>
</html>
