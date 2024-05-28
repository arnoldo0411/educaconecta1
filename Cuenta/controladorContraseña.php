<?php
include("../conexion/conexionbd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos necesarios
    if (isset($_POST['username']) && isset($_POST['new_password'])) {
        // Obtener los datos del formulario
        $nombre_usuario = $_POST['username'];
        $nueva_contraseña = $_POST['new_password'];

        // Verificar si el nombre de usuario existe en la base de datos
        $stmt_check_username = $link->prepare("SELECT * FROM usuarios WHERE NombreUs = ?");
        $stmt_check_username->bind_param("s", $nombre_usuario);
        $stmt_check_username->execute();
        $result_check_username = $stmt_check_username->get_result();

        if ($result_check_username->num_rows == 1) {
            // Actualizar la contraseña
            $update_query = "UPDATE usuarios SET Contraseña = ? WHERE NombreUs = ?";
            $stmt_update = $link->prepare($update_query);
            $stmt_update->bind_param("ss", $nueva_contraseña, $nombre_usuario);

            if ($stmt_update->execute()) {
                // Contraseña actualizada con éxito
                echo "<script>alert('La contraseña se ha actualizado correctamente');</script>";
                echo "<script>window.location.href = 'Cuenta.php';</script>";
            } else {
                // Error al actualizar la contraseña
                echo "<script>alert('Ocurrió un error al actualizar la contraseña');</script>";
            }

            $stmt_update->close();
        } else {
            // El nombre de usuario no existe en la base de datos
            echo "<script>alert('El nombre de usuario ingresado no existe');</script>";
            echo "<script>window.location.href = 'cambiarContrasena.php';</script>";
        }
    } else {
        // Datos incompletos
        echo "<script>alert('Por favor, ingrese el nombre de usuario y la nueva contraseña');</script>";
        echo "<script>window.location.href = 'cambiarContrasena.php';</script>";
    }
} else {
    // Método de solicitud incorrecto
    echo "<script>alert('Acceso no autorizado');</script>";
    echo "<script>window.location.href = 'cambiarContrasena.php';</script>";
}
?>
