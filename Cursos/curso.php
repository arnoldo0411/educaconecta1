<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../css/globalCurso.css" />
    <link rel="stylesheet" href="../css/indexCurso.css" />
    <link rel="stylesheet" href="../css/globalIndex.css" />
    <link rel="stylesheet" href="../css/indexIndex.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open Sans:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&display=swap"
    />
</head>
<body>
    <div class="desktop-2">
        <!--<button class="boton-inicio" onclick="window.location.href='../Index/Index.php'">Inicio</button>-->
        <a href = "../Index/Index.php"><img class="e" src = "../Images/LogoPNG.png"></a>
        <div class="search-button">
    <a href="#" onclick="buscarCurso()">
        <img class="search-3-1" alt="Buscar" src="../public/search-3-1.svg" />
    </a>
    <input
        id="searchInput"
        class="buscar"
        placeholder="Buscar curso por nombre..."
        type="text"
        maxlength="55"
        onkeypress="if (event.key === 'Enter') { buscarCurso(); }"
    />

    <!-- Script para manejar la búsqueda -->
    <script>
        function buscarCurso() {
            // Obtener el valor ingresado en la barra de búsqueda
            var nombreCurso = document.getElementById("searchInput").value.trim();
            
            if (nombreCurso) {
                // Realizar una solicitud AJAX para buscar el curso
                var xhr = new XMLHttpRequest();
                xhr.open(
                    "GET",
                    "buscarCurso.php?nombre=" + encodeURIComponent(nombreCurso),
                    true
                );
                xhr.setRequestHeader("Content-Type", "application/json");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var cursos = JSON.parse(xhr.responseText);

                        if (cursos.length > 0) {
                            // Limpiar el contenedor de cursos antes de mostrar los nuevos resultados
                            document.getElementById("curso-container").innerHTML = "";

                            // Mostrar los cursos obtenidos en el contenedor
                            cursos.forEach(function (curso) {
                                var cursoDiv = document.createElement("div");
                                cursoDiv.textContent = curso.NombreCurso;
                                cursoDiv.addEventListener("click", function () {
                                    mostrarContenidoCurso(curso.NombreCurso);
                                });
                                document.getElementById("curso-container").appendChild(cursoDiv);
                            });
                        } else {
                            // Si no se encontraron cursos, mostrar un mensaje y redirigir a curso.php
                            document.getElementById("curso-container").innerHTML = "No se encontraron cursos.";
                            alert("No se encontraron cursos.");
                            window.location.href = "curso.php"; 
                        }
                    }
                };

                xhr.send();
            } else {
                // Mostrar un mensaje de alerta si no se ingresó un nombre de curso
                alert("Por favor ingrese el nombre del curso.");
            }
        }
    </script>
