<x-layout>
    <div class="drawer lg:drawer-open bg-base-100 min-h-screen">
        <input id="main-drawer" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col p-6 lg:p-12 justify-between min-h-screen">

            <div>
                <div class="w-full flex justify-between items-center mb-8 pb-4">
                    <label for="main-drawer" class="btn btn-square btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>

                {{ $slot }}
            </div>


        </div>

        <div class="drawer-side z-20">
            <label for="main-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4 gap-2 shadow-2xl">

                <li class="menu-title mt-4">Perfil</li>

                <li class="menu-item-modulo" data-titulo="introduccion">
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'active font-semibold' : '' }}">
                        <span
                            class="{{ request()->routeIs('dashboard') ? 'inline-block w-[2px] h-5 bg-primary rounded-full' : '' }}"></span>
                        Progreso General
                    </a>
                </li>
            </ul>
        </div>
    </div>

</x-layout>
