<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso HTML</title>
    @vite(['resources/css/styles/estilos.css'])
    @vite(['resources/js/html/script.js'])
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
       
        .navbar-docstec {
            color: var(--texto);
        }
        .navbar-docstec .btn {
            color: var(--texto);
            background: var(--panel-claro);
            border: 1px solid var(--linea);
        }
        .navbar-docstec .btn:hover {
            border-color: var(--morado);
            background: var(--panel-claro);
        }
        .navbar-docstec .btn-primary {
            color: white;
            background: var(--morado);
            border: 0;
        }
        .navbar-docstec .btn-primary:hover {
            background: var(--morado-claro);
        }
        .navbar-docstec a.btn-ghost {
            color: var(--texto);
            background: transparent;
            border: 0;
        }
        .navbar-docstec .dropdown-content {
            color: var(--texto);
            background: var(--panel) !important;
            border: 1px solid var(--linea);
        }
        .navbar-docstec .menu li > a {
            color: var(--texto);
            border-radius: 8px;
        }
        .navbar-docstec .menu li > a:hover {
            background: linear-gradient(90deg, rgba(118, 92, 255, .30), rgba(118, 92, 255, .10));
        }
        .navbar-docstec .menu li > details > summary {
            color: var(--texto);
        }
        .navbar-docstec .menu li > details ul {
            background: var(--panel) !important;
            border: 1px solid var(--linea);
            border-radius: 8px;
        }
    </style>
</head>
<body>

<nav>
    <div id="encabezado-principal" class="navbar navbar-docstec">
        <div class="navbar-start">
            <button id="boton-menu" aria-label="Abrir menú de etiquetas">☰</button>

            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="-1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    @auth
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="/">Inicio</a></li>
                    @endauth
                    <li>
                        <a>Cursos</a>
                        <ul class="p-2">
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'html']) }}">HTML</a></li>
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'css']) }}">CSS</a></li>
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'js']) }}">JAVASCRIPT</a></li>
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'php']) }}">PHP</a></li>
                        </ul>
                    </li>

                    @can('view-admin')
                        <li><a href="/admin">Admin</a></li>
                    @endcan
                </ul>
            </div>
            <img src="https://lh3.googleusercontent.com/a/ACg8ocKkMg87b9TD4_HHaAPTkupTZUbHMbyEbnBoH_3UZ11K-NUpji4=s261-c-no"
                class="size-15 rounded-box" alt="Imagen de logo">

            <a href="/" class="btn btn-ghost text-xl">DocsTec</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                @auth
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @else
                    <li><a href="/">Inicio</a></li>
                @endauth
                <li>
                    <details>
                        <summary>Cursos</summary>
                        <ul class="p-2 bg-base-100 w-40 z-1">
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'html']) }}">HTML</a></li>
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'css']) }}">CSS</a></li>
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'js']) }}">JAVASCRIPT</a></li>
                            <li><a href="{{ route('curso.intro', ['carpeta' => 'php']) }}">PHP</a></li>
                        </ul>
                    </details>
                </li>
                @can('view-admin')
                    <li><a href="/admin">Admin</a></li>
                @endcan
            </ul>
        </div>

        <div class="navbar-end gap-10">
            <div id="estado-pagina">
                <span id="punto-estado"></span>
                Página interactiva
            </div>

            <div class="space-x-5">
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-log-in-icon lucide-log-in">
                                <path d="m10 17 5-5-5-5" />
                                <path d="M15 12H3" />
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            </svg>
                        </button>
                    </form>
                @else
                    <button class="btn btn-primary" onclick="auth_modal.showModal()">Sign In</button>
                @endauth

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        @if (session('abrir_login') || $errors->has('email') || $errors->has('password') || $errors->has('name'))
                            const modal = document.getElementById('auth_modal');
                            if (modal) {
                                modal.showModal();
                                @if ($errors->has('name'))
                                    cambiarA('register');
                                @endif
                            }
                        @endif
                    });
                </script>
            </div>
        </div>
    </div>
</nav>

<x-auth.modal />

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