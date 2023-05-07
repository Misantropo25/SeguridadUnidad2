<?php
    $servidor = "localhost";
    $usuario_db = "root";
    $contraseña_db = "misan";
    $nombre_db = "SEGURIDAD";

    // Establecer conexión con la base de datos
    $conn = mysqli_connect($servidor, $usuario_db, $contraseña_db, $nombre_db);

    // Verificar si la conexión fue exitosa
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Verificar si se envió el formulario de inicio de sesión
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos de inicio de sesión del formulario
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];

        // Consulta para verificar si las credenciales de inicio de sesión son válidas
        $sql = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contrasenia'";
        $resultado = mysqli_query($conn, $sql);

        // Verificar si se encontró un registro en la tabla de usuarios
        if (mysqli_num_rows($resultado) == 1) {
            // Inicio de sesión exitoso: redirigir a la página deseada
            header("Location: seguridad.php");
            exit();
        } else {
            // Credenciales de inicio de sesión no válidas: mostrar mensaje de error
            echo "Usuario o contraseña incorrectos";
        }
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conn);
?>