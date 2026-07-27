@php
    $fecha = \Carbon\Carbon::now()->translatedFormat('Y');
@endphp

<footer id="footer" class="footer  pointer-events-none footer-horizontal footer-center text-base-content rounded p-10">

    @if (request()->is('/'))
        <div class="absolute inset-0 pointer-events-none z-20 overflow-visible">

            <div class="absolute transform blocky-item opacity-0 w-10 lg:w-30 ">
                {!! file_get_contents(asset('svg/blocky.svg')) !!}
            </div>

            <div class="absolute bottom-[30%] right-[2%] lg:right-[6%] w-20 lg:w-44 transform -rotate-5 blocky-item">
                {!! file_get_contents(asset('svg/php.svg')) !!}
            </div>

            <div class="absolute bottom-[30%] left-[2%] lg:left-[6%] w-18 lg:w-44 transform rotate-5 blocky-item">
                 {!! file_get_contents(asset('svg/js.svg')) !!}
            </div>

            <div class="absolute bottom-[15%] left-[2%] lg:left-[2%] w-14 lg:w-38 transform -rotate-12 blocky-item">
               

                {!! file_get_contents(asset('svg/html.svg')) !!}
            </div>

            <div class="absolute bottom-[15%] right-[2%] lg:right-[2%] w-16 lg:w-38 transform rotate-12 blocky-item ">
                {!! file_get_contents(asset('svg/css.svg')) !!}
            </div>


            <div class="absolute bottom-[5%] left-[5%] lg:left-[10%] w-10 lg:w-30 transform rotate-5 blocky-item">
                 {!! file_get_contents(asset('svg/juega.svg')) !!}
            </div>

            <div
                class="absolute bottom-[5%] right-[5%] lg:right-[10%] w-10 lg:w-43 transform -rotate-5 blocky-item hidden sm:block">
                {!! file_get_contents(asset('svg/aprende.svg')) !!}
            </div>

            <div class="absolute bottom-[5%] left-[15%] lg:left-[36%] w-14 lg:w-50 transform opacity-0 rotate-6 blocky-item">
                {!! file_get_contents(asset('svg/construye.svg')) !!}
            </div>


        </div>
    @endif


    <nav>
        <div class="grid grid-flow-col gap-4">
            <img src="https://lh3.googleusercontent.com/a/ACg8ocKkMg87b9TD4_HHaAPTkupTZUbHMbyEbnBoH_3UZ11K-NUpji4=s261-c-no"
                class="size-30 rounded-box" alt="Imagen de logo">
        </div>
    </nav>
    <aside>
        <p>Copyright © {{ $fecha }} - All rights reserved by DocsTec Learn &copy;</p>
    </aside>
</footer>
