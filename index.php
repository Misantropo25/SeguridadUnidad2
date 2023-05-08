<?php
  session_start();

  // Si ya hay una sesión activa, redirige a seguridad.php
  if(isset($_SESSION['id_usuario'])) {
    header("Location: seguridad.php");
    exit;
  }

  $mensaje = "";
  
  // Verifica si se envió el formulario
  if(isset($_POST['login'])) {
    
    // Conecta a la base de datos
    $conexion = mysqli_connect("localhost", "jair", "misan", "SEGURIDAD");
    
    // Verifica si la conexión fue exitosa
    if(mysqli_connect_errno()) {
      $mensaje = "Error de conexión a la base de datos: " . mysqli_connect_error();
    } else {
    
      // Obtiene los datos ingresados por el usuario
      $usuario = $_POST['usuario'];
      $contraseña = $_POST['contraseña'];
    
      // Verifica si los datos son correctos
      $query = "SELECT id, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contraseña'";
      $resultado = mysqli_query($conexion, $query);
      
      if(mysqli_num_rows($resultado) == 1) {
        
        // Inicia la sesión y almacena los datos del usuario
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['id_usuario'] = $fila['id'];
        $_SESSION['nombre_usuario'] = $fila['usuario'];
        
        // Redirige a la página segura
        header("Location: seguridad.php");
        exit;
        
      } else {
        $mensaje = "Nombre de usuario o contraseña incorrectos";
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

  <h1>Iniciar sesión</h1>
  
  <?php
    // Muestra el mensaje de error o éxito
    if($mensaje != "") {
      echo "<p class='mensaje'>" . $mensaje . "</p>";
    }
  ?>
  
  <form method="post" action="index.php">

    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required>

    <button type="submit" name="login">Iniciar sesión</button>

  </form>

</body>
</html>
