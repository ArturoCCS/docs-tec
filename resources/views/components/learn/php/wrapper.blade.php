@props(['idActual', 'secciones', 'carpeta' => 'html'])

<x-shell :title="'Docs Tec · ' . strtoupper($carpeta)">

    <div class="learn-shell" data-track="{{ $carpeta }}" data-carpeta="{{ $carpeta }}">

        <div class="game-nav">
            <a href="{{ auth()->check() ? route('dashboard') : '/' }}" class="game-brand">
                <img src="https://lh3.googleusercontent.com/a/ACg8ocKkMg87b9TD4_HHaAPTkupTZUbHMbyEbnBoH_3UZ11K-NUpji4=s261-c-no"
                     alt="Logo" class="game-brand-logo">
                <span>DocsTec</span>
            </a>

            <div class="game-nav-links">
                <a href="{{ auth()->check() ? route('dashboard') : '/' }}">
                    {{ auth()->check() ? 'Dashboard' : 'Inicio' }}
                </a>

                <details class="game-dropdown">
                    <summary>Cursos</summary>
                    <ul>
                        <li><a href="{{ route('curso.intro', ['carpeta' => 'html']) }}">HTML</a></li>
                        <li><a href="{{ route('curso.intro', ['carpeta' => 'css']) }}">CSS</a></li>
                        <li><a href="{{ route('curso.intro', ['carpeta' => 'js']) }}">JavaScript</a></li>
                        <li><a href="{{ route('curso.intro', ['carpeta' => 'php']) }}">PHP</a></li>
                    </ul>
                </details>

                @can('view-admin')
                    <a href="/admin">Admin</a>
                @endcan
            </div>

            <div class="game-nav-auth">
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="game-icon-btn" title="Cerrar sesión">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m10 17 5-5-5-5" />
                                <path d="M15 12H3" />
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            </svg>
                        </button>
                    </form>
                @else
                    <button type="button" class="btn btn-primary" onclick="auth_modal.showModal()">Sign In</button>
                @endauth
            </div>
        </div>

        <div class="game-topbar">
            <div class="crumbs">
                <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => 'index']) }}">{{ $carpeta }}</a>
                @if (($idActual ?? '') !== 'index')
                    <span>/</span>
                    <span class="current">{{ $idActual }}</span>
                @endif
            </div>

            <div class="game-stats">
                <span class="game-hearts" id="game-hearts">❤️❤️❤️</span>
                <span class="game-xp" id="game-xp">0 XP</span>
                <a href="{{ route('seccion.detalle', ['carpeta' => $carpeta, 'id' => 'index']) }}"
                   class="game-menu-btn" title="Mapa de niveles">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9" /><path d="M12 7v5l3 3" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="learn-content">
            {{ $slot }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shell = document.querySelector('.learn-shell');
            const carpeta = shell?.dataset.carpeta || 'html';
            const xpKey = `learn-xp-${carpeta}`;
            const heartsKey = `learn-hearts-${carpeta}`;

            const xp = parseInt(localStorage.getItem(xpKey) || '0', 10);
            document.getElementById('game-xp').textContent = `${xp} XP`;

            let hearts = parseInt(localStorage.getItem(heartsKey) ?? '3', 10);
            renderHearts(hearts);

            function renderHearts(n) {
                const el = document.getElementById('game-hearts');
                let html = '';
                for (let i = 0; i < 3; i++) {
                    html += i < n ? '❤️' : '<span class="lost">❤️</span>';
                }
                el.innerHTML = html;
            }

            window.learnGame = {
                addXp(amount) {
                    const current = parseInt(localStorage.getItem(xpKey) || '0', 10);
                    const updated = current + amount;
                    localStorage.setItem(xpKey, updated);
                    document.getElementById('game-xp').textContent = `${updated} XP`;
                },
                loseHeart() {
                    let current = parseInt(localStorage.getItem(heartsKey) ?? '3', 10);
                    current = Math.max(0, current - 1);
                    localStorage.setItem(heartsKey, current);
                    renderHearts(current);
                    return current;
                }
            };

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
</x-learn.shell>