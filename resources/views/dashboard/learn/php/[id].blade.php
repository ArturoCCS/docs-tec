<x-learn.php.wrapper :secciones="$secciones" :idActual="$idActual" :carpeta="$carpeta">

    @php
        $rarityVar = match ($seccion['rareza'] ?? 'comun') {
            'raro' => 'var(--rare)',
            'epico' => 'var(--epic)',
            'legendario' => 'var(--legendary)',
            default => 'var(--common)',
        };
    @endphp

    <div class="duel-card" style="--rarity: {{ $rarityVar }};">
        <div class="card-top">
            <span class="card-rarity">{{ ucfirst($seccion['rareza'] ?? 'Común') }}</span>
            <span class="card-art">{{ $seccion['icono'] ?? '🃏' }}</span>
        </div>

        <h1 class="card-title">{{ $seccion['titulo'] }}</h1>
        <p class="card-sub">{{ $seccion['mensaje'] ?? '' }}</p>

        <div class="card-body">
            {!! $seccion['contenido'] ?? '<p>No hay contenido disponible para esta carta.</p>' !!}
        </div>
    </div>

    <x-learn.duel
        :preguntas="$seccion['quiz'] ?? []"
        :carpeta="$carpeta"
        :seccionKey="$idActual"
        :bossNombre="$seccion['boss'] ?? 'Bug Jefe'"
    />

    @php
        $keys = array_keys($secciones);
        $currentIndex = array_search($idActual, $keys);
        $prevKey = $currentIndex !== false && $currentIndex > 0 ? $keys[$currentIndex - 1] : null;
        $nextKey = $currentIndex !== false && $currentIndex < count($keys) - 1 ? $keys[$currentIndex + 1] : null;
    @endphp

    <div class="card-nav">
        @if ($prevKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $prevKey]) }}" class="btn">← Carta anterior</a>
        @else
            <a href="{{ route('curso.intro', ['carpeta' => $carpeta]) }}" class="btn">← Introducción</a>
        @endif

        @if ($nextKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $nextKey]) }}" class="btn btn-primary">Siguiente carta →</a>
        @else
            <a href="{{ route('curso.index', ['carpeta' => $carpeta]) }}" class="btn btn-success">Ver mapa completo →</a>
        @endif
    </div>

</x-learn.wrapper>