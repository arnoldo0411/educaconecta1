<?php
include("../conexion/conexionbd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos necesarios
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los datos del formulario
        $nombre_usuario = $_POST['username'];
        $contraseña = $_POST['password'];

        // Verificar si el nombre de usuario y la contraseña coinciden en la base de datos
        $stmt_check_user_password = $link->prepare("SELECT * FROM usuarios WHERE NombreUs = ? AND Contraseña = ?");
        $stmt_check_user_password->bind_param("ss", $nombre_usuario, $contraseña);
        $stmt_check_user_password->execute();
        $result_check_user_password = $stmt_check_user_password->get_result();

        if ($result_check_user_password->num_rows == 1) {
            // Eliminar el usuario de la base de datos
            $delete_query = "DELETE FROM usuarios WHERE NombreUs = ?";
            $stmt_delete_user = $link->prepare($delete_query);
            $stmt_delete_user->bind_param("s", $nombre_usuario);

            if ($stmt_delete_user->execute()) {
                // Cerrar la sesión
                session_start();
                session_unset();
                session_destroy();

                // Cuenta eliminada exitosamente
                echo "<script>alert('La cuenta ha sido eliminada exitosamente');</script>";
                echo "<script>window.location.href = '../Signup/SignUp.php';</script>";
            } else {
                // Error al eliminar la cuenta
                echo "<script>alert('Ocurrió un error al eliminar la cuenta');</script>";
            }

            $stmt_delete_user->close();
        } else {
            // Usuario o contraseña incorrectos
            echo "<script>alert('El nombre de usuario o la contraseña son incorrectos');</script>";
            echo "<script>window.location.href = 'eliminarCuenta.php';</script>";
        }

        $stmt_check_user_password->close();
    } else {
        // Datos incompletos
        echo "<script>alert('Por favor, ingrese el nombre de usuario y la contraseña');</script>";
        echo "<script>window.location.href = 'eliminarCuenta.php';</script>";
    }
} else {
    // Método de solicitud incorrecto
    echo "<script>alert('Acceso no autorizado');</script>";
    echo "<script>window.location.href = 'eliminarCuenta.php';</script>";
}

$link->close();
?>
