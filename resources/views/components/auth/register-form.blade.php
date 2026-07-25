<form action="/register" method="POST">
    @csrf
    <div class="text-center lg:text-left mb-4">
        <h3 class="text-2xl font-bold">Crea una cuenta</h3>
        <p class="text-sm text-base-content/70">Regístrate para guardar tu progreso en el curso.</p>
    </div>

    <fieldset class="fieldset w-full">
        <label class="label" for="register-name">Nombre</label>
        <input type="text" id="register-name" class="input input-bordered w-full" name="name" value="{{ old('name') }}" placeholder="Tu nombre" required />
        <x-forms.error name="name"/>

        <label class="label" for="register-email">Email</label>
        <input type="email" id="register-email" class="input input-bordered w-full" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required />
        <x-forms.error name="email"/>

        <label class="label" for="register-password">Password</label>
        <input type="password" id="register-password" class="input input-bordered w-full" name="password" placeholder="••••••••" required />
        <x-forms.error name="password"/>

        <button type="submit" class="btn btn-neutral w-full mt-4">Registrarse</button>
    </fieldset>
</form>

<div class="text-center mt-4">
    <p class="text-sm">¿Ya tienes cuenta? 
        <button type="button" onclick="toggleAuth()" class="text-primary font-bold link link-hover">Inicia sesión</button>
    </p>
</div>