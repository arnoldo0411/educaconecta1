<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include_once("../conexion/conexionbd.php");

    // Verificar si la conexión a la base de datos fue exitosa
    if ($link) {
        // Recuperar los datos del formulario
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $usuario_creador = $_POST['nombreCreador'];
        
        // Obtener el nombre del archivo PDF y la ruta temporal
        $pdf_name = $_FILES['pdf']['name'];
        $pdf_tmp_name = $_FILES['pdf']['tmp_name'];
        
        // Definir la ruta de destino del PDF
        $pdf_path = "../pdf/" . $pdf_name;
        
        // Mover el archivo PDF a la ubicación permanente
        if (move_uploaded_file($pdf_tmp_name, $pdf_path)) {
            // Resto de los datos del formulario
            $actividad1 = $_POST['actividad1'];
            $actividad2 = $_POST['actividad2'];
            $actividad3 = $_POST['actividad3'];
            $pregunta1 = $_POST['pregunta1'];
            $respuesta1_1 = $_POST['respuesta1_1'];
            $respuesta1_2 = $_POST['respuesta1_2'];
            $respuesta1_3 = $_POST['respuesta1_3'];
            $respuesta_correcta1 = $_POST['correcta1'];
            $pregunta2 = $_POST['pregunta2'];
            $respuesta2_1 = $_POST['respuesta2_1'];
            $respuesta2_2 = $_POST['respuesta2_2'];
            $respuesta2_3 = $_POST['respuesta2_3'];
            $respuesta_correcta2 = $_POST['correcta2'];
            $pregunta3 = $_POST['pregunta3'];
            $respuesta3_1 = $_POST['respuesta3_1'];
            $respuesta3_2 = $_POST['respuesta3_2'];
            $respuesta3_3 = $_POST['respuesta3_3'];
            $respuesta_correcta3 = $_POST['correcta3'];
            $pregunta4 = $_POST['pregunta4'];
            $respuesta4_1 = $_POST['respuesta4_1'];
            $respuesta4_2 = $_POST['respuesta4_2'];
            $respuesta4_3 = $_POST['respuesta4_3'];
            $respuesta_correcta4 = $_POST['correcta4'];
            $categoria = $_POST['categoria'];
            $lenguaje = $_POST['lenguaje'];
            $duracion = $_POST['duracion'];

            // Preparar la consulta SQL para insertar el curso
            $sql = "INSERT INTO curso (NombreCurso, Descripcion, nombre_creador, PDF, Activ1, Activ2, Activ3, 
                    pregunta1, respuesta1_1, respuesta1_2, respuesta1_3, correcta1,
                    pregunta2, respuesta2_1, respuesta2_2, respuesta2_3, correcta2,
                    pregunta3, respuesta3_1, respuesta3_2, respuesta3_3, correcta3,
                    pregunta4, respuesta4_1, respuesta4_2, respuesta4_3, correcta4,
                    Categoria, Lenguaje, Duracion) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?)";
            $stmt = $link->prepare($sql);

            // Verificar si la consulta preparada fue exitosa
            if ($stmt) {
                // Vincular parámetros
                $stmt->bind_param("ssssssssssssssssssssssssssssss", 
                    $titulo, $descripcion, $usuario_creador, $pdf_path, 
                    $actividad1, $actividad2, $actividad3,
                    $pregunta1, $respuesta1_1, $respuesta1_2, $respuesta1_3, $respuesta_correcta1,
                    $pregunta2, $respuesta2_1, $respuesta2_2, $respuesta2_3, $respuesta_correcta2,
                    $pregunta3, $respuesta3_1, $respuesta3_2, $respuesta3_3, $respuesta_correcta3,
                    $pregunta4, $respuesta4_1, $respuesta4_2, $respuesta4_3, $respuesta_correcta4,
                    $categoria, $lenguaje, $duracion);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    // Mostrar mensaje de éxito
                    echo "<script>alert('El curso se ha registrado correctamente.');</script>";
                    // Redirigir al usuario de vuelta al índice después de 2 segundos
                    echo "<script>setTimeout(function() { window.location.href = '../Index/Index.php'; }, 2000);</script>";
                    exit;
                } else {
                    // Mostrar mensaje de error
                    echo "<script>alert('Error al registrar el curso: " . $stmt->error . "');</script>";
                }

                // Cerrar la consulta
                $stmt->close();
            } else {
                // Mostrar mensaje de error
                echo "<script>alert('Error al preparar la consulta: " . $link->error . "');</script>";
            }
        } else {
            // Mostrar mensaje de error si no se pudo mover el archivo
            echo "<script>alert('Error al mover el archivo PDF.');</script>";
        }

        // Cerrar la conexión a la base de datos
        $link->close();
    } else {
        // Mostrar mensaje de error
        echo "<script>alert('Error: No se pudo conectar a la base de datos.');</script>";
    }
}
?>
