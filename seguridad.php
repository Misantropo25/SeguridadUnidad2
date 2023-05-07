<?php
session_start();

if (!isset($_SESSION["nombre_usuario"])) {
  header("Location: index.php");
  exit;
}

$nombre_usuario = $_SESSION["nombre_usuario"];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Seguridad</title>
</head>
<body>
  <h1>Bienvenido, <?php echo $nombre_usuario; ?>!</h1>
</body>
</html>
