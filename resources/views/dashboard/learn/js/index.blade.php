<x-learn.wrapper :idActual="'index'" :secciones="$secciones" :carpeta="$carpeta">
    <div class="w-full space-y-8 pb-12">

        <div class="w-full bg-base-200 p-8 rounded-2xl shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
                <span class="badge badge-secondary badge-outline">Zona index</span>
            </div>

            <h1 class="text-4xl font-extrabold tracking-tight mb-4">Bienvenido al Curso de {{ strtoupper($carpeta) }}</h1>
            <p class="text-base-content/70 text-lg leading-relaxed mb-6">
                Aquí encontrarás todo el temario estructurado para dominar el desarrollo web desde las bases hasta
                conceptos avanzados. Selecciona un módulo o comienza por la introducción.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('curso.intro', ['carpeta' => $carpeta]) }}" class="btn btn-primary gap-2">
                    Comenzar Introducción →
                </a>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-4 text-base-content">Módulos del Curso</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($secciones as $key => $data)
                    @php
                        $requerido = $data['required'] ?? 0;
                        $bloqueado = $porcentaje < $requerido;
                    @endphp

                    @if (!$bloqueado)
                        <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta ?? 'html', 'id' => $key]) }}"
                            class="card bg-base-200/60 hover:bg-base-200 border border-base-300 p-5 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                            <div class="text-3xl p-3 bg-base-100 rounded-lg group-hover:scale-110 transition-transform">
                                {{ $data['icono'] ?? '📄' }}
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-lg text-base-content group-hover:text-primary transition-colors">
                                    {{ $data['titulo'] }}
                                </h3>
                                <p class="text-xs text-base-content/60 mt-1">
                                    Clic para ver el contenido del módulo
                                </p>
                            </div>
                            <div class="text-base-content/40 group-hover:translate-x-1 transition-transform">
                                →
                            </div>
                        </a>
                    @else
                        <div class="card bg-base-200/30 border border-base-300/50 p-5 rounded-xl shadow-sm flex flex-row items-center gap-4 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/5 backdrop-blur-[1px]"></div>
                            
                            <div class="text-4xl p-3 bg-base-100/50 rounded-lg z-10">
                                🔒
                            </div>
                            
                            <div class="flex-1 z-10">
                                <h3 class="font-bold text-lg text-base-content/50 line-through decoration-2 decoration-primary/30">
                                    {{ $data['titulo'] }}
                                </h3>
                                <p class="text-xs text-base-content/30 mt-1 flex items-center gap-1">
                                    <span class="inline-block w-2 h-2 rounded-full bg-primary/30"></span>
                                    Requiere {{ $requerido }}% de progreso
                                </p>
                            </div>
                            
                            <div class="absolute top-2 right-2 text-base-content/20 z-10 text-sm">
                                🔒
                            </div>
                            
                            <div class="absolute bottom-0 left-0 h-1 bg-base-300 w-full z-10">
                                <div class="h-full bg-primary/40 transition-all duration-500" 
                                     style="width: {{ min(($porcentaje / $requerido) * 100, 100) }}%">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</x-learn.wrapper>