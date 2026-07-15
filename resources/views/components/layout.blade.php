@props([
    'title' => 'Docs Tec',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://unpkg.com/blockly/blockly.min.js"></script>
</head>

<body class="init">

    <x-nav></x-nav>
    
    <main>
        {{ $slot }}
    </main>
</body>

</html>