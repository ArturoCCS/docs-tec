<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TextoLab HTML</title>

    @vite(['resources/css/styles/estilos.css'])

    @vite(['resources/js/html/script.js'])
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

</head>
<body>

<header id="encabezado-principal">
    <button id="boton-menu">☰</button>

    <a id="marca-principal" href="#">
        <span id="logotipo-html">&lt;/&gt;</span>
        <span id="texto-marca">
            <strong>TextoLab HTML</strong>
            <small>Guía educativa de etiquetas</small>
        </span>
    </a>

    <div id="estado-pagina">
        <span id="punto-estado"></span>
        Página interactiva
    </div>
</header>

<aside id="menu-lateral">
    <div id="encabezado-menu">
        <h2>Etiquetas HTML</h2>
        <p>Selecciona una sección para mostrar sus etiquetas.</p>
    </div>

    <div id="contenedor-buscador">
        <label for="buscador-etiquetas">Buscar etiqueta</label>
        <input id="buscador-etiquetas" type="search" placeholder="Ejemplo: strong, img, table">
    </div>

    <nav id="navegacion-secciones"></nav>
</aside>

<main id="contenido-principal">
    <section id="cabecera-contenido">
        <div>
            <span id="subtitulo-seccion">SECCIÓN ACTUAL</span>
            <h1 id="titulo-seccion">Estructura principal</h1>
            <p id="descripcion-seccion"></p>
        </div>
        <span id="cantidad-seccion"></span>
    </section>

    <section id="contenedor-tarjetas"></section>

    <section id="zona-practica">
        <div id="encabezado-practica">
            <div>
                <span id="etiqueta-practica">PRÁCTICA DE LA SECCIÓN</span>
                <h2 id="titulo-practica">Examen de práctica</h2>
                <p id="descripcion-practica">
                    Responde 10 preguntas para comprobar lo que aprendiste.
                </p>
            </div>
            <div id="estado-practica">Pendiente</div>
        </div>

        <button id="boton-iniciar-practica">Iniciar práctica de 10 preguntas</button>

        <form id="formulario-practica" class="oculto">
            <div id="lista-preguntas"></div>

            <div id="acciones-practica">
                <button id="boton-finalizar-practica" type="submit">Finalizar práctica</button>
                <button id="boton-reiniciar-practica" type="button">Reiniciar</button>
            </div>
        </form>

        <div id="resultado-practica" class="oculto">
            <div id="icono-terminada">✓</div>
            <h3>Tarea terminada</h3>
            <p id="calificacion-practica"></p>
            <button id="boton-repetir-practica">Volver a realizar</button>
        </div>
    </section>

</main>

<div id="fondo-menu"></div>

</body>
</html>
