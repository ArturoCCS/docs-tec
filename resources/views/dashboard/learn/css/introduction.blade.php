<x-learn.wrapper :idActual="'introduction'" :secciones="$secciones" :carpeta="$carpeta">
    <div class="w-full space-y-8 pb-12">
        <div class="flex items-center gap-4">
            <span class="text-4xl bg-pink-300 border-4 border-black rounded-xl w-16 h-16 flex items-center justify-center rotate-3 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                🎨
            </span>
            <div>
                <span class="inline-block bg-cyan-300 border-2 border-black px-3 py-1 font-mono text-xs font-bold uppercase -rotate-1 mb-2">
                    Módulo {{ strtoupper($carpeta) }}
                </span>
                <h1 class="text-3xl lg:text-4xl font-black tracking-tight text-black">
                    Introducción
                </h1>
            </div>
        </div>
        <div class="bg-yellow-300 border-4 border-black rounded-2xl p-6 lg:p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
            <p class="text-black font-medium leading-relaxed mb-4">
                Bienvenido al curso de <strong>CSS</strong>. Aquí aprenderás a darle apariencia y vida a tus páginas
                web: colores, tipografía, espaciados, animaciones y la posición de cada elemento en pantalla.
            </p>
            <p class="text-black font-medium leading-relaxed">
                Mientras que HTML define el contenido y la estructura, CSS decide <strong>cómo se ve todo eso</strong>.
                Se le llama "en cascada" porque los estilos se aplican siguiendo un orden de prioridad: reglas más
                específicas o declaradas después pueden sobrescribir a otras.
            </p>
        </div>
        <div class="bg-orange-300 border-4 border-black rounded-2xl p-6 lg:p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
            <h2 class="text-xl font-black mb-4 text-black">🧩 Formas de aplicar CSS</h2>

            <p class="text-black font-medium leading-relaxed mb-5"> Antes de entrar a las categorías específicas (Fuente, Fondo, Bordes...), es importante saber que existen dos formas principales de aplicar estilos a tu página: </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white border-4 border-black rounded-xl p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <span class="inline-block bg-cyan-300 border-2 border-black px-2 py-0.5 font-mono text-xs font-bold mb-3">
                        css_style
                    </span>
                    <h3 class="font-black text-black mb-2">Estilo con selector</h3>
                    <p class="text-sm text-black/80 font-medium mb-4"> Defines una regla que afecta a todos los elementos que coincidan con un selector (clase, ID, etiqueta). Es la forma más usada y organizada, porque separa el diseño del contenido.</p>
                    <pre class="bg-black text-cyan-300 font-mono text-xs p-3 rounded-lg overflow-x-auto"><code>.tarjeta {
  background-color: white;
  border-radius: 12px;
}</code></pre>
                </div>

                <div class="bg-white border-4 border-black rounded-xl p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <span class="inline-block bg-pink-300 border-2 border-black px-2 py-0.5 font-mono text-xs font-bold mb-3">
                        css_inline_style
                    </span>
                    <h3 class="font-black text-black mb-2">Estilo en línea</h3>
                    <p class="text-sm text-black/80 font-medium mb-4">
                        Aplicas el estilo directamente sobre un elemento específico, sin necesidad de un
                        selector. Útil para pruebas puntuales, pero se recomienda usarlo poco: mezcla
                        contenido y diseño, y es más difícil de mantener.
                    </p>
                    <pre class="bg-black text-pink-300 font-mono text-xs p-3 rounded-lg overflow-x-auto"><code>&lt;div style="
  background-color: white;
  border-radius: 12px;
"&gt;
  Tarjeta
