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
            <div class="inicio">Inicio</div>
            <div class="cursos">Cursos</div>
            <div class="cursos">Mensajes</div>
            <div class="cursos"><a href="../Login/cerrarsesion.php">Cerrar Sesión</a></div>
            <!-- Contenedor con imágenes relacionadas con aplicaciones, gráficos de líneas y chat -->
            <div class="apps-line-graph-bar">
                <img class="apps-2-line-1-icon" loading="eager" alt="" src="../public/apps2line-1.svg" />
                <img class="graph-bar-1-icon" loading="eager" alt="" src="../public/graphbar-1.svg" />
                <img class="chat-3-line-1-1" loading="eager" alt="" src="../public/chat3line-1-1.svg" />
            </div>
        </div>

        <!-- Área principal de contenido con un div hijo dentro de "course-frame" -->
        <main class="course-frame">
            <div class="course-frame-child"></div>

            <!-- Sección para información relacionada con el usuario con una barra de búsqueda -->
            <section class="user-frame">
                <div class="search-frame">

                    <!-- Botón de búsqueda con una imagen y un campo de entrada -->
                    <div class="search-button">
                        <img class="search-3-1" alt="" src="../public/search-3-1.svg" />
                        <input class="buscar" placeholder="Buscar.." type="text" />
                    </div>

                    <!-- Contenedor para texto e imágenes relacionadas con el usuario -->
                    <div class="tus-cursos-sin-acabar-text">
                        <img class="user-1-1" loading="eager" alt="" src="../public/user-1-1.svg" />
                        <img class="tus-cursos-sin-acabar-text-child" loading="eager" alt="" src="../public/frame-1.svg" />
                    </div>
                </div>

                <!-- Texto que indica cursos sin terminar -->
                <div class="tus-cursos-sin-acabar">Tus cursos sin acabar</div>
            </section>

            <!-- Contenedor para mostrar mensajes no leídos -->
            <div class="unread-messages">
                <div class="mensajes-sin-leer">Mensajes sin leer</div>
            </div>

           
        </main>
    </div>
</body>

</html>
