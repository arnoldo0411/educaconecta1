<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/indexLogIn.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

    <div class="login-frame">
        <div class="log-in-4">
            <main class="typequest">
                <div class="left-side">
                    <form class="f-r-a-m-e-logo" method="post" action="">
                        <div class="log-in">
                            <img class="logo-icon" loading="eager" alt="" src="../images/LogoFull.png">
                            <h1 class="log-in1">Registrarse</h1>
                        </div>
                        <div class="input">
                            <div class="text-fieldoutlined">
                                <div class="input2">
                                    <div class="label-container">
                                        <div class="label1">Correo</div>
                                    </div>
                                    <input class="content1" placeholder="ejemplo@gmail.com" type="email" id = "email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                                </div>
                                <div class="helpertext1">
                                    <div class="helper-text1"></div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('email').addEventListener('change', function() {
                                var email = this.value;
                                var allowedDomains = ['gmail.com', 'hotmail.com', 'outlook.com'];
                                var domain = email.split('@')[1];
                                if (allowedDomains.indexOf(domain) === -1) {
                                    alert('Por favor, ingresa un correo con un dominio válido (gmail.com, hotmail.com, outlook.com).');
                                    this.value = ''; // Limpiar el campo de correo electrónico si el dominio no es válido
                                }
                                });
                            </script>

                            <div class="text-fieldoutlined">
                                <div class="input1">
                                    <div class="label-container">
                                        <div class="label">Nombre de usuario</div>
                                    </div>
                                    <input class="content" placeholder="Username" id = "username" type="text" name="name" required>
                                </div>
                                <div class="helpertext">
                                    <div class="helper-text"></div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('username').addEventListener('input', function() {
                                var invalidChars = /[^a-zA-Z0-9]/g;
                                if (this.value.match(invalidChars)) {
                                    this.setCustomValidity('El nombre de usuario solo puede contener letras y números.');
                                } else {
                                    this.setCustomValidity('');
                                }
                                });
                            </script>

                            <div class="text-fieldoutlined">
                                <div class="input3">
                                    <div class="label-container">
                                        <div class="label2">Edad</div>
                                    </div>
                                    <input class="content2" placeholder="Edad" type="number" name="edad" id="edad" min="12" max="84" required>
                                </div>
                                <div class="helpertext2" id="edadError">
                                    <div class="helper-text2"></div>
                                </div>
                            </div>

                            <script>
                                document.getElementById("edad").addEventListener("input", function() {
                                    var edadInput = parseInt(this.value);
                                    var edadError = document.getElementById("edadError");
                                    var edadField = document.getElementById("edad");

                                    if (isNaN(edadInput)) {
                                        edadField.setCustomValidity("");
                                    } else if (edadInput < 12) {
                                        edadField.setCustomValidity("Debe ser mayor de 12 años.");
                                    } else if (edadInput >= 85) {
                                        edadField.setCustomValidity("Debe ser menor de 85 años.");
                                    } else {
                                        edadField.setCustomValidity("");
                                    }
                                });
                            </script>

                            <div class="text-fieldoutlined">
                                <div class="input3">
                                    <div class="label-container">
                                        <div class="label2">Estado</div>
                                    </div>
                                    <!-- Wrap the select element inside this div -->
                                    <div class="container">
                                        <select class="content2" name="ciudad" required>
                                            <option value="">Selecciona tu Estado</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Ciudad de México">Ciudad de México</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="Michoacan">Michoacan</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Queretaro">Queretaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosi">San Luis Potosi</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="helpertext2">
                                    <div class="helper-text2"></div>
                                </div>
                            </div>

                            <div class="text-fieldoutlined">
                                <div class="input3">
                                    <div class="label-container">
                                        <div class="label2">Password</div>
                                    </div>
                                    <input class="content2" id="passwordField" placeholder="Password" type="password" name="password" required>
                                    <button type="button" id="togglePassword">Mostrar</button>
                                </div>
                                <div class="helpertext2">
                                    <div class="helper-text2"></div>
                                </div>
                            </div>
                            <script>
                                const passwordField = document.getElementById('passwordField');
                                const togglePasswordBtn = document.getElementById('togglePassword');
                                togglePasswordBtn.addEventListener('click', function() {
                                    passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                                    togglePasswordBtn.textContent = passwordField.type === 'password' ? 'Mostrar' : 'Ocultar';
                                });
                            </script>
                        </div>
                        <div class="Boton-Log-In">
                            <input class="fcc-btn" type="submit" name="register" value="Registrarme">
                        </div>
                        <div class="link">
                            <a href="../OlvideContra/OlvideContrasena.php" title="Olvidé la contraseña">Olvidé la contraseña</a>
                        </div>
                        <div class="link2">
                            <a href="../Login/LogIn.php" title="Ya tengo cuenta">Ya tengo cuenta</a>
                        </div>
                    </form>
                </div>
                <img class="pic-icon" loading="eager" alt="" src="../images\Bienvenido.jpg">
            </main>
        </div>
    </div>
    <?php
        include("registrar.php");
    ?>
    
</body>
</html>
