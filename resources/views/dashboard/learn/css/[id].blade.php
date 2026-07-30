{{-- resources/views/dashboard/learn/css/[id].blade.php --}}
<x-learn.wrapper :secciones="$secciones" :idActual="$idActual" :carpeta="$carpeta">
    <div class="w-full space-y-6 pb-12">
        <div class="flex items-center gap-4">
            <span class="text-4xl bg-pink-300 border-4 border-black rounded-xl w-16 h-16 flex items-center justify-center rotate-3 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] shrink-0">
                {{ $seccion['icono'] ?? '📄' }}
            </span>
            <div>
                <span class="inline-block bg-cyan-300 border-2 border-black px-3 py-1 font-mono text-xs font-bold uppercase -rotate-1 mb-2">
                    Módulo {{ strtoupper($carpeta) }}
                    @if (!empty($seccion['badge']))
                        · {{ $seccion['badge'] }}
                    @endif
                </span>
                <h1 class="text-3xl font-black tracking-tight text-black">
                    {{ $seccion['titulo'] }}
                </h1>
            </div>
        </div>
        @if (!empty($seccion['mensaje']))
            <p class="text-base-content/70 font-medium text-lg">
                {{ $seccion['mensaje'] }}
            </p>
        @endif

        @if ($idActual === 'practica')
            @include('dashboard.learn.css.practica')
        @else
            <div class="bg-yellow-300 border-4 border-black rounded-2xl p-6 lg:p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
                <div class="prose max-w-none prose-headings:font-black prose-headings:text-black prose-p:text-black prose-p:font-medium prose-code:bg-black prose-code:text-yellow-300 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:before:content-none prose-code:after:content-none prose-strong:text-black prose-pre:bg-black prose-pre:text-lime-300">
                    {!! $seccion['contenido'] ?? '<p>No hay contenido disponible para esta sección.</p>' !!}
                </div>
            </div>
        @endif

    </div>

    @php
        $keys = array_keys($secciones);
        $currentIndex = array_search($idActual, $keys);
        $prevKey = $currentIndex !== false && $currentIndex > 0 ? $keys[$currentIndex - 1] : null;
        $nextKey = $currentIndex !== false && $currentIndex < count($keys) - 1 ? $keys[$currentIndex + 1] : null;
    @endphp

    <div class="flex justify-between items-center pt-8 mt-12 border-t-4 border-black">

        @if ($prevKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $prevKey]) }}"
                class="inline-flex items-center gap-2 bg-white text-black font-bold px-5 py-2.5 border-4 border-black rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                ← {{ $secciones[$prevKey]['titulo'] ?? $prevKey }}
            </a>
        @else
            <a href="{{ route('curso.intro', ['carpeta' => $carpeta]) }}"
                class="inline-flex items-center gap-2 bg-white text-black font-bold px-5 py-2.5 border-4 border-black rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                ← Introducción
            </a>
        @endif

        @if ($nextKey !== null)
            <a id="btn-siguiente"
               href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $nextKey]) }}"
               data-url="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $nextKey]) }}"
               class="inline-flex items-center gap-2 bg-black text-yellow-300 font-bold px-5 py-2.5 border-4 border-black rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                {{ $secciones[$nextKey]['titulo'] ?? $nextKey }} →
            </a>
        @else
            <a href="{{ route('curso.index', ['carpeta' => $carpeta]) }}"
                class="inline-flex items-center gap-2 bg-lime-400 text-black font-bold px-5 py-2.5 border-4 border-black rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                Ir al Índice →
            </a>
        @endif

    </div>
</x-learn.wrapper>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnSiguiente = document.getElementById('btn-siguiente');
        if (!btnSiguiente) return;

        btnSiguiente.addEventListener('click', function (e) {
            e.preventDefault();

            fetch('{{ route("completar.seccion") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    carpeta: '{{ $carpeta }}',
                    seccion_id: '{{ $idActual }}'
                })
            })
            .then(response => {
                if (!response.ok) throw new Error('HTTP ' + response.status);
                return response.json();
            })
            .then(data => {
                if (data.message) {
                    window.location.href = btnSiguiente.dataset.url;
                } else {
                    alert(data.error || 'Error al guardar el progreso.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error de conexión. Intenta de nuevo.');
            });
        });
    });
</script>