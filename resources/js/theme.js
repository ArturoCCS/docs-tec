export const TEMAS_CLAROS = window.TemasData?.claros ?? [];
export const TEMAS_OSCUROS = window.TemasData?.oscuros ?? [];
export const TEMAS_DISPONIBLES = [...TEMAS_CLAROS, ...TEMAS_OSCUROS];

const TEMAS_OSCUROS_SET = new Set(TEMAS_OSCUROS);
const TEMA_POR_DEFECTO = 'light';

export function esTemaOscuro(tema) {
    return TEMAS_OSCUROS_SET.has(tema);
}

export function aplicarTema(nombreTema, { guardar = true } = {}) {
    const tema = TEMAS_DISPONIBLES.includes(nombreTema) ? nombreTema : TEMA_POR_DEFECTO;

    document.documentElement.setAttribute('data-theme', tema);
    if (guardar) localStorage.setItem('theme-preference', tema);

    actualizarUISelector(tema);
    window.dispatchEvent(new CustomEvent('temaCambiado', { detail: tema }));

    return tema;
}

function actualizarUISelector(tema) {
    document.querySelectorAll('.theme-item').forEach((btn) => {
        const esActivo = btn.dataset.tema === tema;
        btn.classList.toggle('bg-base-200', esActivo);
        btn.querySelector('.theme-check')?.classList.toggle('opacity-0', !esActivo);
    });

    document.getElementById('temaSwatchActual')?.setAttribute('data-theme', tema);

    const nombreActual = document.getElementById('temaNombreActual');
    if (nombreActual) nombreActual.textContent = tema;
}

function inicializarBotonesTema() {
    document.querySelectorAll('.theme-item').forEach((btn) => {
        btn.addEventListener('click', () => {
            aplicarTema(btn.dataset.tema);
            document.activeElement?.blur();
        });
    });
}

function inicializarBuscador() {
    const buscador = document.getElementById('buscadorTemas');
    if (!buscador) return;

    buscador.addEventListener('input', (e) => {
        const filtro = e.target.value.trim().toLowerCase();

        document.querySelectorAll('.theme-group').forEach((grupo) => {
            let visibles = 0;

            grupo.querySelectorAll('li').forEach((li) => {
                const tema = li.querySelector('.theme-item')?.dataset.tema ?? '';
                const coincide = tema.includes(filtro);
                li.classList.toggle('hidden', !coincide);
                if (coincide) visibles++;
            });

            grupo.classList.toggle('hidden', visibles === 0);
        });
    });
}

function init() {
    const temaGuardado = localStorage.getItem('theme-preference') || TEMA_POR_DEFECTO;
    aplicarTema(temaGuardado, { guardar: false });
    inicializarBotonesTema();
    inicializarBuscador();
}

if (document.readyState === "complete" || document.readyState === "interactive") {
    init();
} else {
    document.addEventListener("DOMContentLoaded", init);
}