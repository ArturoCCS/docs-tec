<x-learn.php.wrapper :idActual="'introduction'" :secciones="$secciones" :carpeta="$carpeta">

    <div class="duel-card" style="--rarity: var(--legendary);">
        <div class="card-top">
            <span class="card-rarity" style="color: var(--legendary); border-color: var(--legendary);">Tutorial</span>
            <span class="card-art" style="border-color: var(--legendary);">🐘</span>
        </div>

        <h1 class="card-title">Bienvenido al reino de PHP</h1>
        <p class="card-sub">Antes de tu primer duelo, conoce las reglas del juego.</p>

        <div class="card-body">
            <p>PHP es el lenguaje que corre "detrás" de la página: procesa datos, decide qué mostrar y
                se comunica con formularios y bases de datos antes de que el HTML llegue al navegador.</p>
            <p>En este mazo vas a dominar, carta por carta: la sintaxis básica, variables, salida de datos,
                condicionales, operadores, <code>switch</code>, bucles, funciones y cómo recibir datos
                de un formulario.</p>
            <p>Cada nivel del mapa es una carta con contenido + un duelo (quiz). Gana el duelo para
                desbloquear el siguiente nivel. Tienes 3 vidas ❤️❤️❤️ — cada respuesta incorrecta cuesta una.</p>
        </div>
    </div>

    @php
        $keys = array_keys($secciones);
        $firstKey = count($keys) > 0 ? $keys[0] : null;
    @endphp

    <div class="card-nav">
        <a href="{{ route('curso.index', ['carpeta' => $carpeta]) }}" class="btn">← Mapa de niveles</a>
        @if ($firstKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $firstKey]) }}" class="btn btn-primary">
                Nivel 1 →
            </a>
        @endif
    </div>

</x-learn.wrapper>