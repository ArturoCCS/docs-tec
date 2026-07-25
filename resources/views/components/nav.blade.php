<nav>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="-1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    @auth
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="/">Inicio</a></li>
                    @endauth
                    <li>
                        <a>Cursos</a>
                        <ul class="p-2">
                            <li><a href="{{ route('html.intro') }}">HTML</a></li>
                            <li><a href="{{ route('css.intro') }}">CSS</a></li>
                            <li><a href="{{ route('js.intro') }}">JAVASCRIPT</a></li>
                            <li><a href="{{ route('php.intro') }}">PHP</a></li>
                        </ul>
                    </li>

                    @can('view-admin')
                        <li><a href="/admin">Admin</a></li>
                    @endcan
                </ul>
            </div>
            <img src="https://lh3.googleusercontent.com/a/ACg8ocKkMg87b9TD4_HHaAPTkupTZUbHMbyEbnBoH_3UZ11K-NUpji4=s261-c-no"
                class="size-15 rounded-box" alt="Imagen de logo">

            <a href="/" class="btn btn-ghost text-xl">DocsTec</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                @auth
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @else
                    <li><a href="/">Inicio</a></li>
                @endauth
                <li>
                    <details>
                        <summary>Cursos</summary>
                        <ul class="p-2 bg-base-100 w-40 z-1">
                            <li><a href="{{ route('html.intro') }}">HTML</a></li>
                            <li><a href="{{ route('css.intro') }}">CSS</a></li>
                            <li><a href="{{ route('js.intro') }}">JAVASCRIPT</a></li>
                            <li><a href="{{ route('php.intro') }}">PHP</a></li>
                        </ul>
                    </details>
                </li>
                @can('view-admin')
                    <li><a href="/admin">Admin</a></li>
                @endcan
            </ul>
        </div>

        <div class="navbar-end gap-10">
        <x-theme-selector />


            <div class="space-x-5">


                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-log-in-icon lucide-log-in">
                                <path d="m10 17 5-5-5-5" />
                                <path d="M15 12H3" />
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            </svg>
                        </button>
                    </form>
                @else
                    <button class="btn btn-primary" onclick="auth_modal.showModal()">Sign In</button>
                @endauth

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        @if (session('abrir_login') || $errors->has('email') || $errors->has('password') || $errors->has('name'))
                            const modal = document.getElementById('auth_modal');
                            if (modal) {
                                modal.showModal();
                                @if ($errors->has('name'))
                                    cambiarA('register');
                                @endif
                            }
                        @endif
                    });
                </script>
            </div>

        </div>
    </div>
</nav>

<x-auth.modal />
