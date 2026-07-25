<x-learn.wrapper :idActual="'introduction'" :secciones="$secciones">
    <div class="w-full space-y-6 pb-12">

        <div class="flex items-center gap-4">
            <span class="text-4xl">💻</span>
            <div>
                <span class="badge badge-primary mb-2">Módulo HTML</span>
                <h1 class="text-3xl font-extrabold tracking-tight text-base-content">
                    Introducción
                </h1>
            </div>
        </div>

        <div class="divider"></div>

        <div class="prose max-w-none bg-base-200/50 p-6 lg:p-8 rounded-2xl shadow-sm">
            <p>Bienvenido al curso de HTML. Aquí aprenderás los conceptos fundamentales para estructurar páginas web
                modernas...</p>
        </div>

    </div>

    @php
        $keys = array_keys($secciones);
        $firstKey = count($keys) > 0 ? $keys[0] : null;
    @endphp

    <div class="flex justify-between items-center pt-8 mt-12 border-t border-base-300">

        <a href="{{ route('html.index') }}" class="btn btn-outline btn-sm gap-2">
            ← Volver al Índice
        </a>

        @if ($firstKey !== null)
            <a href="{{ route('seccion.detalle', ['id' => $firstKey]) }}" class="btn btn-primary btn-sm gap-2">
                {{ ucfirst($firstKey) }} →
            </a>
        @endif

    </div>

</x-learn.wrapper>
