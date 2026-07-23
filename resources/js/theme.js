export function aplicarTemaGlobal(esOscuro) {
    const temaString = esOscuro ? 'dark' : 'light';
    document.documentElement.setAttribute('data-theme', temaString);
    localStorage.setItem('theme-preference', temaString);
    window.dispatchEvent(new CustomEvent('temaCambiado', { detail: temaString }));
}

function init() {
    const toggleTema = document.querySelector('.theme-controller');
    if (!toggleTema) return;

    const temaActual = document.documentElement.getAttribute('data-theme');
    toggleTema.checked = (temaActual === 'dark');

    toggleTema.addEventListener('change', (e) => aplicarTemaGlobal(e.target.checked));
}

if (document.readyState === "complete" || document.readyState === "interactive") {
    init();
} else {
    document.addEventListener("DOMContentLoaded", init);
}