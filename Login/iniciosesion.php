<?php
// Incluir archivo de conexión a la base de datos u otra lógica de verificación de inicio de sesión
include_once("../conexion/conexionbd.php");

// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!empty($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $usuario = $_POST["username"];
        $clave = $_POST["password"];

        // Lógica para verificar las credenciales en la base de datos
        $stmt = $link->prepare("SELECT * FROM usuarios WHERE NombreUs = ? AND Contraseña = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Iniciar sesión y establecer la variable de sesión
            $_SESSION['nombre'] = $usuario;
            
            // Redirigir al usuario a la página principal después de iniciar sesión
            header("Location: ../Index/Index.php");
            exit(); // Terminar el script
        } else {
            // Mostrar mensaje de acceso denegado si las credenciales son incorrectas
            echo '<script>alert("ACCESO DENEGADO");</script>';
        }
    } else {
        // Mostrar mensaje si el usuario no ingresó un nombre de usuario o contraseña
        echo '<script>alert("Por favor ingrese usuario y contraseña");</script>';
    }
}
?>