&lt;/div&gt;</code></pre>
                </div>
            </div>

            <p class="text-black font-medium leading-relaxed mt-5">En el editor de bloques encontrarás ambos en la categoría <strong>Estilos</strong>. A lo largo de este curso usarás sobre todo el estilo con selector, combinándolo con las categorías que a continuación. </p>
        </div>

        <div class="bg-lime-300 border-4 border-black rounded-2xl p-6 lg:p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
            <h2 class="text-xl font-black mb-1 text-black">Pruébalo tú mismo</h2>
            <p class="text-sm text-black/70 font-medium mb-6">Haz clic en los controles y observa cómo cambian las propiedades CSS de la caja en tiempo real. </p>
            <div class="flex flex-col lg:flex-row gap-8 items-center">
                <div class="flex-shrink-0">
                    <div id="demo-box" class="w-40 h-40 bg-cyan-400 border-4 border-black transition-all duration-300 flex items-center justify-center text-black font-mono font-bold text-xs text-center p-2">.caja { }</div>
                </div>
                <div class="flex-1 w-full space-y-5">

                    <div>
                        <p class="text-sm font-black mb-2 text-black">background-color</p>
                        <div class="flex gap-2">
                            <button type="button" onclick="setDemoColor('bg-cyan-400')" class="w-9 h-9 rounded-full bg-cyan-400 border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all"></button>
                            <button type="button" onclick="setDemoColor('bg-pink-400')" class="w-9 h-9 rounded-full bg-pink-400 border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all"></button>
                            <button type="button" onclick="setDemoColor('bg-lime-400')" class="w-9 h-9 rounded-full bg-lime-400 border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all"></button>
                            <button type="button" onclick="setDemoColor('bg-orange-400')" class="w-9 h-9 rounded-full bg-orange-400 border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all"></button>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-black mb-2 text-black">border-radius</p>
                        <div class="flex gap-2">
                            <button type="button" onclick="setDemoRadius('rounded-none')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">0</button>
                            <button type="button" onclick="setDemoRadius('rounded-lg')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">lg</button>
                            <button type="button" onclick="setDemoRadius('rounded-3xl')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">3xl</button>
                            <button type="button" onclick="setDemoRadius('rounded-full')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">full</button>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-black mb-2 text-black">box-shadow</p>
                        <div class="flex gap-2">
                            <button type="button" onclick="setDemoShadow('shadow-none')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">Ninguna</button>
                            <button type="button" onclick="setDemoShadow('shadow-md')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">Media</button>
                            <button type="button" onclick="setDemoShadow('shadow-2xl')" class="bg-white border-2 border-black px-3 py-1.5 font-mono text-xs font-bold shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-0.5 hover:shadow-none transition-all">Grande</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-black mb-1 text-base-content">Lo que verás en este curso</h2>
            <p class="text-sm text-base-content/60 mb-4">
                {{ count($secciones) }} módulos te esperan, desde lo básico hasta técnicas avanzadas.
            </p>
            <div class="flex flex-wrap gap-3">
                @foreach ($secciones as $key => $data)
                    @php
                        $chipColors = ['bg-cyan-300', 'bg-pink-300', 'bg-lime-300', 'bg-orange-300', 'bg-violet-300'];
                        $chip = $chipColors[$loop->index % 5];
                    @endphp
                    <span class="{{ $chip }} border-2 border-black px-3 py-1.5 rounded-full text-sm font-bold text-black flex items-center gap-1.5">
                        {{ $data['icono'] ?? '📄' }} {{ $data['titulo'] }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Navegación (tu misma lógica original) --}}
    @php
        $keys = array_keys($secciones);
        $firstKey = count($keys) > 0 ? $keys[0] : null;
    @endphp

    <div class="flex justify-between items-center pt-8 mt-12 border-t-4 border-black">
        <a href="{{ route('curso.index', ['carpeta' => $carpeta]) }}"
            class="inline-flex items-center gap-2 bg-white text-black font-bold px-5 py-2.5 border-4 border-black rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
            ← Volver al Índice
        </a>
        @if ($firstKey !== null)
            <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => $firstKey]) }}"
                class="inline-flex items-center gap-2 bg-black text-yellow-300 font-bold px-5 py-2.5 border-4 border-black rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                {{ ucfirst($firstKey) }} →
            </a>
        @endif
    </div>

    <script>
        const demoBox = document.getElementById('demo-box');

        function setDemoColor(newClass) {
            demoBox.classList.remove('bg-cyan-400', 'bg-pink-400', 'bg-lime-400', 'bg-orange-400');
            demoBox.classList.add(newClass);
        }

        function setDemoRadius(newClass) {
            demoBox.classList.remove('rounded-none', 'rounded-lg', 'rounded-3xl', 'rounded-full');
            demoBox.classList.add(newClass);
        }

        function setDemoShadow(newClass) {
            demoBox.classList.remove('shadow-none', 'shadow-md', 'shadow-2xl');
            demoBox.classList.add(newClass);
        }
    </script>

</x-learn.wrapper>