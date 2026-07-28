<x-layout>
    <div class="mx-auto p-4 max-w-lg">
        <h1 class="text-3xl font-bold mb-6">Crear Nueva Unidad</h1>

        <form action="/create-unit" method="POST" class="card bg-base-100 shadow-xl p-6">
            @csrf
            <div class="form-control mb-4">
                <label class="label" for="title">Título</label>
                <input type="text" name="title" id="title" class="input input-bordered" required>
            </div>


            <div class="form-control mb-4">
                <label class="label" for="description">Descripción</label>
                <textarea name="description" id="description" class="textarea" rows="3"></textarea>
            </div>

            <div class="form-control mb-4">
                <label class="label" for="order">Orden</label>
                <input type="number" name="order" id="order" class="input input-bordered" value="0" min="0">
            </div>

            <button type="submit" class="btn btn-primary w-full">Guardar Unidad</button>
        </form>
    </div>
</x-layout>