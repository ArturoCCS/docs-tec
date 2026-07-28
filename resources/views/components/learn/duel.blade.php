@props(['preguntas' => [], 'carpeta' => 'html', 'seccionKey' => '', 'bossNombre' => 'Bug Jefe'])

@if (count($preguntas) > 0)
    @php $duelId = 'duel-' . $seccionKey; @endphp

    <div class="duel-boss" id="{{ $duelId }}"
         data-carpeta="{{ $carpeta }}" data-seccion="{{ $seccionKey }}" data-boss="{{ $bossNombre }}">

        <div class="duel-vs">
            <div class="duel-side you">
                <div class="who"><span>Tú</span><span data-you-hp-label>100</span></div>
                <div class="duel-hp-bar"><div class="duel-hp-fill" data-you-hp style="width:100%"></div></div>
            </div>
            <span class="duel-vs-icon">⚔️</span>
            <div class="duel-side boss">
                <div class="who"><span>{{ $bossNombre }}</span><span data-boss-hp-label>100</span></div>
                <div class="duel-hp-bar"><div class="duel-hp-fill" data-boss-hp style="width:100%"></div></div>
            </div>
        </div>

        <div class="duel-body" data-preguntas='@json($preguntas)'></div>
    </div>

    @once
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.duel-boss').forEach(initDuel);

                function escapeHtml(str) {
                    return String(str)
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#39;');
                }

                function initDuel(el) {
                    const body = el.querySelector('.duel-body');
                    const preguntas = JSON.parse(body.dataset.preguntas || '[]');
                    const carpeta = el.dataset.carpeta;
                    const seccion = el.dataset.seccion;
                    const bossNombre = el.dataset.boss;
                    const progressKey = `learn-progress-${carpeta}`;

                    let index = 0;
                    let youHp = 100;
                    let bossHp = 100;
                    const dmgPerHit = Math.ceil(100 / preguntas.length);

                    const youFill = el.querySelector('[data-you-hp]');
                    const bossFill = el.querySelector('[data-boss-hp]');
                    const youLabel = el.querySelector('[data-you-hp-label]');
                    const bossLabel = el.querySelector('[data-boss-hp-label]');

                    render();

                    function render() {
                        if (bossHp <= 0 || youHp <= 0 || index >= preguntas.length) {
                            finish();
                            return;
                        }

                        const q = preguntas[index];
                        const opciones = q.opciones.map((op, i) => `
                            <button type="button" class="duel-option" data-i="${i}">${escapeHtml(op)}</button>
                        `).join('');

                        body.innerHTML = `
                            <p class="duel-question">${escapeHtml(q.pregunta)}</p>
                            <div class="duel-options">${opciones}</div>
                            <div class="duel-feedback" data-feedback></div>
                        `;

                        body.querySelectorAll('.duel-option').forEach(btn => {
                            btn.addEventListener('click', () => handleAnswer(q, btn));
                        });
                    }

                    function handleAnswer(q, btn) {
                        const chosen = parseInt(btn.dataset.i, 10);
                        const options = body.querySelectorAll('.duel-option');
                        const feedback = body.querySelector('[data-feedback]');
                        const isCorrect = chosen === q.correcta;

                        options.forEach(opt => {
                            opt.disabled = true;
                            const i = parseInt(opt.dataset.i, 10);
                            if (i === q.correcta) opt.classList.add('correct');
                            else if (i === chosen) opt.classList.add('incorrect');
                        });

                        if (isCorrect) {
                            bossHp = Math.max(0, bossHp - dmgPerHit);
                            bossFill.style.width = bossHp + '%';
                            bossLabel.textContent = bossHp;
                            feedback.textContent = `+ Golpe certero. ${bossNombre} pierde ${dmgPerHit} HP.`;
                            feedback.classList.add('show', 'ok');
                        } else {
                            youHp = Math.max(0, youHp - dmgPerHit);
                            youFill.style.width = youHp + '%';
                            youLabel.textContent = youHp;
                            if (window.learnGame) window.learnGame.loseHeart();
                            feedback.textContent = `- Fallaste. La respuesta correcta era: ${q.opciones[q.correcta]}`; // textContent ya es seguro, no necesita escape
                            feedback.classList.add('show', 'fail');
                        }

                        setTimeout(() => { index++; render(); }, 1100);
                    }

                    function finish() {
                        const won = bossHp <= 0 && youHp > 0;

                        if (won) {
                            const done = new Set(JSON.parse(localStorage.getItem(progressKey) || '[]'));
                            done.add(seccion);
                            localStorage.setItem(progressKey, JSON.stringify([...done]));
                            if (window.learnGame) window.learnGame.addXp(50);

                            el.dispatchEvent(new CustomEvent('duelWon', {
                                detail : { seccion: seccion, carpeta: carpeta }
                            }));

                        }

                        body.innerHTML = `
                            <div class="duel-result">
                                <p class="big">${won ? `🏆 ¡Venciste a ${bossNombre}!` : '💀 El jefe te venció esta vez'}</p>
                                <p style="color: var(--text-dim); font-size:.85rem; margin-bottom:1rem;">
                                    ${won ? 'Nivel superado. +50 XP.' : 'Repasa la carta y vuelve a intentarlo.'}
                                </p>
                                <button type="button" class="btn ${won ? 'btn-success' : 'btn-primary'}" data-retry>
                                    ${won ? 'Jugar de nuevo' : 'Reintentar duelo'}
                                </button>
                            </div>
                        `;
                        body.querySelector('[data-retry]').addEventListener('click', () => {
                            index = 0; youHp = 100; bossHp = 100;
                            youFill.style.width = '100%'; bossFill.style.width = '100%';
                            youLabel.textContent = 100; bossLabel.textContent = 100;
                            render();
                        });
                    }
                }
            });
        </script>
    @endonce
@endif