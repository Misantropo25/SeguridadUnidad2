<?php
// Conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "misan";
$database = "SEGURIDAD";
$conn = mysqli_connect($host, $username, $password, $database);

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Consultar si el usuario y la contraseña son correctos
  $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$username' AND contrasena = '$password'";
  $result = mysqli_query($conn, $query);

  // Si se encontró un resultado, redirigir al archivo seguridad.php
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["nombre_usuario"] = $row["nombre_usuario"];
    header("Location: seguridad.php");
    exit;
  } else {
    $error_message = "Usuario o contraseña incorrectos";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
  <title>Inicio de sesion</title>
</head>
<body>
  <h1>Validar usuario</h1>

  <?php if (isset($error_message)) { ?>
    <p><?php echo $error_message; ?></p>
  <?php } ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username">

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password">

    <input type="submit" value="Iniciar sesión">
  </form>
</body>
</html>
