<x-layout>
    <form action="/register" method="POST">
        @csrf

        <div class="hero bg-base-200 min-h-screen">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl font-bold">Register now!</h1>
                    <p class="py-6">
                        Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                        quasi. In deleniti eaque aut repudiandae et a id nisi.
                    </p>
                </div>
                <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                    <div class="card-body">
                        <fieldset class="fieldset">

                            <label class="label" for="name">Name</label>
                            <input type="text" class="input" name="name" placeholder="Name" required/>
                            <label class="label" for="email">Email</label>
                            <input type="email" class="input" name="email" placeholder="Email" required/>
                            <label class="label" for="password">Password</label>
                            <input type="password" class="input" name="password" placeholder="Password" required/>
                            <button class="btn btn-neutral mt-4">Register</button>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
