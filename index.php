<?php
session_start();
if(isset($_SESSION['id'])) {
    header("Location: seguridad.php");
    exit;
}

if(isset($_POST['submit'])) {
    $servidor = "localhost";
    $usuario_db = "jair";
    $contraseña_db = "misan";
    $nombre_db = "SEGURIDAD";
    $conexion = mysqli_connect($servidor, $usuario_db, $contraseña_db, $nombre_db);
    if(mysqli_connect_errno()) {
        $mensaje = "Error de conexión a la base de datos: " . mysqli_connect_error();
    } else {
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $contrasenia = mysqli_real_escape_string($conexion, $_POST['contrasenia']);
        $query = "SELECT id, usuario FROM usuarios WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
        $resultado = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_assoc($resultado);
            $_SESSION['id'] = $fila['id'];
            $_SESSION['usuario'] = $fila['usuario'];
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
    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

    <h1>Iniciar sesión</h1>

    <?php if(isset($mensaje)): ?>
        <p class="mensaje"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php">

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia" required>

        <button type="submit" name="submit">Iniciar sesión</button>

    </form>

</body>
</html>
