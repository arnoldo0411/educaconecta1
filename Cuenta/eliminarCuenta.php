<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="../css/indexGlobalCuenta.css" />
    <link rel="stylesheet" href="../css/indexCambiarContraseña.css">
    <style>
        body {
            background-color: #6553b3;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        #box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: 50px auto;
            color: #333;
        }
        #myform-search h1 {
            color: #333;
        }
        #myform-search span {
            display: block;
            color: #777;
            font-size: 14px;
            margin-top: 5px;
        }
        .password {
            width: calc(100% - 40px); /* Adjust width to account for the button */
            padding: 5px; /* Reduced padding */
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px; /* Reduced font size */
            display: inline-block;
        }
        .show-password {
            width: 30px;
            height: 30px;
            background: #ddd;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
            font-size: 14px;
        }
        .password-container {
            display: flex;
            align-items: center;
        }
        .unstyledbutton4, .unstyledbutton5 {
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 14px;
        }
        .unstyledbutton5 {
            background-color: #e74c3c; /* Rojo */
        }
        .unstyledbutton4 {
            background-color: #6553b3; /* #6553b3 */
        }
        .unstyledbutton4:hover, .unstyledbutton5:hover {
            filter: brightness(0.9);
        }
        .button4, .button5 {
            color: white;
            text-decoration: none;
        }
        .button5 {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div id="box">
        <form id="myform-search" method="post" action="controladorEliminar.php" autocomplete="off">
            <h1>SEGURO QUE QUIERES ELIMINAR TU CUENTA? <span>Ingrese sus datos para confirmar</span></h1>

            <!-- Forms para Eliminar la cuenta -->
            <div>
                <p>
                    <input type="text" name="username" value="" placeholder="Nombre Usuario" id="p" class="password" required>
                </p>
                <p>
                    <div class="password-container">
                        <input type="password" name="password" value="" placeholder="contraseña" id="p-c" class="password" required>
                        <button type="button" class="show-password" onclick="togglePassword()">👁️</button>
                    </div>
                </p>
            </div>

            <!-- Regresar a la cuenta -->
            <div>
                <button type="button" class="unstyledbutton5">
                    <a href="Cuenta.php" class="button5">Regresar</a>
                </button>

                <!-- Confirmar para borrar la cuenta -->
                <button type="submit" class="unstyledbutton4">
                    <div class="button4">CONFIRMAR</div>
                </button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("p-c");
            var passwordFieldType = passwordField.type === "password" ? "text" : "password";
            passwordField.type = passwordFieldType;
        }
    </script>
</body>

</html>
