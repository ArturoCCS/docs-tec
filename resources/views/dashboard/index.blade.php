<x-dashboard.wrapper>
    <div class="w-full space-y-8 pb-12">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="avatar online">
                    <div class="w-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                            alt="Avatar" />
                    </div>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-base-content">
                        ¡Hola, {{ $user->name }}! 👋
                    </h1>
                    <p class="text-base-content/70">Listo para seguir aprendiendo hoy.</p>
                </div>
            </div>
            <a href="{{ route('curso.index', ['carpeta' => 'html']) }}" class="btn btn-primary gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Reanudar aprendizaje
            </a>
        </div>

        <div class="stats stats-vertical lg:stats-horizontal shadow-xl bg-base-200 w-full border border-base-300">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                </div>
                <div class="stat-title">Cursos Activos</div>
                <div class="stat-value text-secondary">{{ $activeCourses }}</div>
                <div class="stat-desc">
                    {{ $activeCourses > 0 ? implode(', ', $units->filter(fn($u) => $u['progress'] > 0 && $u['progress'] < 100)->pluck('name')->toArray()) : 'Ninguno' }}
                </div>
            </div>

            <div class="stat">
                <div class="stat-figure text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <div class="stat-title">Última Lección</div>
                <div class="stat-value text-accent text-2xl">
                    @if($lastLesson)
                        {{ $lastLesson->diffForHumans() }}
                    @else
                        —
                    @endif
                </div>
                <div class="stat-desc">
                    @if($lastLesson)
                        {{ $lastLesson->format('d/m/Y H:i') }}
                    @else
                        Sin actividad registrada
                    @endif
                </div>
            </div>
        </div>

        <div>
            
        </div>

        <div class="divider mt-10"></div>

        <div>
            <h2 class="text-2xl font-bold mb-4 text-base-content">Cursos en Progreso</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @forelse($units as $unit)
                        <div class="card bg-base-200 shadow-xl border border-base-300 hover:shadow-2xl transition-all">
                            <div class="card-body">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="p-2 rounded-xl flex items-center justify-center w-14 h-14">
                                        
                                        @switch($unit['name'])
                                            @case('html')
                                                <svg viewBox="0 0 128 128" class="w-10 h-10">
                                                    <path fill="#E44D26" d="M19.569 27l8.087 89.919 ... "></path>
                                                </svg>
                                                @break
                                            @case('css')
                                                <svg viewBox="0 0 128 128" class="w-10 h-10">
                                                    <path fill="#1572B6" d="M8.76 1l10.055 112.883 ... "></path>
                                                </svg>
                                                @break
                                            @case('js')
                                                <svg viewBox="0 0 128 128" class="w-10 h-10">
                                                    <path fill="#F0DB4F" d="M2 1v125h125V1H2zm66.119 ... "></path>
                                                </svg>
                                                @break
                                            @case('php')
                                                <svg viewBox="0 0 128 128" class="w-10 h-10">

                                                </svg>
                                                @break
                                            @default
                                                <span class="text-4xl">📚</span>
                                        @endswitch
                                    </div>
                                    <span class="badge badge-neutral">{{ $unit['progress'] }}%</span>
                                </div>

                                <h2 class="card-title text-xl mt-2">{{ $unit['name'] }}</h2>
                                <p class="text-sm text-base-content/70">
                                    Curso de {{ $unit['name'] }}
                                </p>

                                <div class="w-full mt-4">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span>Progreso</span>
                                        <span>{{ $unit['progress'] }}%</span>
                                    </div>
                                    <progress class="progress 
                                        @if($unit['progress'] >= 80) progress-success 
                                        @elseif($unit['progress'] >= 40) progress-warning 
                                        @else progress-info 
                                        @endif
                                        w-full" 
                                        value="{{ $unit['progress'] }}" max="100">
                                    </progress>
                                </div>

                                <div class="card-actions justify-end mt-4">
                                    @if($unit['progress'] > 0)
                                        <a href="{{ route('curso.index', ['carpeta' => $unit['carpeta']]) }}" 
                                        class="btn btn-primary btn-sm w-full">Continuar</a>
                                    @else
                                        <a href="{{ route('curso.intro', ['carpeta' => $unit['carpeta']]) }}" 
                                        class="btn btn-ghost btn-sm w-full">Iniciar Curso</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-base-content/70">No hay cursos disponibles.</p>
                        </div>
                    @endforelse
                </div>

        </div>

    </div>
</x-dashboard.wrapper>