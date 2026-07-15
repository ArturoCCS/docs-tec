import * as Blockly from 'blockly';

let workspace;
let lenguajeActual = 'html';

function inicializarEditor() {
    if (!window.BlocklyData) {
        console.error("BlocklyData no está disponible en window.");
        return;
    }

    Object.keys(window.BlocklyData.bloques).forEach(categoria => {
        const bloques = window.BlocklyData.bloques[categoria];
        if (bloques && bloques.length > 0) {
            Blockly.common.defineBlocksWithJsonArray(bloques);
            console.log(`¡Bloques de [${categoria.toUpperCase()}] registrados!`);
        }
    });

    workspace = Blockly.inject('blocklyDiv', {
        toolbox: window.BlocklyData.toolboxes['html'],
        grid: window.BlocklyData.config.grid || { spacing: 20, length: 3, snap: true },
        zoom: window.BlocklyData.config.zoom || { controls: true, wheel: true },
        scrollbars: true
    });

    const toolbox = workspace.getToolbox();
    if (toolbox && toolbox.getFlyout()) {
        toolbox.getFlyout().autoClose = false;

        const primeraCategoria = toolbox.getToolboxItems()[0];
        if (primeraCategoria) {
            toolbox.selectItemByPosition(0);
        }
    }

    Blockly.svgResize(workspace);
    setTimeout(() => {
        Blockly.svgResize(workspace);
    }, 100);

    window.addEventListener('resize', () => Blockly.svgResize(workspace));

    const btnVer = document.getElementById('btnVer');
    if (btnVer) {
        btnVer.addEventListener('click', () => {
            const topBlocks = workspace.getTopBlocks(true);
            let codigoGenerado = '';

            if (lenguajeActual === 'html') {
                topBlocks.forEach(block => {
                    if (htmlGenerator.forBlock[block.type]) {
                        codigoGenerado += htmlGenerator.blockToCode(block);
                    }
                });
                console.log("%c=== HTML GENERADO ===", "color: #4CAF50; font-weight: bold;", codigoGenerado);
                alert('Código HTML generado en consola.');

            } else if (lenguajeActual === 'css') {
                topBlocks.forEach(block => {
                    if (cssGenerator.forBlock[block.type]) {
                        codigoGenerado += cssGenerator.blockToCode(block);
                    }
                });
                console.log("%c=== CSS GENERADO ===", "color: #2196F3; font-weight: bold;", codigoGenerado);
                alert('Código CSS generado en consola.');
            }
        });
    }
}

if (document.readyState === "complete" || document.readyState === "interactive") {
    inicializarEditor();
} else {
    document.addEventListener("DOMContentLoaded", inicializarEditor);
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

        setTimeout(() => {
            Blockly.svgResize(workspace);
        }, 50);

        const btnHtml = document.getElementById('btnHtml');
        const btnCss = document.getElementById('btnCss');

        if (nuevoLenguaje === 'html') {
            btnHtml.className = 'btn btn-dark active';
            btnCss.className = 'btn btn-outline-dark';
        } else if (nuevoLenguaje === 'css') {
            btnHtml.className = 'btn btn-outline-dark';
            btnCss.className = 'btn btn-dark active';
        }
    }
};