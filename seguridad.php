<?php
session_start(); // Iniciamos la sesión para obtener los datos del usuario

// Si el usuario no está logueado, lo redirigimos al formulario de acceso
if(!isset($_SESSION['id_usuario'])) {
  header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Página segura</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

  <h1>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h1>

  <p>Aquí podrás ver tus datos:</p>

  <ul>
    <li>Usuario: <?php echo $_SESSION['nombre_usuario']; ?></li>
    <li>ID de usuario: <?php echo $_SESSION['id_usuario']; ?></li>
  </ul>

  <form method="post" action="index.php">

    <button type="submit" name="logout">Cerrar sesión</button>

  </form>

</body>
</html>