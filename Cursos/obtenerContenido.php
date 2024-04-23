<?php
include_once("../conexion/conexionbd.php");

// Obtener el nombre del curso desde la solicitud GET
$nombre_curso = $_GET['NombreCurso'];

// Inicializar las variables de descripción, información y archivo PDF del curso
$descripcion_curso = "";
$pdf_curso = "";
$actividad_curso1 = "";
$actividad_curso2 = "";
$actividad_curso3 = "";
$pregunta1 = "";
$respuesta1_1 = "";
$respuesta1_2 = "";
$respuesta1_3 = "";
$correcta1 = "";
$pregunta2 = "";
$respuesta2_1 = "";
$respuesta2_2 = "";
$respuesta2_3 = "";
$correcta2 = "";
$pregunta3 = "";
$respuesta3_1 = "";
$respuesta3_2 = "";
$respuesta3_3 = "";
$correcta3 = "";
$pregunta4 = "";
$respuesta4_1 = "";
$respuesta4_2 = "";
$respuesta4_3 = "";
$correcta4 = "";

// Realizar la consulta a la base de datos para obtener la descripción, información y archivo PDF del curso
$sql = "SELECT Descripcion, PDF, Activ1, Activ2, Activ3,
pregunta1, respuesta1_1, respuesta1_2, respuesta1_3, correcta1,
pregunta2, respuesta2_1, respuesta2_2, respuesta2_3, correcta2,
pregunta3, respuesta3_1, respuesta3_2, respuesta3_3, correcta3,
pregunta4, respuesta4_1, respuesta4_2, respuesta4_3, correcta4
FROM curso WHERE NombreCurso = '$nombre_curso'";
$resultado = mysqli_query($link, $sql);

if ($resultado) {
    // Verificar si se encontraron resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener la fila de resultado
        $fila = mysqli_fetch_assoc($resultado);
        // Obtener la descripción del curso
        $descripcion_curso = $fila['Descripcion'];
       
        // Obtener la ruta del archivo PDF del curso
        $pdf_curso = $fila['PDF'];
        $actividad_curso1 = $fila['Activ1'];
        $actividad_curso2 = $fila['Activ2'];
        $actividad_curso3 = $fila['Activ3'];
        $pregunta1 = $fila['pregunta1'];
        $respuesta1_1 = $fila['respuesta1_1'];
        $respuesta1_2 = $fila['respuesta1_2'];
        $respuesta1_3 = $fila['respuesta1_3'];
        $correcta1 = $fila['correcta1'];
        $pregunta2 = $fila['pregunta2'];
        $respuesta2_1 = $fila['respuesta2_1'];
        $respuesta2_2 = $fila['respuesta2_2'];
        $respuesta2_3 = $fila['respuesta2_3'];
        $correcta2 = $fila['correcta2'];
        $pregunta3 = $fila['pregunta3'];
        $respuesta3_1 = $fila['respuesta3_1'];
        $respuesta3_2 = $fila['respuesta3_2'];
        $respuesta3_3 = $fila['respuesta3_3'];
        $correcta3 = $fila['correcta3'];
        $pregunta4 = $fila['pregunta4'];
        $respuesta4_1 = $fila['respuesta4_1'];
        $respuesta4_2 = $fila['respuesta4_2'];
        $respuesta4_3 = $fila['respuesta4_3'];
        $correcta4 = $fila['correcta4'];
    }
}

// Devolver la descripción, información y archivo PDF del curso como respuesta JSON
header('Content-Type: application/json');
echo json_encode([
    'descripcion_curso' => $descripcion_curso,
    'pdf_curso' => $pdf_curso, // Agregar el archivo PDF del curso a la respuesta JSON
    'actividad_curso1' => $actividad_curso1,
    'actividad_curso2' => $actividad_curso2,
    'actividad_curso3' => $actividad_curso3,
    'pregunta1' => $pregunta1,
    'respuesta1_1' => $respuesta1_1,
    'respuesta1_2' => $respuesta1_2,
    'respuesta1_3' => $respuesta1_3,
    'correcta1' => $correcta1,
    'pregunta2' => $pregunta2,
    'respuesta2_1' => $respuesta2_1,
    'respuesta2_2' => $respuesta2_2,
    'respuesta2_3' => $respuesta2_3,
    'correcta2' => $correcta2,
    'pregunta3' => $pregunta3,
    'respuesta3_1' => $respuesta3_1,
    'respuesta3_2' => $respuesta3_2,
    'respuesta3_3' => $respuesta3_3,
    'correcta3' => $correcta3,
    'pregunta4' => $pregunta4,
    'respuesta4_1' => $respuesta4_1,
    'respuesta4_2' => $respuesta4_2,
    'respuesta4_3' => $respuesta4_3,
    'correcta4' => $correcta4,
]);
?>
