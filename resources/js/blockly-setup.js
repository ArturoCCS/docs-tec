import * as Blockly from 'blockly';
import DarkTheme from '@blockly/theme-dark';
import ModernTheme from '@blockly/theme-modern';

let workspace;
let lenguajeActual = 'html';

function aplicarTema(esOscuro) {
    const temaString = esOscuro ? 'dark' : 'light';
    document.documentElement.setAttribute('data-theme', temaString);
    localStorage.setItem('theme-preference', temaString);
    if (workspace) {
        workspace.setTheme(esOscuro ? DarkTheme : ModernTheme);
    }


    const componenteEspecial = document.getElementById('html');

    const componenteEspecial2 = document.getElementById('body');



    if (temaString === 'light') {

    console.log(temaString)
        componenteEspecial.setAttribute('data-theme', 'dark');

        componenteEspecial2.setAttribute('data-theme', 'light');
    } else {
        componenteEspecial.setAttribute('data-theme', 'light');

        componenteEspecial2.setAttribute('data-theme', 'dark');
    }

}

function inicializarToggleTema() {
    const toggleTema = document.querySelector('.theme-controller');
    if (!toggleTema) return;

    const temaActual = document.documentElement.getAttribute('data-theme');
    toggleTema.checked = (temaActual === 'dark');

    toggleTema.removeEventListener('change', onToggleChange);
    toggleTema.addEventListener('change', onToggleChange);
}

function onToggleChange(e) {
    aplicarTema(e.target.checked);
}

function inicializarEditor() {
    if (!window.BlocklyData) return;

    Object.keys(window.BlocklyData.bloques).forEach(categoria => {
        const bloques = window.BlocklyData.bloques[categoria];
        if (bloques && bloques.length > 0) Blockly.common.defineBlocksWithJsonArray(bloques);
    });

    workspace = Blockly.inject('blocklyDiv', {
        toolbox: window.BlocklyData.toolboxes['html'],
        grid: window.BlocklyData.config.grid || { spacing: 20, length: 3, snap: true },
        zoom: window.BlocklyData.config.zoom || { controls: true, wheel: true },
        scrollbars: true
    });

    const esOscuro = document.documentElement.getAttribute('data-theme') === 'dark';
    workspace.setTheme(esOscuro ? DarkTheme : ModernTheme);

    const toolbox = workspace.getToolbox();
    if (toolbox && toolbox.getFlyout()) {
        toolbox.getFlyout().autoClose = false;
        toolbox.selectItemByPosition(0);
    }

    Blockly.svgResize(workspace);
    setTimeout(() => Blockly.svgResize(workspace), 100);
    window.addEventListener('resize', () => Blockly.svgResize(workspace));


    let debounceTimeout = null;

    let timeoutGeneracion = null;

    workspace.addChangeListener((event) => {
        if (event.type === Blockly.Events.BLOCK_CREATE ||
            event.type === Blockly.Events.BLOCK_CHANGE ||
            event.type === Blockly.Events.BLOCK_DELETE) {

            generarCodigoConRetardo();
            return;
        }

        if (event.type === Blockly.Events.BLOCK_MOVE) {
            const cambioDePadre = event.oldParentId !== event.newParentId;
            const cambioDeHermano = event.oldNextBlockId !== event.newNextBlockId || event.oldPreviousBlockId !== event.newPreviousBlockId;

            if (cambioDePadre || cambioDeHermano) {
                generarCodigoConRetardo();
            }
        }
    });

    function generarCodigoConRetardo() {
        clearTimeout(timeoutGeneracion);

        timeoutGeneracion = setTimeout(() => {
            let codigoFinal = '';

            const topBlocks = workspace.getTopBlocks(true);

            topBlocks.forEach(block => {
                if (htmlGenerator.forBlock[block.type]) {
                    codigoFinal += htmlGenerator.blockToCode(block);
                }
            });

            console.log(`\n========== CÓDIGO FINAL ==========\n`);
            console.log(codigoFinal);
            console.log("====================================\n");
            let pene = document.getElementById('preview-iframe');
            pene.srcdoc = codigoFinal;
        }, 100);

    }
}

if (document.readyState === "complete" || document.readyState === "interactive") {
    inicializarToggleTema();
    inicializarEditor();
} else {
    document.addEventListener("DOMContentLoaded", () => {
        inicializarToggleTema();
        inicializarEditor();
    });
}




window.seleccionarLenguaje = function (nuevoLenguaje) {
    if (!workspace) return;
    const toolboxes = window.BlocklyData.toolboxes;
    if (toolboxes[nuevoLenguaje]) {
        workspace.updateToolbox(toolboxes[nuevoLenguaje]);
        lenguajeActual = nuevoLenguaje;
        const toolbox = workspace.getToolbox();
        if (toolbox && toolbox.getFlyout()) {
            toolbox.getFlyout().autoClose = false;
            toolbox.selectItemByPosition(0);
        }
        setTimeout(() => Blockly.svgResize(workspace), 50);

        document.getElementById('btnHtml').className = nuevoLenguaje === 'html' ? 'btn btn-dark active' : 'btn btn-outline-dark';
        document.getElementById('btnCss').className = nuevoLenguaje === 'css' ? 'btn btn-outline-dark' : 'btn btn-dark active';
    }
};

window.addEventListener('temaCambiado', (e) => {
    if (workspace) {
        workspace.setTheme(e.detail === 'dark' ? DarkTheme : ModernTheme);
    }
});