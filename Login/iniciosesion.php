<?php
// Incluir archivo de conexión a la base de datos u otra lógica de verificación de inicio de sesión
include_once("../conexion/conexionbd.php");

// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializamos banderas para verificar si se deben mostrar mensajes de error
$usuario_correcto = false;
$contraseña_correcta = false;
$mostrar_mensaje_usuario_incorrecto = false;
$mostrar_mensaje_contraseña_incorrecta = false;

if (!empty($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $usuario = $_POST["username"];
        $clave = $_POST["password"];

        // Convertir el nombre de usuario a minúsculas para realizar la comparación exacta
        $usuario = strtolower($usuario);

        // Lógica para verificar las credenciales en la base de datos
        $stmt = $link->prepare("SELECT * FROM usuarios WHERE BINARY NombreUs = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuarioData = $result->fetch_assoc();
            // Verificar si la contraseña coincide
            if ($clave === $usuarioData['Contraseña']) {
                // Ambos usuario y contraseña son correctos
                $usuario_correcto = true;
                $contraseña_correcta = true;
                
                // Iniciar sesión y redirigir al usuario al index
                $_SESSION['nombre'] = $usuario;
                header("Location: ../Index/Index.php");
                exit(); // Terminar el script
            } else {
                // Solo la contraseña es incorrecta
                $mostrar_mensaje_contraseña_incorrecta = true;
            }
        } else {
            // El usuario no existe en la base de datos
            $mostrar_mensaje_usuario_incorrecto = true;
        }
    } 

    // Mostrar mensajes de error según las condiciones
    if (!$usuario_correcto && !$mostrar_mensaje_contraseña_incorrecta) {
        // Mostrar mensaje de usuario y contraseña incorrectos si tanto el usuario como la contraseña son incorrectos
        $message = "El usuario y la contraseña son incorrectos. Inténtelo de nuevo.";
        echo '<script>showMessage("' . $message . '");</script>';
    } elseif (!$mostrar_mensaje_usuario_incorrecto && $mostrar_mensaje_contraseña_incorrecta) {
        // Mostrar mensaje de contraseña incorrecta si el usuario existe en la base de datos pero la contraseña es incorrecta
        $message = "La contraseña es incorrecta. Intente de nuevo.";
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

            // Estilos CSS para el popup
            popup.style.position = 'fixed';
            popup.style.zIndex = '9999';
            popup.style.backgroundColor = 'black';
            popup.style.color = 'white';
            popup.style.padding = '10px';
            popup.style.borderRadius = '5px';
            popup.style.fontSize = '16px';
            popup.style.textAlign = 'center';
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
