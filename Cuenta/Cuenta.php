<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <title>Ajustes de la cuenta</title>
    <link rel="stylesheet" href="../css/indexGlobalCuenta.css">
    <link rel="stylesheet" href="../css/indexCuenta.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Agency+FB:wght@700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap">
    <link rel="popUp" href="popUp.js">
    <style>
        body {
            background-color: #6553b3;
            color: black;
            font-family: 'Poppins', sans-serif;
        }
        a {
            color: white;
            text-decoration: none;
        }
        .sidebar-row-115 a,
        .sidebar-row-116 a,
        .sidebar-row-119 a,
        .unstyled-button .buttoncontained4 {
            background-color: #6553b3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .sidebar-row-115 a:hover,
        .sidebar-row-116 a:hover,
        .sidebar-row-119 a:hover,
        .unstyled-button .buttoncontained4:hover {
            background-color: #543f9e; /* Darker shade when hovered */
        }
    </style>
</head>

<body>
    <div class="frame-container">
        <section class="account-1acc1">
            <div class="pp3">
                <img class="" loading="eager" alt="">
                <div class="list3">
                    <div class="sidebar-row-115">
                        <div class="sidebar-icon-blue15">
                            <div class="icon33">
                                <img class="imgicon30" alt="" src="../public/imgicon.svg">
                            </div>
                        </div>
                        <div class="sidebar-icon-gray15">
                            <div class="icon34">
                                <img class="imgicon31" loading="eager" alt="" src="../public/imgicon1.svg">
                            </div>
                        </div>
                        <a href="../Index/Index.php" class="text-node">Inicio</a>
                    </div>
                    <div class="sidebar-row-116">
                        <div class="sidebar-icon-blue16">
                            <div class="icon35">
                                <img class="imgicon32" alt="" src="../public/imgicon.svg">
                            </div>
                        </div>
                        <div class="sidebar-icon-gray16">
                            <div class="icon36">
                                <img class="imgicon33" loading="eager" alt="" src="../public/imgicon1.svg">
                            </div>
                        </div>
                        <a href="cambiarContrasena.php" class="text24" onclick="popupWindow2(this.href, 'Popup', 500, 400); return false;">Cambiar contraseña</a>
                    </div>
                    <div class="sidebar-row-118">
                        <div class="sidebar-icon-gray18">
                            <div class="icon40">
                                <img class="imgicon37" alt="" src="../public/imgicon1.svg">
                            </div>
                        </div>
                        <div class="text26">Dashboard</div>
                    </div>
                    <div class="sidebar-row-119">
                        <div class="sidebar-icon-blue19">
                            <div class="icon41">
                                <img class="imgicon38" alt="" src="../public/imgicon.svg">
                            </div>
                        </div>
                        <div class="sidebar-icon-gray19">
                            <div class="icon42">
                                <img class="imgicon39" loading="eager" alt="" src="../public/imgicon1.svg">
                            </div>
                        </div>
                        <a href="eliminarCuenta.php" class="text24" onclick="popupWindow2(this.href, 'Popup', 500, 400); return false;">Eliminar cuenta</a>
                    </div>
                </div>
            </div>
            <div class="form3">
                <div class="text28">
                    <h1 class="ajustes-de-la3">Ajustes de la cuenta</h1>
                </div>
                <form method="POST" action="controladorUSCorreo.php">
                    <div class="text-field-standard">
                        <div class="row13">
                            <div class="text-fieldstandard13">
                                <div class="input13">
                                    <div class="label13">Nuevo Nombre Usuario</div>
                                    <input class="content14" placeholder="Nuevo Usuario" type="text" name="username" required>
                                    <img class="underline-icon13" alt="" src="../public/underline.svg">
                                </div>
                                <div class="helpertext13">
                                    <div class="helper-text13"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row23">
                            <div class="text-fieldstandard15">
                                <div class="input15">
                                    <div class="label15">Nuevo Correo</div>
                                    <input class="content16" placeholder="Nuevo Correo" type="email" name="email" required>
                                    <img class="underline-icon15" alt="" src="../public/underline.svg">
                                </div>
                                <div class="helpertext15">
                                    <div class="helper-text15"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row23">
                            <div class="text-fieldstandard15">
                                <div class="input15">
                                    <div class="label15">Contraseña Actual</div>
                                    <input class="content16" placeholder="Contraseña" type="password" name="password" required>
                                    <img class="underline-icon15" alt="" src="../public/underline.svg">
                                </div>
                                <div class="helpertext15">
                                    <div class="helper-text15"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="unstyled-button">
                        <button class="buttoncontained4" type="submit">
                            <div class="unstyledbutton4">
                                <div class="button4">Guardar</div>
                            </div>
                        </button>
                    </div>
                    </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>
<script>popUp.js</script>
</html>
