<?php
include("../conexion/conexionbd.php");

if (isset($_POST['register'])) {
    if (
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['edad']) >= 1 &&
        strlen($_POST['ciudad']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $edad = trim($_POST['edad']);
        $ciudad = trim($_POST['ciudad']);
        $password = trim($_POST['password']);

        // Check if email already exists
        $stmt_check_email = $link->prepare("SELECT * FROM usuarios WHERE Email = ?");
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        // Check if username already exists
        $stmt_check_username = $link->prepare("SELECT * FROM usuarios WHERE NombreUs = ?");
        $stmt_check_username->bind_param("s", $name);
        $stmt_check_username->execute();
        $result_check_username = $stmt_check_username->get_result();

        if ($result_check_email->num_rows > 0 && $result_check_username->num_rows > 0) {
            // Both email and username already exist
            $_SESSION['message'] = "El correo electrónico y el nombre de usuario ya están en uso";
        } elseif ($result_check_email->num_rows > 0) {
            // Email already exists
            $_SESSION['message'] = "El correo electrónico ya está en uso, intenta con otro.";
        } elseif ($result_check_username->num_rows > 0) {
            // Username already exists
            $_SESSION['message'] = "El nombre de usuario ya está en uso, intenta con otro";
        } else {
            // Proceed with user registration
            $consulta = "INSERT INTO usuarios (Email, NombreUs, Edad, Ciudad, Contraseña) 
                VALUES ('$email', '$name', '$edad', '$ciudad', '$password')";

            $result = mysqli_query($link, $consulta);
            if ($result) {
                // Registration successful
                $_SESSION['message'] = "Tu registro se ha completado con éxito";
            } else {
                // Registration failed
                $_SESSION['message'] = "Ocurrió un error, lo sentimos";
            }
        }
    } else {
        // Show error message if all fields are not provided
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
            }, 3000);
        }
    }
</script>
