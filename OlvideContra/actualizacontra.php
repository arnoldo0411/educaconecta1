<?php
include("../conexion/conexionbd.php");

if (isset($_POST['update_password'])) {
    if (
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        $nombre_usuario = trim($_POST['nombre']);
        $nueva_contraseña = trim($_POST['password']);

        // Verificar si el nombre de usuario existe en la base de datos
        $stmt_check_username = $link->prepare("SELECT * FROM usuarios WHERE NombreUs = ?");
        $stmt_check_username->bind_param("s", $nombre_usuario);
        $stmt_check_username->execute();
        $result_check_username = $stmt_check_username->get_result();

        if ($result_check_username->num_rows == 1) {
            // Actualizar la contraseña
            $update_query = "UPDATE usuarios SET Contraseña = '$nueva_contraseña' WHERE NombreUS = '$nombre_usuario'";
            $result_update = mysqli_query($link, $update_query);
            if ($result_update) {
                $_SESSION['message'] = "La contraseña se ha actualizado correctamente";
            } else {
                $_SESSION['message'] = "Ocurrió un error al actualizar la contraseña";
            }
        } else {
            $_SESSION['message'] = "El nombre de usuario ingresado no existe";
        }
    } else {
        $_SESSION['message'] = "Se requieren todos los datos";
    }
}
?>

<!-- HTML Code to Display Popup -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var message = "<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : '' ?>";
        showMessage(message);
        <?php unset($_SESSION['message']); ?> // Clear the message after displaying it
    });

    function showMessage(message) {
        if (message.trim() !== '') {
            var popup = document.createElement('div');
            popup.classList.add('popup');
            popup.innerText = message;

            document.body.appendChild(popup);

            // Center the popup
            popup.style.top = '50%';
            popup.style.left = '50%';
            popup.style.transform = 'translate(-50%, -50%)';

            // Close the popup after 3 seconds
            setTimeout(function() {
                popup.remove();
                // Redireccionar a la página de olvide contraseña
                window.location.href = 'OlvideContrasena.php';
            }, 3000);
        }
    }
</script>

