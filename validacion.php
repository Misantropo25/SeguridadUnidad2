<?php
  session_start();

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
      $contrasena = $_POST['contrasena'];
    
      // Verifica si los datos son correctos
      $query = "SELECT id, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
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
        header("Location: index.php");
        exit;
      }
    }
  }
?>