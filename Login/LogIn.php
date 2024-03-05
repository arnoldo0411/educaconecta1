<?php
session_start();
// Si el usuario ya ha iniciado sesión, redirigir a la página principal
if (isset($_SESSION['nombre'])) {
    header("Location: ../Index/Index.php");
    exit();
}

include("iniciosesion.php");
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Metadatos para el conjunto de caracteres y configuración del viewport -->
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <!-- Hojas de estilo CSS externas -->
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/indexLogIn.css" />

    <!-- Hojas de estilo externas para fuentes desde Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" />
</head>

<body>
    <!-- Contenedor principal con la clase "login-frame" -->
    <div class="login-frame">
        <div class="log-in-4">
            <!-- Sección principal con la clase "typequest" -->
            <main class="typequest">
                <!-- Contenedor del lado izquierdo con la clase "left-side" -->
                <div class="left-side">
                    <!-- Formulario con la clase "f-r-a-m-e-logo" -->
                    <form class="f-r-a-m-e-logo" method="post" action="">
                        <input type="hidden" name="login" value="1">
                        <!-- Div con la clase "log-in" que contiene el logo y el título "Log In" -->
                        <div class="log-in">
                            <img class="logo-icon" loading="eager" alt="" src="../images/LogoFull.png" />
                            <h1 class="log-in1">Log In</h1>
                        </div>
                        <!-- Contenedor de campos de entrada con la clase "input" -->
                        <div class="input">
                            <!-- Campo de texto con etiqueta para el nombre de usuario -->
                            <div class="text-fieldoutlined">
                                <div class="input1">
                                    <div class="label-container">
                                        <div class="label">Nombre de usuario</div>
                                    </div>
                                    <input class="content" name="username" id="username" placeholder="Nombre de usuario" type="text" pattern="[a-zA-Z0-9]+" title="El nombre de usuario solo debe contener letras y números" required />
                                </div>
                                <div class="helpertext">
                                    <div class="helper-text"></div>
                                </div>
                            </div>
                            <!-- Campo de texto con etiqueta para la contraseña -->
                            <div class="text-fieldoutlined">
                                <div class="input3">
                                    <div class="label-container">
                                        <div class="label1">Contraseña</div>
                                    </div>
                                    <input class="content2" name="password" placeholder="Contraseña" type="password" required/>
                                </div>
                                <div class="helpertext2">
                                    <div class="helper-text2"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Contenedor de botones y enlaces con la clase "btm" -->
                        <div class="btm">
                            <!-- Botón de inicio de sesión con enlace -->
                            <div class="Boton-Log-In">
                                <input class="fcc-btn" type="submit" name="btnEnviar" value="Iniciar Sesión">
                            </div>

                        <!-- Enlace para cerrar sesión -->
            <?php if(isset($_SESSION['nombre'])): ?>
                <div class="link2">
                    <a href="cerrarsesion.php" title="CerrarSesion">Cerrar sesión</a>
                </div>
            <?php endif; ?>
                            <!-- Enlace para restablecer contraseña -->
                            <div class="link1">
                                <a href="../OlvideContra/OlvideContrasena.php" title="OlvideContrasena">Olvidé la contraseña</a>
                            </div>
                            <!-- Enlace para registrarse -->
                            <div class="link1">
                                <a href="../Signup/SignUp.php" title="SignUp">No tengo cuenta</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Imagen con la clase "pic-icon" en la parte derecha -->
                <img class="pic-icon" loading="eager" alt="" src="https://ed.stanford.edu/sites/default/files/news_images/absent.jpg" />
            </main>
        </div>
    </div>

   <!-- Bloquear retroceso después de iniciar sesión -->
   <?php if(isset($_SESSION['nombre'])): ?>
        <script>
            window.onload = function() {
                if (typeof window.history.pushState === "function") {
                    window.history.pushState("noForward", "", null);
                    window.history.forward();
                    window.onpopstate = function(event) {
                        window.history.pushState("noForward", "", null);
                        alert("Por favor, inicia sesión primero.");
                    };
                }
            };
        </script>
    <?php endif; ?>


</body>

</html>
