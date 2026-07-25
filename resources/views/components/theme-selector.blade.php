@props([
    'temasClaros' => null,
    'temasOscuros' => null,
])

@php
    $temasClaros = $temasClaros ?? config('themes.claros', []);
    $temasOscuros = $temasOscuros ?? config('themes.oscuros', []);
@endphp

<div class="dropdown dropdown-end">
    <div tabindex="0" role="button" class="btn btn-ghost gap-2">
        <span id="temaSwatchActual" data-theme="light"
            class="grid grid-cols-2 gap-0.5 w-4 h-4 rounded overflow-hidden shrink-0">
            <span class="bg-primary"></span>
            <span class="bg-secondary"></span>
            <span class="bg-accent"></span>
            <span class="bg-neutral"></span>
        </span>
        <span id="temaNombreActual" class="hidden sm:inline capitalize text-sm">Tema</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 opacity-60" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
        </svg>
    </div>

    <div tabindex="0"
        class="dropdown-content z-20 mt-2 w-72 rounded-box bg-base-100 shadow-2xl border border-base-300">
        <div class="p-2 sticky top-0 bg-base-100 rounded-t-box z-10">
            <input id="buscadorTemas" type="text" placeholder="Buscar tema…"
                class="input input-sm input-bordered w-full" autocomplete="off" />
        </div>

        <div class="max-h-80 overflow-y-auto p-2 pt-0" id="listaTemas">
            @foreach (['Claros' => $temasClaros, 'Oscuros' => $temasOscuros] as $grupo => $temas)
                <div class="theme-group" data-grupo="{{ Str::slug($grupo) }}">
                    <p class="theme-group-title px-2 pt-2 pb-1 text-xs font-semibold uppercase tracking-wide opacity-60">
                        {{ $grupo }}
                    </p>
                    <ul class="grid grid-cols-1 gap-1 mb-2">
                        @foreach ($temas as $tema)
                            <li>
                                <button type="button" data-tema="{{ $tema }}"
                                    class="theme-item flex w-full items-center gap-3 rounded-btn px-2 py-1.5 text-left hover:bg-base-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                                    <span data-theme="{{ $tema }}"
                                        class="grid grid-cols-2 gap-0.5 w-5 h-5 rounded overflow-hidden shrink-0">
                                        <span class="bg-primary"></span>
                                        <span class="bg-secondary"></span>
                                        <span class="bg-accent"></span>
                                        <span class="bg-neutral"></span>
                                    </span>
                                    <span class="flex-1 text-sm capitalize">{{ $tema }}</span>
                                    <svg class="theme-check h-4 w-4 text-primary opacity-0 shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>