<x-learn.php.wrapper :idActual="'index'" :secciones="$secciones" :carpeta="$carpeta">
    <div class="duel-card" style="--rarity: var(--accent); margin-bottom: 1rem;">
        <span class="card-rarity">Mazo · {{ strtoupper($carpeta) }}</span>
        <h1 class="card-title">Tu mazo de PHP</h1>
        <p class="card-sub">
            9 cartas te esperan en el tablero. Derrota al jefe de cada nivel para desbloquear
            la siguiente carta y sumar XP.
        </p>
        <a href="{{ route('curso.intro', ['carpeta' => $carpeta]) }}" class="btn btn-primary">Empezar aventura →</a>
    </div>

    <div class="level-map" id="level-map">
        @php $i = 0; @endphp
        @foreach ($secciones as $key => $data)
            @php $i++; @endphp
            <div class="level-node-row {{ $i % 2 === 1 ? 'left' : 'right' }}">
                <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $key]) }}"
                   class="level-node" data-key="{{ $key }}" data-index="{{ $i }}">
                    <span class="badge-circle">{{ $data['icono'] ?? '🃏' }}</span>
                    <span class="lvl-num">Nivel {{ $i }}</span>
                    <span class="lvl-label">{{ $data['titulo'] }}</span>
                </a>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carpeta = "{{ $carpeta }}";
            const done = new Set(JSON.parse(localStorage.getItem(`learn-progress-${carpeta}`) || '[]'));
            const nodes = document.querySelectorAll('#level-map .level-node');

            nodes.forEach((node, i) => {
                const key = node.dataset.key;
                if (done.has(key)) {
                    node.classList.add('done');
                } else if (i === 0 || done.has(nodes[i - 1].dataset.key)) {
                    node.classList.add('active');
                } else {
                    node.classList.add('locked');
                }
            });
        });
    </script>

</x-learn.php.wrapper >