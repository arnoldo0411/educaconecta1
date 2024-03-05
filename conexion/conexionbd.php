<?php
#En este archivo php se hace una conexión con un servidor MySQL, 
#y se escoge la base de datos a la que se quiere acceder
#Autor: Arnoldo Gaona Hernandez.

// Se declaran variables para poder acceder a la base de datos
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "educaconecta1";

// Se abre una conexión al servidor MySQL y se guarda en una variable
$link = mysqli_connect($host, $dbuser, $dbpass, $db);

// Si hay un error de conexión, muestra un mensaje
if (mysqli_connect_error()) {
    die("No se pudo conectar con la base de datos: " . mysqli_connect_error());
}

// Selecciona la base de datos, si no se puede abrir muestra un mensaje de error
mysqli_select_db($link, $db) or die('No se puede abrir la estructura de BD: ' . mysqli_connect_error());
?>
