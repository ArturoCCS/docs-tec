<form action="/login" method="POST">
    @csrf
    <div class="text-center lg:text-left mb-4">
        <h3 class="text-2xl font-bold">¡Bienvenido de nuevo!</h3>
        <p class="text-sm text-base-content/70">Inicia sesión para continuar con tu curso.</p>
    </div>

    <fieldset class="fieldset w-full">
        <label class="label" for="login-email">Email</label>
        <input type="email" id="login-email" class="input input-bordered w-full" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required />
        <x-forms.error name="email"/>

        <label class="label" for="login-password">Password</label>
        <input type="password" id="login-password" class="input input-bordered w-full" name="password" placeholder="••••••••" required />
        <x-forms.error name="password"/>

        <button type="submit" class="btn btn-primary w-full mt-4">Iniciar Sesión</button>
    </fieldset>
</form>

<div class="text-center mt-4">
    <p class="text-sm">¿No tienes cuenta? 
        <button type="button" onclick="toggleAuth()" class="text-primary font-bold link link-hover">Regístrate aquí</button>
    </p>
</div>