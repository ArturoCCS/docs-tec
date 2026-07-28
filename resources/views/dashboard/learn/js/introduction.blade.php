<x-learn.wrapper :idActual="'introduction'" :secciones="$secciones"  :carpeta="$carpeta">
    <div class="w-full space-y-6 pb-12">

        <div class="flex items-center gap-4">
            <span class="text-4xl">💻</span>
            <div>
                <span class="badge badge-primary mb-2">Módulo {{ strtoupper($carpeta) }}</span>
                <h1 class="text-3xl font-extrabold tracking-tight text-base-content">
                    Introducción
                </h1>
            </div>
        </div>

        <div class="divider"></div>

        <div class="prose max-w-none bg-base-200/50 p-6 lg:p-8 rounded-2xl shadow-sm">
            <p>Bienvenido al módulo de JavaScript. A lo largo de este recorrido, dominarás los fundamentos del lenguaje que da vida a la web.</p>
            <p>En este curso aprenderás:</p>
            <ul>
                <li><strong>Variables y constantes</strong> – var, let y const, alcance y hoisting.</li>
                <li><strong>Operadores aritméticos</strong> – suma, resta, multiplicación, módulo y exponente.</li>
                <li><strong>Condicionales</strong> – if, else, operador ternario y switch.</li>
                <li><strong>Bucles</strong> – for, while y do while.</li>
                <li><strong>Funciones</strong> – declaración, expresión y arrow functions.</li>
                <li><strong>Manipulación del DOM</strong> – document.write y getElementById.</li>
            </ul>
            <p>Cada lección incluye ejemplos prácticos y un cuestionario final para poner a prueba tus conocimientos. Supera todas las pruebas y conviértete en un experto de JavaScript. ¡Comienza la aventura!</p>
        </div>

    </div>

    @php
        $keys = array_keys($secciones);
        $firstKey = count($keys) > 0 ? $keys[0] : null;
    @endphp

    <div class="flex justify-between items-center pt-8 mt-12 border-t border-base-300">

        <a href="{{ route('curso.index', ['carpeta' => $carpeta]) }}" class="btn btn-outline btn-sm gap-2">
            ← Volver al Índice
        </a>

        @if ($firstKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $firstKey]) }}" class="btn btn-primary btn-sm gap-2">
                {{ ucfirst($firstKey) }} →
            </a>
        @endif

    </div>

</x-learn.wrapper>
