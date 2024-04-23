<!DOCTYPE html>
<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] === true) {
    // Si el usuario ya está autenticado, redirigir al index
    echo '<script>window.location.href = "Index.php";</script>';
    exit();
}
?>

<html>

<head>
    <!-- Metadatos para el conjunto de caracteres y configuración del viewport -->
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <!-- Hojas de estilo CSS externas -->
    <link rel="stylesheet" href="../css/globalIndex.css" />
    <link rel="stylesheet" href="../css/indexIndex.css" />

    <style>
        h3 {
            color: #503e9d; /* Establece el color del texto como morado */
        }
    </style>

    <!-- Hoja de estilo externa para fuentes desde Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" />
</head>

<body>
    <!-- Contenedor principal con la clase "desktop-32" -->
    <div class="desktop-32">

        <!-- Div hijo dentro de "desktop-32" -->
        <div class="desktop-32-child"></div>

        <!-- Contenedor padre para un marco rectangular y un botón con estilo transparente -->
        <div class="rectangle-parent">

            <!-- Div hijo dentro de "rectangle-parent" para un marco -->
            <div class="frame-child"></div>

            <!-- Botón con estilo transparente e imagen en su interior -->
            <button class="boton-transparente" type="button">
                <img class="e" src="../images/LogoPNG.png" alt="Descripción de la imagen">
            </button>
        </div>

        <!-- Botón con estilo transparente y texto en su interior -->
        <button class="boton-transparente-educonecta" type="button">
            <div class="educonecta">Educonecta</div>
        </button>

    

        <!-- Contenedor para diversas secciones como "Inicio," "Cursos," y "Mensajes" -->
        <div class="courses-frame">
            <div class = "cursos"><a href="../Cursos/crearCurso.php" class="Curso" style="color: black;">Crear Curso</a></div>
            <div class = "cursos"><a href="../Cursos/curso.php" class="Curso" style="color: black;">Cursos</a></div>
            <div class = "cursos"><a href="../Login/cerrarsesion.php" class="Curso" style="color: black;">Cerrar Sesión</a></div>
        </div>

        <!-- Área principal de contenido con un div hijo dentro de "course-frame" -->
        <main class="course-frame">
            <div class="course-frame-child"></div>

            <!-- Sección para información relacionada con el usuario con una barra de búsqueda -->
            <section class="user-frame">
                

                <!-- Texto que indica cursos sin terminar -->
                <div class="tus-cursos-sin-acabar"><h3>¿Por qué creamos esta página?</h3>
                    <h6> 
                            Promover la igualdad de acceso a la educación de calidad del país mediante el diseño y el <br>
                            desarrollo de software de una página web para eficientar el soporte educativo.
                    </h6>
                </div>
            </section>
           
        </main>
    </div>
</body>

</html>

