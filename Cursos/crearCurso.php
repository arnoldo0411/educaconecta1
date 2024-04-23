<!DOCTYPE html>
<html>
<head>
    <!-- Sección de encabezado -->
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <!-- Enlaces a hojas de estilo externas -->
    <link rel="stylesheet" href="../css/globalCrearCurso.css" />
    <link rel="stylesheet" href="../css/indexCrearCurso.css" />

    <!-- Enlaces a fuentes externas desde Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@700&display=swap" />
</head>
<body>
<!-- Contenedor principal -->
<div class="basic-informations">
    <!-- Sección de información básica -->
    <section class="frame-group1">
        <!-- Encabezado con pasos y botones de navegación -->
        <header class="steps">
            <!-- Primer paso -->
            <div class="steps1">
                <div class="contents">
                    <img
                            class="stack-icon"
                            loading="lazy"
                            alt=""
                            src="../public/stack.svg"
                    />

                    <div class="clipboard-text-frame">
                        <div class="label16">Crea Cursos</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Título y botones de guardar -->
        <div class="heading">
            <h3 class="informacin-basica">CREACION DE CURSO!</h3>
            <div class="tns">
        </div>
        </div>
    </section>

    <!-- Pie de página con etiquetas de titulo del curso-->
    <footer class="course-category-label">
        <form id="cursoForm" action="controladorCrear.php" method="POST" enctype="multipart/form-data">
            <div class="input-field">



                <div class="input-field1">
                    <div class="labal">Titulo</div>
                    <div class="input-field2">
                        <input
                                name="titulo"
                                class="contents-child"
                                placeholder="Titulo del curso"
                                type="text"
                                required
                                pattern=".*[a-zA-Z0-9].*"  
                                title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." 
                        />
                        <div class="input-label-field">0/80</div>
                    </div>
                </div>

                <div class="categoria-del-curso">Categoria del curso</div>
                <div class="paste-button">
                    <select name="categoria" class="select2" required>
                        <option value="">Seleccionar</option>
                        <option value="Matematicas">Matemáticas</option>
                        <option value="Español">Español</option>
                        <option value="Ciencias">Ciencias</option>
                    </select>
                </div>

                <div class="categoria-del-curso">Lenguaje del curso
                    <div class="paste-button">
                        <select name="lenguaje" class="select2" required>
                            <option value="">Seleccionar</option>
                            <option value="Ingles">Ingles</option>
                            <option value="Latin">Latin</option>
                            <option value="Catalan">Catalan</option>
                        </select>
                    </div>
                </div>

                <div class="labal2">Duracion del curso</div>
                <div class="paste-button">
                    <select name="duracion" class="select2" required>
                        <option value="">Seleccionar</option>
                        <option value="1 semana(s)">1 semana(s)</option>
                        <option value="2 semana(s)">2 semana(s)</option>
                        <option value="3 semana(s)">3 semana(s)</option>
                    </select>
                </div>

                <!-- Pie de página con etiquetas de subtitulo del curso-->
                <div class="input-field3">
                    <div class="labal1">Descripción</div>
                    <div class="input-field4">
                        <input
                                name="descripcion"
                                class="contents-child"
                                placeholder="Descripcion de tu curso"
                                type="text"
                                required
                                pattern=".*[a-zA-Z0-9].*"  
                                title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." 
                        />
                        <div class="div7">0/120</div>
                    </div>
                </div>

                <div class="input-field3">
                    <div class="labal1">Contraseña del curso</div>
                    <div class="input-field4">
                        <input
                                name="nombreCreador"
                                class="contents-child"
                                placeholder="Contraseña Curso"
                                type="text"
                                required
                                pattern=".*[a-zA-Z0-9].*"  
                                title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." 
                        />
                        <div class="div7">0/25</div>
                    </div>
                </div>

                <div class="input-field6">
                    <div class="label3">PDF del curso</div>
                    <div class="input-field7">
                        <input
                                name="pdf"
                                class="contents-child"
                                type="file"
                                accept=".pdf"
                                required
                        />
                    </div>
                </div>

                <div class="input-field3">
                    <div class="labal1">Actividad 1</div>
                    <div class="input-field4">
                        <input
                                name="actividad1"
                                class="contents-child"
                                placeholder="Actividades de tu curso"
                                type="text"
                                required
                                pattern=".*[a-zA-Z0-9].*"  
                                title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." 
                        />
                        <div class="div7">0/800</div>
                    </div>
                </div>

                <div class="input-field3">
                    <div class="labal1">Actividad 2</div>
                    <div class="input-field4">
                        <input
                                name="actividad2"
                                class="contents-child"
                                placeholder="Actividades de tu curso"
                                type="text"
                                required
                                pattern=".*[a-zA-Z0-9].*"  
                                title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." 
                        />
                        <div class="div7">0/800</div>
                    </div>
                </div>

                <div class="input-field3">
                    <div class="labal1">Actividad 3</div>
                    <div class="input-field4">
                        <input
                                name="actividad3"
                                class="contents-child"
                                placeholder="Actividades de tu curso"
                                type="text"
                                required
                                pattern=".*[a-zA-Z0-9].*"  
                                title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." 
                        />
                        <div class="div7">0/800</div>
                    </div>
                </div>

                <div class="input-field3">
                    <div class="labal1">Pregunta 1</div>
                    <div class="input-field4">
                        <!-- Campos para las preguntas del quiz -->
                        <input type="text" name="pregunta1" placeholder="Pregunta 1" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta1_1" placeholder="Respuesta 1" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta1_2" placeholder="Respuesta 2" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta1_3" placeholder="Respuesta 3" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="correcta1" placeholder="Respuesta Correcta" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />                       
                    </div>
                </div>
                
                <div class="input-field3">
                    <div class="labal1">Pregunta 2</div>
                    <div class="input-field4">
                       
                        <input type="text" name="pregunta2" placeholder="Pregunta 2" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta2_1" placeholder="Respuesta 1" requiredpattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta2_2" placeholder="Respuesta 2" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta2_3" placeholder="Respuesta 3" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="correcta2" placeholder="Respuesta Correcta" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                    </div>
                </div>     

                <div class="input-field3">
                    <div class="labal1">Pregunta 3</div>
                    <div class="input-field4">
                        
                        <input type="text" name="pregunta3" placeholder="Pregunta 3" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta3_1" placeholder="Respuesta 1" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta3_2" placeholder="Respuesta 2" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta3_3" placeholder="Respuesta 3" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="correcta3" placeholder="Respuesta Correcta" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                    </div>
                </div>
                
                <div class="input-field3">
                    <div class="labal1">Pregunta 4</div>
                    <div class="input-field4">
             
                        <input type="text" name="pregunta4" placeholder="Pregunta 4" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta4_1" placeholder="Respuesta 1" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta4_2" placeholder="Respuesta 2" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="respuesta4_3" placeholder="Respuesta 3" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                        <input type="text" name="correcta4" placeholder="Respuesta Correcta" required
                        pattern=".*[a-zA-Z0-9].*"  
                        title="Por favor, introduce un valor válido. Debe contener al menos una letra o número." />
                    </div>
                </div>     
            </div>
            <div class="buttons">
                    <button class="button5" type="submit" form="cursoForm" title="Guardar">Guardar Curso</button>
                </div>
        </div>
        </form>
    </footer>
</div>
<script src="script.js"></script>
</body>
</html>
