@props(['idActual', 'secciones', 'carpeta' => 'html'])

<x-layout>
    <div class="drawer lg:drawer-open bg-base-100 min-h-screen">
        <input id="main-drawer" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col p-6 lg:p-12 justify-between min-h-screen">

            <div>
                <div class="w-full flex justify-between items-center mb-8 border-b pb-4">
                    <label for="main-drawer" class="btn btn-square btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Curso</a></li>

                            @if (($idActual ?? '') === 'index')
                                <li class="font-bold text-primary uppercase">{{ $carpeta }}</li>
                            @else
                                <li>
                                    <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => 'index']) }}" class="uppercase">
                                        {{ $carpeta }}
                                    </a>
                                </li>
                                <li class="font-bold text-primary capitalize">{{ $idActual }}</li>
                            @endif
                        </ul>
                    </div>
                </div>

                {{ $slot }}
            </div>

        </div>

        <div class="drawer-side z-20">
            <label for="main-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4 gap-2 shadow-2xl">

                <li>
                    <input type="text" id="buscador-menu" placeholder="Buscar módulo..."
                        class="input input-bordered w-full input-sm mb-2" />
                </li>

                <li class="menu-title mt-4">Indice</li>

                <li class="menu-item-modulo" data-titulo="contenido introduccion">
                    <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => 'index']) }}"
                        class="{{ ($idActual ?? '') === 'index' ? 'active font-semibold' : '' }}">
                        <span
                            class="{{ ($idActual ?? '') === 'index' ? 'inline-block w-[2px] h-5 bg-primary rounded-full' : '' }}"></span>
                        Contenido
                    </a>
                </li>

                <li class="menu-title">Módulos</li>

                <li class="menu-item-modulo" data-titulo="introduccion">
                    <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => 'introduction']) }}"
                        class="{{ ($idActual ?? '') === 'introduction' ? 'active font-semibold' : '' }}">
                        <span
                            class="{{ ($idActual ?? '') === 'introduction' ? 'inline-block w-[2px] h-5 bg-primary rounded-full' : '' }}"></span>
                        Introduccion
                    </a>
                </li>

                {{-- @if ($carpeta === 'html')
                    <li class="menu-item-modulo" data-titulo="titulo">
                        <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => 'titulo']) }}"
                            class="{{ ($idActual ?? '') === 'titulo' ? 'active font-semibold' : '' }}">
                            <span class="{{ ($idActual ?? '') === 'titulo' ? 'inline-block w-[2px] h-5 bg-primary rounded-full' : '' }}"></span>
                            titulo
                        </a>
                    </li>
                @endif --}}

                @foreach ($secciones as $key => $data)
                    <li class="menu-item-modulo" data-titulo="{{ strtolower($data['titulo']) }}">
                        <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $key]) }}"
                            class="{{ ($idActual ?? '') === $key ? 'active font-semibold' : '' }}">
                            <span
                                class="{{ ($idActual ?? '') === $key ? 'inline-block w-[2px] h-5 bg-primary rounded-full' : '' }}"></span>
                            {{ $data['titulo'] }}
                        </a>
                    </li>
                @endforeach

                <li id="sin-resultados" class="hidden px-4 py-2 text-sm text-base-content/50 italic text-center">
                    No se encontró contenido relacionado 🕵️‍♂️
                </li>

            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buscador = document.getElementById('buscador-menu');
            const items = document.querySelectorAll('.menu-item-modulo');
            const mensajeVacio = document.getElementById('sin-resultados');

            if (buscador) {
                buscador.addEventListener('input', function(e) {
                    const textoBusqueda = e.target.value.toLowerCase().trim();
                    let matches = 0;

                    items.forEach(item => {
                        const titulo = item.getAttribute('data-titulo') || '';

                        if (titulo.includes(textoBusqueda)) {
                            item.style.display = '';
                            matches++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    if (matches === 0) {
                        mensajeVacio.classList.remove('hidden');
                    } else {
                        mensajeVacio.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-layout>