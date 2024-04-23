<?php
// Obtener las respuestas enviadas por el cliente
$data = json_decode(file_get_contents("php://input"), true);
$nombre_curso = $data['nombre_curso'];
$respuestas = $data['respuestas'];

// Conectar a la base de datos (ajusta los detalles según tu configuración)
include_once("../conexion/conexionbd.php");

// Verificar la conexión
if ($link->connect_error) {
    die("Error de conexión: " . $link->connect_error);
}

// Construir la consulta SQL para obtener las respuestas correctas del curso
$sql = "SELECT correcta1, correcta2, correcta3, correcta4 FROM curso WHERE NombreCurso = ?";
$stmt = $link->prepare($sql);

// Verificar si la consulta preparada fue exitosa
if ($stmt) {
    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("s", $nombre_curso);
    $stmt->execute();
    
    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontró el curso
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Comparar las respuestas con las correctas y contar las respuestas correctas
        $correctas = 0;
        foreach ($respuestas as $pregunta => $respuesta_usuario) {
            $columna_correcta = 'correcta' . substr($pregunta, -1); // Obtener el nombre de la columna
            if ($row[$columna_correcta] === $respuesta_usuario) {
                $correctas++;
            }
        }

        // Enviar un mensaje adecuado según el desempeño del usuario
        if ($correctas >= 3) {
            echo "¡Felicitaciones! Has completado el curso exitosamente.";
        } else {
            echo "Lo sentimos, no has podido completar el curso. Inténtalo de nuevo.";
        }
    } else {
        echo "No se encontró el curso en la base de datos.";
    }

    // Cerrar la consulta preparada
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $link->error;
}

// Cerrar la conexión a la base de datos
$link->close();
?>
