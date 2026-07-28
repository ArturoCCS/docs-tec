<x-learn.wrapper :secciones="$secciones" :idActual="$idActual" :carpeta="$carpeta">
    <div class="w-full space-y-6 pb-12">
        <div class="flex items-center gap-4">
            <span class="text-4xl">{{ $seccion['icono'] ?? '📄' }}</span>
            <div>
                <span class="badge badge-primary mb-2">Módulo {{ strtoupper($carpeta) }}</span>
                <h1 class="text-3xl font-extrabold tracking-tight text-base-content">
                    {{ $seccion['titulo'] }}
                </h1>
            </div>
        </div>

        <div class="divider"></div>

        <div class="prose max-w-none bg-base-200/50 p-6 lg:p-8 rounded-2xl shadow-sm">
            {!! $seccion['contenido'] ?? '<p>No hay contenido disponible para esta sección.</p>' !!}
        </div>
        
        <x-learn.quiz :preguntas="$seccion['quiz'] ?? []" />

    </div>

    @php
        $keys = array_keys($secciones);
        $currentIndex = array_search($idActual, $keys);
        $prevKey = $currentIndex !== false && $currentIndex > 0 ? $keys[$currentIndex - 1] : null;
        $nextKey = $currentIndex !== false && $currentIndex < count($keys) - 1 ? $keys[$currentIndex + 1] : null;
    @endphp

    <div class="flex justify-between items-center pt-8 mt-12 border-t border-base-300">
        @if ($prevKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $prevKey]) }}" class="btn btn-outline btn-sm gap-2">
                ← {{ $prevKey }}
            </a>
        @else
            <a href="{{ route('curso.intro', ['carpeta' => $carpeta]) }}" class="btn btn-outline btn-sm gap-2">
                ← introduccion
            </a>
        @endif

        @if ($nextKey !== null)
            <button id="btn-siguiente" class="btn btn-primary btn-sm gap-2" 
                    data-url="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $nextKey]) }}">
                {{ $nextKey }} →
            </button>
        @else
            <a href="{{ route('curso.index', ['carpeta' => $carpeta]) }}" class="btn btn-success btn-sm gap-2">
                Ir al Índice →
            </a>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('btn-siguiente');
            if (!btn) return;

            const quizContainer = document.querySelector('.quiz-container');

            btn.addEventListener('click', function(e) {
                e.preventDefault();

                if (!quizContainer) {
                    window.location.href = this.dataset.url;
                    return;
                }

                if (typeof quizContainer.isComplete === 'function' && quizContainer.isComplete()) {
                    const carpeta = '{{ $carpeta }}';
                    const seccionId = '{{ $idActual }}';

                    fetch('{{ route("completar.seccion") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            carpeta: carpeta,
                            seccion_id: seccionId
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('HTTP ' + response.status + ': ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.message) {
                            window.location.href = btn.dataset.url;
                        } else {
                            alert(data.error || 'Error al guardar el progreso.');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        alert('Error de conexión: ' + error.message + '. Revisa la consola para más detalles.');
                    });
                } else {
                    alert('⚠️ Debes responder correctamente todas las preguntas del cuestionario antes de avanzar.');
                }
            });
        });
    </script>
</x-learn.wrapper>