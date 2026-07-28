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
                <div class="stat-figure text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="stat-title">Experiencia</div>
                <div class="stat-value text-primary">1,250 XP</div>
                <div class="stat-desc">Top 10% de estudiantes</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                </div>
                <div class="stat-title">Cursos Activos</div>
                <div class="stat-value text-secondary">2</div>
                <div class="stat-desc">HTML y CSS en progreso</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                        </path>
                    </svg>
                </div>
                <div class="stat-title">Lecciones Completadas</div>
                <div class="stat-value">18</div>
                <div class="stat-desc text-accent">3 esta semana</div>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-extrabold text-base-content flex items-center gap-3">
                    <span class="text-3xl drop-shadow-md">🏆</span> Vitrina de Logros
                </h2>
                <span class="text-sm font-semibold text-base-content/50 bg-base-200 px-3 py-1 rounded-full border border-base-300">
                    2 / 4 Desbloqueados
                </span>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="relative group cursor-pointer">
                    <div class="absolute inset-0 bg-gradient-to-r from-warning to-orange-500 rounded-2xl blur-md opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>

                    <div class="relative flex flex-col items-center p-6 bg-base-100 rounded-2xl border border-warning/30 shadow-lg hover:-translate-y-1 transition-transform duration-300 h-full">
                        <div class="mask mask-hexagon bg-gradient-to-br from-warning to-orange-500 w-24 h-24 flex items-center justify-center shadow-inner mb-4">
                            <span class="text-4xl filter drop-shadow-sm">🌐</span>
                        </div>
                        <h3 class="font-bold text-center leading-tight text-base-content mb-1">Fundamentos HTML</h3>
                        <p class="text-xs text-center text-base-content/60 mb-3 line-clamp-2">Completaste el primer módulo estructural.</p>
                        <div class="mt-auto">
                            <span class="badge badge-success gap-1 text-xs font-bold">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                Adquirida
                            </span>
                        </div>
                    </div>
                </div>

                <div class="relative group cursor-pointer">
                    <div class="absolute inset-0 bg-gradient-to-r from-info to-blue-500 rounded-2xl blur-md opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                
                    <div class="relative flex flex-col items-center p-6 bg-base-100 rounded-2xl border border-info/30 shadow-lg hover:-translate-y-1 transition-transform duration-300 h-full">
                        <div class="mask mask-hexagon bg-gradient-to-br from-info to-blue-500 w-24 h-24 flex items-center justify-center shadow-inner mb-4">
                            <span class="text-4xl filter drop-shadow-sm">🎨</span>
                        </div>
                        <h3 class="font-bold text-center leading-tight text-base-content mb-1">Primeros Estilos</h3>
                        <p class="text-xs text-center text-base-content/60 mb-3 line-clamp-2">Aplicaste CSS para embellecer la web.</p>
                        <div class="mt-auto">
                            <span class="badge badge-success gap-1 text-xs font-bold">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                Adquirida
                            </span>
                        </div>
                    </div>
                </div>

                <div class="relative group h-full">
                    <div class="relative flex flex-col items-center p-6 bg-base-200/50 rounded-2xl border border-base-300 border-dashed opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-300 h-full">
                        <div class="mask mask-hexagon bg-neutral w-24 h-24 flex items-center justify-center mb-4">
                            <span class="text-4xl opacity-50">🥷</span>
                        </div>
                        <h3 class="font-bold text-center leading-tight text-base-content mb-1">Ninja del DOM</h3>
                        <p class="text-xs text-center text-base-content/60 mb-3 line-clamp-2">Domina la interactividad con JavaScript.</p>
                        <div class="mt-auto">
                            <span class="badge badge-neutral gap-1 text-xs">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Bloqueado
                            </span>
                        </div>
                    </div>
                </div>

                <div class="relative group h-full">
                    <div class="relative flex flex-col items-center p-6 bg-base-200/50 rounded-2xl border border-base-300 border-dashed opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-300 h-full">
                        <div class="mask mask-hexagon bg-neutral w-24 h-24 flex items-center justify-center mb-4">
                            <span class="text-4xl opacity-50">🐘</span>
                        </div>
                        <h3 class="font-bold text-center leading-tight text-base-content mb-1">Backend Master</h3>
                        <p class="text-xs text-center text-base-content/60 mb-3 line-clamp-2">Conviértete en experto de servidores.</p>
                        <div class="mt-auto">
                            <span class="badge badge-neutral gap-1 text-xs">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Bloqueado
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="divider mt-10"></div>

        <div>
            <h2 class="text-2xl font-bold mb-4 text-base-content">Cursos en Progreso</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <div class="card bg-base-200 shadow-xl border border-base-300 hover:shadow-2xl transition-all">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-2">
                            <div class=" p-2 rounded-xl  flex items-center justify-center w-14 h-14">
                                <svg viewBox="0 0 128 128">
                                    <path fill="#E44D26"
                                        d="M19.569 27l8.087 89.919 36.289 9.682 36.39-9.499L108.431 27H19.569zM91.61 47.471l-.507 5.834L90.88 56H48.311l1.017 12h40.54l-.271 2.231-2.615 28.909-.192 1.69L64 106.964v-.005l-.027.012-22.777-5.916L39.65 84h11.168l.791 8.46 12.385 3.139.006-.234v.012l12.412-2.649L77.708 79H39.153l-2.734-30.836L36.152 45h55.724l-.266 2.471zM27.956 1.627h5.622v5.556h5.144V1.627h5.623v16.822h-5.623v-5.633h-5.143v5.633h-5.623V1.627zm23.782 5.579h-4.95V1.627h15.525v5.579h-4.952v11.243h-5.623V7.206zm13.039-5.579h5.862l3.607 5.911 3.603-5.911h5.865v16.822h-5.601v-8.338l-3.867 5.981h-.098l-3.87-5.981v8.338h-5.502V1.627zm21.736 0h5.624v11.262h7.907v5.561H86.513V1.627z">
                                    </path>
                                </svg>
                            </div>
                            <span class="badge badge-neutral">80%</span>
                        </div>
                        <h2 class="card-title text-xl mt-2">Curso de HTML</h2>
                        <p class="text-sm text-base-content/70">Estructura web y semántica.</p>

                        <div class="w-full mt-4">
                            <div class="flex justify-between text-xs mb-1">
                                <span>Progreso</span>
                                <span>17/20 Lecciones</span>
                            </div>
                            <progress class="progress progress-success w-full" value="85" max="100"></progress>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('curso.index', ['carpeta' => 'html']) }}"
                                class="btn btn-primary btn-sm w-full">Continuar</a>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-200 shadow-xl border border-base-300 hover:shadow-2xl transition-all">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-2">
                            <div class="bg-base-200 p-2 rounded-xl  flex items-center justify-center w-14 h-14">
                                <svg viewBox="0 0 128 128">
                                    <path fill="#1572B6"
                                        d="M8.76 1l10.055 112.883 45.118 12.58 45.244-12.626L119.24 1H8.76zm89.591 25.862l-3.347 37.605.01.203-.014.467v-.004l-2.378 26.294-.262 2.336L64 101.607v.001l-.022.019-28.311-7.888L33.75 72h13.883l.985 11.054 15.386 4.17-.004.008v-.002l15.443-4.229L81.075 65H48.792l-.277-3.043-.631-7.129L47.553 51h34.749l1.264-14H30.64l-.277-3.041-.63-7.131L29.401 23h69.281l-.331 3.862z">
                                    </path>
                                </svg>
                            </div>
                            <span class="badge badge-neutral">30%</span>
                        </div>
                        <h2 class="card-title text-xl mt-2">Curso de CSS</h2>
                        <p class="text-sm text-base-content/70">Diseño, Flexbox y Grid.</p>

                        <div class="w-full mt-4">
                            <div class="flex justify-between text-xs mb-1">
                                <span>Progreso</span>
                                <span>6/20 Lecciones</span>
                            </div>
                            <progress class="progress progress-info w-full" value="30" max="100"></progress>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('curso.index', ['carpeta' => 'css']) }}"
                                class="btn btn-outline btn-sm w-full">Continuar</a>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-sm border border-base-300 border-dashed opacity-80">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-2">
                            <div
                                class="bg-base-200 p-2 rounded-xl grayscale flex items-center justify-center w-14 h-14">
                                <svg viewBox="0 0 128 128">
                                    <path fill="#F0DB4F"
                                        d="M2 1v125h125V1H2zm66.119 106.513c-1.845 3.749-5.367 6.212-9.448 7.401-6.271 1.44-12.269.619-16.731-2.059-2.986-1.832-5.318-4.652-6.901-7.901l9.52-5.83c.083.035.333.487.667 1.071 1.214 2.034 2.261 3.474 4.319 4.485 2.022.69 6.461 1.131 8.175-2.427 1.047-1.81.714-7.628.714-14.065C58.433 78.073 58.48 68 58.48 58h11.709c0 11 .06 21.418 0 32.152.025 6.58.596 12.446-2.07 17.361zm48.574-3.308c-4.07 13.922-26.762 14.374-35.83 5.176-1.916-2.165-3.117-3.296-4.26-5.795 4.819-2.772 4.819-2.772 9.508-5.485 2.547 3.915 4.902 6.068 9.139 6.949 5.748.702 11.531-1.273 10.234-7.378-1.333-4.986-11.77-6.199-18.873-11.531-7.211-4.843-8.901-16.611-2.975-23.335 1.975-2.487 5.343-4.343 8.877-5.235l3.688-.477c7.081-.143 11.507 1.727 14.756 5.355.904.916 1.642 1.904 3.022 4.045-3.772 2.404-3.76 2.381-9.163 5.879-1.154-2.486-3.069-4.046-5.093-4.724-3.142-.952-7.104.083-7.926 3.403-.285 1.023-.226 1.975.227 3.665 1.273 2.903 5.545 4.165 9.377 5.926 11.031 4.474 14.756 9.271 15.672 14.981.882 4.916-.213 8.105-.38 8.581z">
                                    </path>
                                </svg>
                            </div>
                            <span class="badge badge-neutral">0%</span>
                        </div>
                        <h2 class="card-title text-xl mt-2">Curso de JavaScript</h2>
                        <p class="text-sm text-base-content/70">Interactividad y validacion.</p>

                        <div class="w-full mt-4">
                            <progress class="progress w-full" value="0" max="100"></progress>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('curso.intro', ['carpeta' => 'js']) }}"
                                class="btn btn-ghost btn-sm w-full">Iniciar Curso</a>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-sm border border-base-300 border-dashed opacity-80">
                    <div class="card-body">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex justify-between items-start mb-2">
                                <div
                                    class="bg-base-200 p-2 rounded-xl grayscale flex items-center justify-center w-14 h-14">
                                    <svg viewBox="0 0 128 128" class="w-10 h-10">
                                        <path fill="url(#a)"
                                            d="M0 64c0 18.593 28.654 33.667 64 33.667 35.346 0 64-15.074 64-33.667 0-18.593-28.655-33.667-64-33.667C28.654 30.333 0 45.407 0 64Z">
                                        </path>
                                        <path fill="#777bb3"
                                            d="M64 95.167c33.965 0 61.5-13.955 61.5-31.167 0-17.214-27.535-31.167-61.5-31.167S2.5 46.786 2.5 64c0 17.212 27.535 31.167 61.5 31.167Z">
                                        </path>
                                        <path
                                            d="M34.772 67.864c2.793 0 4.877-.515 6.196-1.53 1.306-1.006 2.207-2.747 2.68-5.175.44-2.27.272-3.854-.5-4.71-.788-.874-2.493-1.317-5.067-1.317h-4.464l-2.473 12.732zM20.173 83.547a.694.694 0 0 1-.68-.828l6.557-33.738a.695.695 0 0 1 .68-.561h14.134c4.442 0 7.748 1.206 9.827 3.585 2.088 2.39 2.734 5.734 1.917 9.935-.333 1.711-.905 3.3-1.7 4.724a15.818 15.818 0 0 1-3.128 3.92c-1.531 1.432-3.264 2.472-5.147 3.083-1.852.604-4.232.91-7.07.91h-5.724l-1.634 8.408a.695.695 0 0 1-.682.562z">
                                        </path>
                                        <path fill="#fff"
                                            d="M34.19 55.826h3.891c3.107 0 4.186.682 4.553 1.089.607.674.723 2.097.331 4.112-.439 2.257-1.253 3.858-2.42 4.756-1.194.92-3.138 1.386-5.773 1.386h-2.786l2.205-11.342zm6.674-8.1H26.731a1.39 1.39 0 0 0-1.364 1.123L18.81 82.588a1.39 1.39 0 0 0 1.363 1.653h7.35a1.39 1.39 0 0 0 1.363-1.124l1.525-7.846h5.151c2.912 0 5.364-.318 7.287-.944 1.977-.642 3.796-1.731 5.406-3.237a16.522 16.522 0 0 0 3.259-4.087c.831-1.487 1.429-3.147 1.775-4.931.86-4.423.161-7.964-2.076-10.524-2.216-2.537-5.698-3.823-10.349-3.823zM30.301 68.557h4.471c2.963 0 5.17-.557 6.62-1.675 1.451-1.116 2.428-2.98 2.938-5.591.485-2.508.264-4.277-.665-5.308-.931-1.03-2.791-1.546-5.584-1.546h-5.036l-2.743 14.12m10.563-19.445c4.252 0 7.353 1.117 9.303 3.348 1.95 2.232 2.536 5.347 1.76 9.346-.322 1.648-.863 3.154-1.625 4.518-.764 1.366-1.76 2.614-2.991 3.747-1.468 1.373-3.097 2.352-4.892 2.935-1.794.584-4.08.875-6.857.875h-6.296l-1.743 8.97h-7.35l6.558-33.739h14.133">
                                        </path>
                                        <path
                                            d="M69.459 74.577a.694.694 0 0 1-.682-.827l2.9-14.928c.277-1.42.209-2.438-.19-2.87-.245-.263-.979-.704-3.15-.704h-5.256l-3.646 18.768a.695.695 0 0 1-.683.56h-7.29a.695.695 0 0 1-.683-.826l6.558-33.739a.695.695 0 0 1 .682-.561h7.29a.695.695 0 0 1 .683.826L64.41 48.42h5.653c4.307 0 7.227.758 8.928 2.321 1.733 1.593 2.275 4.14 1.608 7.573l-3.051 15.702a.695.695 0 0 1-.682.56h-7.407z">
                                        </path>
                                        <path fill="#fff"
                                            d="M65.31 38.755h-7.291a1.39 1.39 0 0 0-1.364 1.124l-6.557 33.738a1.39 1.39 0 0 0 1.363 1.654h7.291a1.39 1.39 0 0 0 1.364-1.124l3.537-18.205h4.682c2.168 0 2.624.463 2.641.484.132.14.305.795.019 2.264l-2.9 14.927a1.39 1.39 0 0 0 1.364 1.654h7.408a1.39 1.39 0 0 0 1.363-1.124l3.051-15.7c.715-3.686.103-6.45-1.82-8.217-1.836-1.686-4.91-2.505-9.398-2.505h-4.81l1.421-7.315a1.39 1.39 0 0 0-1.364-1.655zm0 1.39-1.743 8.968h6.496c4.087 0 6.907.714 8.457 2.14 1.553 1.426 2.017 3.735 1.398 6.93l-3.052 15.699h-7.407l2.901-14.928c.33-1.698.208-2.856-.365-3.474-.573-.617-1.793-.926-3.658-.926h-5.829l-3.756 19.327H51.46l6.558-33.739h7.292z">
                                        </path>
                                        <path
                                            d="M92.136 67.864c2.793 0 4.878-.515 6.198-1.53 1.304-1.006 2.206-2.747 2.679-5.175.44-2.27.273-3.854-.5-4.71-.788-.874-2.493-1.317-5.067-1.317h-4.463l-2.475 12.732zM77.54 83.547a.694.694 0 0 1-.682-.828l6.557-33.738a.695.695 0 0 1 .682-.561H98.23c4.442 0 7.748 1.206 9.826 3.585 2.089 2.39 2.734 5.734 1.917 9.935a15.878 15.878 0 0 1-1.699 4.724 15.838 15.838 0 0 1-3.128 3.92c-1.53 1.432-3.265 2.472-5.147 3.083-1.852.604-4.232.91-7.071.91h-5.723l-1.633 8.408a.695.695 0 0 1-.683.562z">
                                        </path>
                                        <path fill="#fff"
                                            d="M91.555 55.826h3.891c3.107 0 4.186.682 4.552 1.089.61.674.724 2.097.333 4.112-.44 2.257-1.254 3.858-2.421 4.756-1.195.92-3.139 1.386-5.773 1.386h-2.786l2.204-11.342zm6.674-8.1H84.096a1.39 1.39 0 0 0-1.363 1.123l-6.558 33.739a1.39 1.39 0 0 0 1.364 1.653h7.35a1.39 1.39 0 0 0 1.363-1.124l1.525-7.846h5.15c2.911 0 5.364-.318 7.286-.944 1.978-.642 3.797-1.731 5.408-3.238a16.52 16.52 0 0 0 3.258-4.086c.832-1.487 1.428-3.147 1.775-4.931.86-4.423.162-7.964-2.076-10.524-2.216-2.537-5.697-3.823-10.35-3.823zM87.666 68.557h4.47c2.964 0 5.17-.557 6.622-1.675 1.45-1.116 2.428-2.98 2.936-5.591.487-2.508.266-4.277-.665-5.308-.93-1.03-2.791-1.546-5.583-1.546h-5.035Zm10.563-19.445c4.251 0 7.354 1.117 9.303 3.348 1.95 2.232 2.537 5.347 1.759 9.346-.32 1.648-.862 3.154-1.624 4.518-.763 1.366-1.76 2.614-2.992 3.747-1.467 1.373-3.097 2.352-4.892 2.935-1.793.584-4.078.875-6.856.875h-6.295l-1.745 8.97h-7.35l6.558-33.739h14.133">
                                        </path>
                                        <defs>
                                            <radialGradient id="a" cx="0" cy="0" r="1"
                                                gradientTransform="matrix(84.04136 0 0 84.04136 38.426 42.169)"
                                                gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#AEB2D5"></stop>
                                                <stop offset=".3" stop-color="#AEB2D5"></stop>
                                                <stop offset=".75" stop-color="#484C89"></stop>
                                                <stop offset="1" stop-color="#484C89"></stop>
                                            </radialGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <span class="badge badge-neutral">0%</span>
                        </div>
                        <h2 class="card-title text-xl mt-2">Curso de php</h2>
                        <p class="text-sm text-base-content/70">Lógica del lado del cliente.</p>

                        <div class="w-full mt-4">
                            <progress class="progress w-full" value="0" max="100"></progress>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('curso.intro', ['carpeta' => 'php']) }}"
                                class="btn btn-ghost btn-sm w-full">Iniciar Curso</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-dashboard.wrapper>