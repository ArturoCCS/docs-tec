@props([
    'title' => 'Docs Tec',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrambleTextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>

    <script src="https://unpkg.com/blockly/blockly.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/Draggable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/Flip.min.js"></script>

    <script>
        const temaGuardado = localStorage.getItem('theme-preference');
        if (temaGuardado) {
            document.documentElement.setAttribute('data-theme', temaGuardado);
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const componenteEspecial = document.getElementById('holaaa');
            const temaActual = document.documentElement.getAttribute('data-theme');

            function aplicarInversion(tema) {

                if (tema === 'light') {
                    componenteEspecial.setAttribute('data-theme', 'dark');
                } else {

                    componenteEspecial.setAttribute('data-theme', 'light');
                }
            }


            aplicarInversion(temaActual);
        });
    </script>
</head>

<body id="body">
    <div class="init bg-base-100">


        <x-nav />

        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </div>
</body>

</html>
