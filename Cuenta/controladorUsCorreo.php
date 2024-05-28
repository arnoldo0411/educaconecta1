<?php
include_once("../conexion/conexionbd.php");

// Verificar conexión
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Obtener datos del formulario
$new_username = $_POST['username'];
$new_email = $_POST['email'];
$password = $_POST['password'];

// Creamos un array para almacenar los mensajes
$messages = array();

// Verificar la contraseña actual
$sql_check_password = "SELECT * FROM usuarios WHERE Contraseña = ?";
$stmt_password = $link->prepare($sql_check_password);
if (!$stmt_password) {
    die("Error preparando la consulta de contraseña: " . $link->error);
}
$stmt_password->bind_param("s", $password);
$stmt_password->execute();
$result_password = $stmt_password->get_result();
$user = $result_password->fetch_assoc();

if ($user) {
    // Verificar si el nuevo nombre de usuario ya existe
    $sql_check_username = "SELECT * FROM usuarios WHERE NombreUs = ?";
    $stmt_username = $link->prepare($sql_check_username);
    if (!$stmt_username) {
        die("Error preparando la consulta de nombre de usuario: " . $link->error);
    }
    $stmt_username->bind_param("s", $new_username);
    $stmt_username->execute();
    $result_username = $stmt_username->get_result();

    // Verificar si el nuevo correo ya existe
    $sql_check_email = "SELECT * FROM usuarios WHERE Email = ?";
    $stmt_email = $link->prepare($sql_check_email);
    if (!$stmt_email) {
        die("Error preparando la consulta de correo electrónico: " . $link->error);
    }
    $stmt_email->bind_param("s", $new_email);
    $stmt_email->execute();
    $result_email = $stmt_email->get_result();

    if ($result_username->num_rows > 0 && $result_email->num_rows > 0) {
        $messages[] = "El nombre de usuario y el correo ya están en uso.";
    } elseif ($result_username->num_rows > 0) {
        $messages[] = "El nombre de usuario ya está en uso.";
    } elseif ($result_email->num_rows > 0) {
        $messages[] = "El correo electrónico ya está en uso.";
    }

    if (empty($messages)) {
        // Si ambos valores están disponibles, se actualizan los datos
        $sql_update = "UPDATE usuarios SET NombreUs = ?, Email = ? WHERE Contraseña = ?";
        $stmt_update = $link->prepare($sql_update);
        if (!$stmt_update) {
            die("Error preparando la consulta de actualización: " . $link->error);
        }
        $stmt_update->bind_param("sss", $new_username, $new_email, $password);
        if ($stmt_update->execute()) {
            $messages[] = "Los datos se han actualizado con éxito.";
        } else {
            $messages[] = "Error actualizando los datos: " . $link->error;
        }
        $stmt_update->close();
    }

    $stmt_username->close();
    $stmt_email->close();
} else {
    $messages[] = "Contraseña incorrecta.";
}

$stmt_password->close();
$link->close();

// Codificar el array de mensajes en formato JSON
$messages_json = json_encode($messages);
?>

<!-- Mostrar los mensajes emergentes utilizando JavaScript -->
<script>
    var messages = <?php echo $messages_json; ?>;
    var message = messages.join("\n"); // Convertir el array de mensajes en un solo mensaje

    // Mostrar la notificación
    alert(message);

    // Redireccionar a Cuenta.php después de que el usuario haga clic en "Aceptar"
    window.location.href = "Cuenta.php";
</script>
