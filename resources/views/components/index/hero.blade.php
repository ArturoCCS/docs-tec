<div class="hero min-h-[90vh] px-4 py-12 relative overflow-hidden">

    <div class="hero-content min-h-[60vh] limit-hero flex-col lg:flex-row gap-8 w-full max-w-7xl mx-auto relative z-10" style="background:  var(--color-base-100)">

        <div class="w-full lg:w-1/2 text-center lg:text-left space-y-6">
            <span id="hero-tag" class="badge badge-primary badge-outline font-semibold">Programación Visual</span>

            <h1 id="hero-title" class="text-4xl lg:text-5xl font-bold tracking-tight">
                Construye código <span class="text-primary">arrastrando bloques</span>
            </h1>

            <p id="hero-description" class="py-2 text-base-content/80 text-lg">
                Experimenta con HTML, CSS y JavaScript de una forma totalmente interactiva. Diseña componentes
                visuales y comprende la estructura del código de manera sencilla y divertida.
            </p>

            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                <a href="{{ route('html.intro') }}" class="btn btn-primary">Empezar con HTML</a>
                <a href="#timeline-section" class="btn btn-outline">Ver RoadMap</a>
            </div>

            <div class="initial">
                <div class="thumbnail w-16 lg:w-24 mx-auto lg:mx-0" data-flip-id="img">
                    {!! file_get_contents(asset('svg/blocky.svg')) !!}
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2">
            <div class="card bg-base-100 shadow-xl border border-base-300 p-4">
                <div style="position: relative; w-full; height: 400px; border: 1px solid #ccc; border-radius: 0.5rem; overflow: hidden;">
                    <div id="blocklyHeroDiv" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
                </div>
                <iframe id="preview-iframe" class="hidden" srcdoc=""></iframe>
            </div>
        </div>

    </div>
</div>