</div>

    </div>


    <div class="desktop-2">
        <div class="curso-container" id="curso-container">
            <!-- Aquí se mostrarán los cursos filtrados -->
            <p>Consulta un curso</p>
        </div>
        <main id="curso-contenido">
            <!-- Contenido de los cursos se mostrará aquí -->
            <p>Aquí se mostrara el contenido del curso!</p>
        </main>
    </div>

    <script>
    function mostrarContenidoCurso(nombre_curso) {
        // Realizar una solicitud AJAX para obtener la descripción, la info y el PDF del curso
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'obtenerContenido.php?NombreCurso=' + encodeURIComponent(nombre_curso) + '&Descripcion=true&PDF=true&Activ1=true&Activ2=true&Activ3=true&pregunta1=true&respuesta1_1=true&respuesta1_2=true&respuesta1_3=true&correcta1=true&pregunta2=true&respuesta2_1=true&respuesta2_2=true&respuesta2_3=true&correcta2=true&pregunta3=true&respuesta3_1=true&respuesta3_2=true&respuesta3_3=true&correcta3=true&pregunta4=true&respuesta4_1=true&respuesta4_2=true&respuesta4_3=true&correcta4=true', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var respuesta = JSON.parse(xhr.responseText);
                var descripcion_curso = respuesta.descripcion_curso;
                var pdf_curso = respuesta.pdf_curso;
                var actividad_curso1 = respuesta.actividad_curso1;
                var actividad_curso2 = respuesta.actividad_curso2;
                var actividad_curso3 = respuesta.actividad_curso3;
                var pregunta1 = respuesta.pregunta1;
                var respuesta1_1 = respuesta.respuesta1_1;
                var respuesta1_2 = respuesta.respuesta1_2;
                var respuesta1_3 = respuesta.respuesta1_3;
                var correcta1 = respuesta.correcta1;
                var pregunta2 = respuesta.pregunta2;
                var respuesta2_1 = respuesta.respuesta2_1;
                var respuesta2_2 = respuesta.respuesta2_2;
                var respuesta2_3 = respuesta.respuesta2_3;
                var correcta2 = respuesta.correcta2;
                var pregunta3 = respuesta.pregunta3;
                var respuesta3_1 = respuesta.respuesta3_1;
                var respuesta3_2 = respuesta.respuesta3_2;
                var respuesta3_3 = respuesta.respuesta3_3;
                var correcta3 = respuesta.correcta3;
                var pregunta4 = respuesta.pregunta4;
                var respuesta4_1 = respuesta.respuesta4_1;
                var respuesta4_2 = respuesta.respuesta4_2;
                var respuesta4_3 = respuesta.respuesta4_3;
                var correcta4 = respuesta.correcta4;

                // Crear un elemento div para mostrar el nombre, la descripción, la info y el enlace al PDF del curso
                var cursoDiv = document.createElement('div');
                cursoDiv.innerHTML ='<h2>' + nombre_curso + '</h2><p>Descripción: ' + descripcion_curso + '</p><p>Actividad 1: ' + actividad_curso1 + '</p><p>Actividad 2: ' + actividad_curso2 + '</p><p>Actividad 3: ' + actividad_curso3 + '</p>';

                // Verificar si se proporcionó un enlace al PDF del curso y agregarlo al div si es así
                if (pdf_curso) {
                    var pdfLink = document.createElement('a');
                    pdfLink.setAttribute('href', pdf_curso);
                    pdfLink.setAttribute('target', '_blank');
                    pdfLink.textContent = 'Ver PDF del curso';
                    cursoDiv.appendChild(document.createElement('br')); // Agregar salto de línea antes del enlace
                    cursoDiv.appendChild(pdfLink);
                }

                // Agregar preguntas y respuestas al div del curso
                var quizDiv = document.createElement('div');
                quizDiv.innerHTML = '<h3>Quiz</h3>';
                quizDiv.style.display = 'none'; // Ocultar el quizDiv inicialmente

                // Botón para desplegar las preguntas
                var toggleBtn = document.createElement('button');
                toggleBtn.textContent = 'Realizar Quiz';
                toggleBtn.className = 'mostrar-preg';
                var preguntasVisibles = false;
                toggleBtn.addEventListener('click', function() {
                    if (preguntasVisibles) {
                        // Si las preguntas están visibles, las ocultamos
                        quizDiv.style.display = 'none';
                        enviarBtn.style.display = 'none'; // Ocultar el botón de enviar
                        toggleBtn.textContent = 'Realizar Quiz';
                        preguntasVisibles = false;
                    } else {
                        // Si las preguntas están ocultas, las mostramos
                        quizDiv.style.display = 'block';
                        enviarBtn.style.display = 'block'; // Mostrar el botón de enviar
                        toggleBtn.textContent = 'Ocultar Quiz';
                        preguntasVisibles = true;
                    }
                });
                cursoDiv.appendChild(toggleBtn);

                // Preguntas del quiz
                // Pregunta 1
                var pregunta1Div = document.createElement('div');
                pregunta1Div.innerHTML = '<p>' + pregunta1 + '</p>';
                pregunta1Div.innerHTML += '<label><input type="radio" name="respuesta1" value="' + respuesta1_1 + '">' + respuesta1_1 + '</label>';
                pregunta1Div.innerHTML += '<label><input type="radio" name="respuesta1" value="' + respuesta1_2 + '">' + respuesta1_2 + '</label>';
                pregunta1Div.innerHTML += '<label><input type="radio" name="respuesta1" value="' + respuesta1_3 + '">' + respuesta1_3 + '</label>';
                quizDiv.appendChild(pregunta1Div);

                // Pregunta 2
                var pregunta2Div = document.createElement('div');
                pregunta2Div.innerHTML = '<p>' + pregunta2 + '</p>';
                pregunta2Div.innerHTML += '<label><input type="radio" name="respuesta2" value="' + respuesta2_1 + '">' + respuesta2_1 + '</label>';
                pregunta2Div.innerHTML += '<label><input type="radio" name="respuesta2" value="' + respuesta2_2 + '">' + respuesta2_2 + '</label>';
                pregunta2Div.innerHTML += '<label><input type="radio" name="respuesta2" value="' + respuesta2_3 + '">' + respuesta2_3 + '</label>';
                quizDiv.appendChild(pregunta2Div);

                // Pregunta 3
                var pregunta3Div = document.createElement('div');
                pregunta3Div.innerHTML = '<p>' + pregunta3 + '</p>';
                pregunta3Div.innerHTML += '<label><input type="radio" name="respuesta3" value="' + respuesta3_1 + '">' + respuesta3_1 + '</label>';
                pregunta3Div.innerHTML += '<label><input type="radio" name="respuesta3" value="' + respuesta3_2 + '">' + respuesta3_2 + '</label>';
                pregunta3Div.innerHTML += '<label><input type="radio" name="respuesta3" value="' + respuesta3_3 + '">' + respuesta3_3 + '</label>';
                quizDiv.appendChild(pregunta3Div);

                // Pregunta 4
                var pregunta4Div = document.createElement('div');
                pregunta4Div.innerHTML = '<p>' + pregunta4 + '</p>';
                pregunta4Div.innerHTML += '<label><input type="radio" name="respuesta4" value="' + respuesta4_1 + '">' + respuesta4_1 + '</label>';
                pregunta4Div.innerHTML += '<label><input type="radio" name="respuesta4" value="' + respuesta4_2 + '">' + respuesta4_2 + '</label>';
                pregunta4Div.innerHTML += '<label><input type="radio" name="respuesta4" value="' + respuesta4_3 + '">' + respuesta4_3 + '</label>';
                quizDiv.appendChild(pregunta4Div);

                // Botón de enviar quiz
                var enviarBtn = document.createElement('button');
                enviarBtn.className = 'boton-enviar';
                enviarBtn.textContent = 'Enviar Quiz';
                enviarBtn.style.display = 'none'; // Ocultar el botón de enviar inicialmente
                enviarBtn.addEventListener('click', function() {
                    enviarRespuestas(nombre_curso);
                });
                quizDiv.appendChild(enviarBtn);

                // Agregar el div del quiz al cursoDiv
                cursoDiv.appendChild(quizDiv);

                // Agregar el botón de eliminar
                var eliminarBtn = document.createElement('button');
                eliminarBtn.textContent = 'Eliminar Curso';
                eliminarBtn.className = 'boton-eliminar';
                eliminarBtn.addEventListener('click', function() {
                    var nombreUsuario = prompt('Ingrese la contraseña del curso:');
                    if (nombreUsuario) {
                        eliminarCurso(nombre_curso, nombreUsuario);
                    }
                });
                cursoDiv.appendChild(eliminarBtn);

                // Insertar el div con el nombre, la descripción, la info, las actividades, el enlace al PDF y el quiz del curso delante del div "curso-contenido"
                document.getElementById('curso-contenido').innerHTML = '';
                document.getElementById('curso-contenido').appendChild(cursoDiv);
            }
        };
        xhr.send();
    }

    function enviarRespuestas(nombre_curso) {
        var respuestas = {
            nombre_curso: nombre_curso,
            respuestas: {
                respuesta1: document.querySelector('input[name="respuesta1"]:checked').value,
                respuesta2: document.querySelector('input[name="respuesta2"]:checked').value,
                respuesta3: document.querySelector('input[name="respuesta3"]:checked').value,
                respuesta4: document.querySelector('input[name="respuesta4"]:checked').value
            }
        };

        // Realizar una solicitud AJAX para enviar las respuestas al controlador
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'controladorQuiz.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText); // Mostrar la respuesta del servidor
            }
        };
        xhr.send(JSON.stringify(respuestas));
    }

    function eliminarCurso(nombre_curso, nombreUsuario) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'eliminarCurso.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText); // Mostrar la respuesta del servidor
                window.location.href = 'curso.php';
            }
        };
        xhr.send('nombre_usuario=' + encodeURIComponent(nombreUsuario) + '&nombre_curso=' + encodeURIComponent(nombre_curso));
    }
</script>

</body>
</html>
