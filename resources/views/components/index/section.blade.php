@props([
    'position' => 'left',
    'title' => '',
    'subtitle' => '',
    'description' => 'Lorem ipsum dolor sit amet...',
    'url' => '/',
])

<div @class([
    'hero-content hero-full flex-col gap-12 relative overflow-hidden',
    'lg:flex-row' => $position === 'left',
    'lg:flex-row-reverse' => $position === 'right',
])>
    @if($slot)
        <div>
            {{ $slot }}
        </div>
    @endif

    <div class="index-section max-w-xl z-10">
        @if ($subtitle)
            <span id="hero-tag" class="badge badge-primary badge-outline font-semibold">{{ $subtitle }}</span>
        @endif

        <h2 class="text-4xl lg:text-5xl font-bold mt-1 mb-4">{{ $title }}</h2>

        <p class="py-2 text-base-content/80 text-base lg:text-lg leading-relaxed">{{ $description }}</p>

        @isset($extra)
            <div class="py-3">
                {{ $extra }}
            </div>
        @endisset

        <div class="mt-6">
            <a href="{{ $url }}" class="inline-block group focus:outline-none">
                {!! file_get_contents(asset('svg/explorar.svg')) !!}
            </a>
        </div>
    </div>

    
    @isset($svg)
        <div
            class="absolute top-5 right-9 w-32 h-32 lg:w-40 lg:h-40 pointer-events-none opacity-6 transform rotate-12 z-0">
            {{ $svg }}
        </div>
    @endisset
</div>
