<?php
include_once("../conexion/conexionbd.php");

if ($link->connect_error) {
  die("Conexión fallida: " . $link->connect_error);
}

// Consulta para obtener los cursos con su información adicional
$sql = "SELECT NombreCurso, Descripcion, nombre_creador, PDF, Activ1, Activ2, Activ3,
pregunta1, respuesta1_1, respuesta1_2, respuesta1_3, correcta1,
pregunta2, respuesta2_1, respuesta2_2, respuesta2_3, correcta2,
pregunta3, respuesta3_1, respuesta3_2, respuesta3_3, correcta3,
pregunta4, respuesta4_1, respuesta4_2, respuesta4_3, correcta4 FROM curso";
$result = $link->query($sql);

// Imprimir los cursos como una lista con información adicional y enlace de descarga para el PDF
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<li>";
    echo "<a href='#' onclick='mostrarContenidoCurso(\"" . $row["NombreCurso"] . "\")'>" . $row["NombreCurso"]. "</a>";
    echo "</li>";
  }
} else {
  echo "0 resultados";
}
$link->close();
?>
