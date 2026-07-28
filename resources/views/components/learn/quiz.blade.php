@props(['preguntas' => []])

@if(count($preguntas) > 0)
    <div class="mt-12 border-t border-base-300 pt-8">
        <h2 class="text-2xl font-bold mb-6">📝 Cuestionario</h2>

        <div class="quiz-container" data-preguntas='@json($preguntas)'>

        </div>
    </div>

    @once
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.quiz-container').forEach(initQuizSimple);
            });

            function initQuizSimple(container) {
                const preguntas = JSON.parse(container.dataset.preguntas || '[]');
                if (preguntas.length === 0) return;

                let correctas = new Array(preguntas.length).fill(false);

                let html = '';
                preguntas.forEach((q, index) => {
                    const opcionesHtml = q.opciones.map((op, i) => `
                        <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-base-200/70 cursor-pointer transition">
                            <input type="radio" name="pregunta_${index}" value="${i}" data-index="${i}">
                            <span>${escapeHtml(op)}</span>
                        </label>
                    `).join('');

                    html += `
                        <div class="mb-8 p-4 bg-base-200/30 rounded-xl quiz-pregunta" data-index="${index}" data-correcta="${q.correcta}">
                            <p class="font-semibold text-lg mb-3">${index+1}. ${q.pregunta}</p>
                            <div class="space-y-2">${opcionesHtml}</div>
                            <div class="mt-3 text-sm font-medium feedback" style="display:none;"></div>
                        </div>
                    `;
                });

                container.innerHTML = html;

                container.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.addEventListener('change', function () {
                        const preguntaDiv = this.closest('.quiz-pregunta');
                        const index = parseInt(preguntaDiv.dataset.index);
                        const feedback = preguntaDiv.querySelector('.feedback');
                        const selectedValue = parseInt(this.value);
                        const correcta = parseInt(preguntaDiv.dataset.correcta);
                        const opciones = preguntaDiv.querySelectorAll('input[type="radio"]');
                        
                        opciones.forEach(opt => opt.disabled = true);
                        
                        feedback.style.display = 'block';
                        if (selectedValue === correcta) {
                            feedback.textContent = '✅ ¡Correcto!';
                            feedback.className = 'mt-3 text-sm font-medium text-success';
                            correctas[index] = true;
                        } else {
                            const correctText = preguntas[index].opciones[correcta];
                            feedback.textContent = `❌ Incorrecto. La respuesta correcta era: ${correctText}`;
                            feedback.className = 'mt-3 text-sm font-medium text-error';
                            correctas[index] = false;
                        }
                    });
                });

                container.isComplete = function() {
                    return correctas.every(v => v === true);
                };
            }

            function escapeHtml(str) {
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            }
        </script>
    @endonce
@endif