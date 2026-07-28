<x-dashboard.wrapper>
    <div class="w-full space-y-8 pb-12">

        <div class="w-full bg-base-200 p-8 rounded-2xl shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
                <span class="badge badge-secondary badge-outline">Dashboard</span>
            </div>

            <h1 class="text-4xl font-extrabold tracking-tight mb-4">
                ¡Bienvenido, {{ $user->name }}! al Curso de HTML
            </h1>
            
            <p class="text-base-content/70 text-lg leading-relaxed mb-6">
                Aquí encontrarás todo el temario estructurado para dominar el desarrollo web desde las bases hasta
                conceptos avanzados. Selecciona un módulo o comienza por la introducción.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('curso.intro', ['carpeta' => $carpeta ?? 'html']) }}" class="btn btn-primary">Comenzar Introducción →</a>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-4 text-base-content">Módulos del Curso</h2>
        </div>

    </div>
</x-learn.wrapper>