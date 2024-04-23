<?php
// Verificar si se recibió el parámetro "nombre" en la URL
if (isset($_GET['nombre'])) {
    // Obtener el nombre del curso de la URL
    $nombreCurso = $_GET['nombre'];

    // Incluir el archivo de conexión a la base de datos
    include_once("../conexion/conexionbd.php");

    // Verificar si la conexión a la base de datos fue exitosa
    if ($link) {
        // Preparar la consulta SQL para buscar el curso por su nombre
        $sql = "SELECT NombreCurso FROM curso WHERE NombreCurso = ?";
        $stmt = $link->prepare($sql);

        // Verificar si la consulta preparada fue exitosa
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("s", $nombreCurso);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Obtener el resultado de la consulta
                $result = $stmt->get_result();

                // Crear un array para almacenar los cursos encontrados
                $cursos = array();

                // Verificar si se encontraron cursos
                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y almacenar los nombres de los cursos
                    while ($row = $result->fetch_assoc()) {
                        $cursos[] = $row;
                    }
                }

                // Devolver los cursos encontrados en formato JSON
                echo json_encode($cursos);
            } else {
                // Error al ejecutar la consulta
                echo json_encode(array("error" => "Error al ejecutar la consulta"));
            }

            // Cerrar la consulta preparada
            $stmt->close();
        } else {
            // Error al preparar la consulta
            echo json_encode(array("error" => "Error al preparar la consulta"));
        }

        // Cerrar la conexión a la base de datos
        $link->close();
    } else {
        // Error de conexión a la base de datos
        echo json_encode(array("error" => "Error de conexión a la base de datos"));
    }
} else {
    // Si no se proporcionó el parámetro "nombre" en la URL
    echo json_encode(array("error" => "No se proporcionó el nombre del curso"));
}
?>
