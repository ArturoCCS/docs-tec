<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Mis Unidades</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($units as $unit)
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $unit->title }}</h2>
                        <p class="text-sm text-gray-600">{{ $unit->description }}</p>
                        <div class="mt-4">
                            <div class="flex justify-between text-sm mb-1">
                                <span>Progreso:</span>
                                <span id="percentage-{{ $unit->id }}">{{ $unit->percentage }}%</span>
                            </div>
                            <progress id="progress-{{ $unit->id }}" class="progress progress-primary w-full"
                                      value="{{ $unit->percentage }}" max="100"></progress>
                        </div>
                        <div class="card-actions justify-end mt-3">
                            <button class="btn btn-sm btn-primary"
                                    onclick="updateProgress({{ $unit->id }})">
                                +10%
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay unidades disponibles.</p>
            @endforelse
        </div>
    </div>

    <script>
        async function updateProgress(unitId) {
            const current = parseInt(document.getElementById(`percentage-${unitId}`).textContent);
            const newPercentage = current + 10 > 100 ? 0 : current + 10;

            await fetch(`/units/${unitId}/progress`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ percentage: newPercentage })
            });
            document.getElementById(`percentage-${unitId}`).textContent = newPercentage + '%';
            document.getElementById(`progress-${unitId}`).value = newPercentage;
        }
    </script>
</x-layout>