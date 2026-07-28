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

    <link rel="icon" type="image/png" href="https://lh3.googleusercontent.com/a/ACg8ocKkMg87b9TD4_HHaAPTkupTZUbHMbyEbnBoH_3UZ11K-NUpji4=s261-c-no">
    
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrambleTextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/blockly/blockly.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/Draggable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/Flip.min.js"></script>


    @vite(['resources/css/styles/learn.css'])

    <script>
        window.TemasData = {
            claros: @json(config('themes.claros')),
            oscuros: @json(config('themes.oscuros')),
        };

        const temasValidos = [...window.TemasData.claros, ...window.TemasData.oscuros];
        const temaGuardado = localStorage.getItem('theme-preference');

        document.documentElement.setAttribute(
            'data-theme',
            temasValidos.includes(temaGuardado) ? temaGuardado : 'light'
        );
    </script>
</head>
<body id="body" class="learn-body overflow-x-hidden">

    <x-loader />

    <div class="init opacity-0 transition-opacity duration-700" id="main-content">
        <main>
            {{ $slot }}

        <x-footer />
        </main>
    </div>
    <x-auth.modal />
</body>
</html>