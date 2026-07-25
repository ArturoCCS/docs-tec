<dialog id="auth_modal" class="modal">
    <div class="modal-box w-11/12 max-w-4xl p-0 overflow-hidden relative shadow-2xl">
        
        <div class="absolute top-3 right-3 z-50">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost bg-base-100/50 hover:bg-base-100">✕</button>
            </form>
        </div>

        <div id="modal-wrapper" class="flex flex-col md:flex-row items-stretch min-h-[520px] transition-all">
            
            <div class="md:w-5/12 relative bg-black hidden md:block">
                 <img id="img-login" src="https://images.unsplash.com/vector-1757421654540-324e4b5c3298?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt="Login Image" 
                      class="w-full h-full object-cover absolute inset-0" />
                
                 <img id="img-register" src="https://images.unsplash.com/vector-1758276749956-1468e63f5c51?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt="Register Image" 
                      class="w-full h-full object-cover absolute inset-0 hidden" />
            </div>

            <div class="md:w-7/12 p-8 flex flex-col justify-center bg-base-100">
                
                <div id="form-login" class="py-2">
                    <x-auth.login-form />
                </div>

                <div id="form-register" class="py-2 hidden">
                    <x-auth.register-form />
                </div>

            </div>

        </div>

    </div>

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<script>
    function cambiarA(tipo) {
        const loginDiv = document.getElementById('form-login');
        const registerDiv = document.getElementById('form-register');
        const wrapper = document.getElementById('modal-wrapper');
        const imgLogin = document.getElementById('img-login');
        const imgRegister = document.getElementById('img-register');

        if (tipo === 'register') {
            loginDiv.classList.add('hidden');
            registerDiv.classList.remove('hidden');
            
            imgLogin.classList.add('hidden');
            imgRegister.classList.remove('hidden');

            wrapper.classList.remove('md:flex-row');
            wrapper.classList.add('md:flex-row-reverse');
        } else {
            registerDiv.classList.add('hidden');
            loginDiv.classList.remove('hidden');

            imgRegister.classList.add('hidden');
            imgLogin.classList.remove('hidden');

            wrapper.classList.remove('md:flex-row-reverse');
            wrapper.classList.add('md:flex-row');
        }
    }

    function toggleAuth() {
        const loginDiv = document.getElementById('form-login');
        if (loginDiv.classList.contains('hidden')) {
            cambiarA('login');
        } else {
            cambiarA('register');
        }
    }

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