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

        // Convertir el nombre de usuario a minúsculas para realizar la comparación exacta
        $usuario = strtolower($usuario);

        // Lógica para verificar las credenciales en la base de datos
        $stmt = $link->prepare("SELECT * FROM usuarios WHERE BINARY NombreUs = ? AND Contraseña = ?");
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
            $message = "¡ACCESO DENEGADO!, INTENTE DE NUEVO.";
            echo '<script>showMessage("' . $message . '");</script>';
        }
    } else {
        // Mostrar mensaje si el usuario no ingresó un nombre de usuario o contraseña
        $message = "Por favor ingrese usuario y contraseña";
        echo '<script>showMessage("' . $message . '");</script>';
    }
}
?>

<!-- Código JavaScript para mostrar la ventana emergente -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var message = "<?php echo isset($message) ? $message : '' ?>";
        showMessage(message);
    });

    function showMessage(message) {
        if (message.trim() !== '') {
            var popup = document.createElement('div');
            popup.classList.add('popup');
            popup.innerText = message;

            document.body.appendChild(popup);

            // Centrar el popup
            popup.style.top = '50%';
            popup.style.left = '50%';
            popup.style.transform = 'translate(-50%, -50%)';

            // Cerrar el popup después de 3 segundos
            setTimeout(function() {
                popup.remove();
            }, 3000);
        }
    }
</script>
