<?php
// Verificar si se ha enviado el formulario para eliminar el curso
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_usuario']) && isset($_POST['nombre_curso'])) {
    // Obtener el nombre del usuario y el nombre del curso desde el formulario
    $nombreUsuario = $_POST['nombre_usuario'];
    $nombreCurso = $_POST['nombre_curso'];

    // Incluir el archivo de conexión a la base de datos
    include_once("../conexion/conexionbd.php");

    // Verificar si la conexión a la base de datos fue exitosa
    if ($link) {
        // Consultar la base de datos para obtener el nombre del creador del curso
        $consulta = "SELECT nombre_creador FROM curso WHERE NombreCurso = ?";
        $stmt = $link->prepare($consulta);
        $stmt->bind_param("s", $nombreCurso);
        $stmt->execute();
        $stmt->bind_result($nombreCreador);
        $stmt->fetch();
        $stmt->close();

        // Verificar si se encontró el curso en la base de datos y el nombre del creador coincide con el nombre de usuario proporcionado
        if ($nombreCreador === $nombreUsuario) {
            // Eliminar el curso de la base de datos
            $consultaEliminar = "DELETE FROM curso WHERE NombreCurso = ?";
            $stmtEliminar = $link->prepare($consultaEliminar);
            $stmtEliminar->bind_param("s", $nombreCurso);
            if ($stmtEliminar->execute()) {
                // El curso se eliminó correctamente
                echo "El curso se ha eliminado correctamente.";
            } else {
                // Error al intentar eliminar el curso
                echo "Error al intentar eliminar el curso.";
            }
            $stmtEliminar->close();
        } else {
            // El usuario no es el propietario del curso
            echo "No puedes eliminar este curso porque no eres el propietario.";
        }

        // Cerrar la conexión a la base de datos
        $link->close();
    } else {
        // Error al conectar a la base de datos
        echo "Error: No se pudo conectar a la base de datos.";
    }
}
?>
