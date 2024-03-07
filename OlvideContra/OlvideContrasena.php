<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/indexOlvideContrasena.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Arial:wght@400&display=swap"
    />
  </head>
  <body>
    <div class="login-frame">
      <div class="log-in-4">
        <main class="typequest">
          <div class="left-side">
            <form class="input-container-frame" method="post" action="">
              <div class="rectangle-logo">
                <img class="logo-icon" 
                loading="eager"
                alt="" 
                src="../images/LogoFull.png">

                <h1 class="olvide-contrasea">Olvide contraseña</h1>
              </div>

                <div class="input">
                  <div class="text-fieldoutlined">
                    <div class="input1">
                        <div class="label-container">
                            <div class="label">Nombre de usuario</div>
                        </div>
                        <input class="content" placeholder="Nombre Usuario" type="text" id="nombre_usuario" name="nombre" pattern="[a-zA-Z0-9]+" title="El nombre de usuario solo puede contener letras y números" required />
                    </div>
                    <div class="helpertext">
                        <div class="helper-text"></div>
                    </div>
                  </div>
                  <script>
                    document.getElementById('nombre_usuario').addEventListener('input', function() {
                        // Convertir el valor del nombre de usuario a minúsculas
                        this.value = this.value.toLowerCase();
                    });
                  </script>

                <div class="text-fieldoutlined">
                    <div class="input2">
                        <div class="label-container">
                            <div class="label1">Contraseña</div>
                        </div>
                        <div class="password-container">
                            <input class="content1" placeholder="Contraseña" type="password" name="password" required />
                            <span class="show-password" id="togglePassword">Mostrar</span>
                        </div>
                    </div>
                    <div class="helpertext1">
                        <div class="helper-text1"></div>
                    </div>
                </div>

                <style>
                    .password-container {
                        position: relative;
                        display: flex;
                        align-items: center;
                    }

                    .password-container .content1 {
                        flex: 1;
                        width: calc(100% - 90px);
                    }

                    .password-container #togglePassword {
                        margin-left: 10px; /* Ajusta el margen a tu gusto */
                        font-size: 0.6em; /* Tamaño de fuente más pequeño */
                        color: black; /* Color del texto */
                        cursor: pointer;
                    }
                </style>

                <script>
                    const passwordField = document.querySelector('.content1');
                    const togglePasswordBtn = document.getElementById('togglePassword');

                    togglePasswordBtn.addEventListener('click', function() {
                        passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                        togglePasswordBtn.textContent = passwordField.type === 'password' ? 'Mostrar' : 'Ocultar';
                    });
                </script>
              </div>
              
              <div class="btm">
                <button class="buttoncontained" name="update_password" type="submit">
                  <div class="unstyledbutton">
                    <div class="button">Actualizar Contraseña</div>
                  </div>
                </button>
                <div class="link">
                  <a 
                  href="../Login/LogIn.php" 
                  title="LogIn">Recorde mi contraseña
                  </a>
                </div>
              </div>
            </form>
          </div>
          <h1 class="informacin-importante-por-container">
            <p class="blank-line">&nbsp;</p>
            <p class="blank-line1">&nbsp;</p>
            <p class="blank-line2">&nbsp;</p>
            <p class="blank-line3">&nbsp;</p>
            <p class="blank-line4">&nbsp;</p>
            <p class="blank-line5">&nbsp;</p>
            <p class="blank-line6">&nbsp;</p>
            <p class="informacin-importante">¡Información importante!</p>
            <p class="por-favor-lea">
              Por favor, lea la información proporcionada y después rellene los
              campos requeridos.
            </p>
            <p class="blank-line7">&nbsp;</p>
            <ul class="no-revele-su-contrasea-a-nadi">
              <li class="no-revele-su">No revele su contraseña a nadie.</li>
              <li class="no-reutilcese-contraseas">
                No reutilíce contraseñas.
              </li>
              <li class="use-caracteres-alfanumricos">
                Use caracteres alfanuméricos para su contraseña.
              </li>
            </ul>
          </h1>
        </main>
      </div>
    </div>
    <?php
      include("actualizacontra.php");
    ?>
  </body>
</html>
