@props([
    'position' => 'left',
    'title' => '',
    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel fugiat similique accusantium minus quod soluta at libero beatae totam dicta eveniet delectus veniam cumque veritatis, harum deleniti ipsa fugit aut.',
    'url' => '/',
])

<div @class([
    'hero-content flex-col ',
    'lg:flex-row ' => $position === 'left',
    'lg:flex-row-reverse' => $position === 'right',
])>
    @if ($slot->isNotEmpty())
        <figure>
            {{ $slot }}
        </figure>
    @endif

    <div class="index-section">
        <h2 class="text-5xl font-bold">{{ $title }}</h1>
        <p class="py-6">{{ $description }}</p>
        <form action="{{ $url }}" method="GET">
            <button class="btn btn-primary">Explorar</button>
        </form>
    </div>

</div>
