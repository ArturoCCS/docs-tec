import * as Blockly from 'blockly';
import DarkTheme from '@blockly/theme-dark';
import ModernTheme from '@blockly/theme-modern';

window.cssGenerator = new Blockly.Generator('CSS_WEB');
cssGenerator.INDENT = '  ';

cssGenerator.scrub_ = function(block, code, opt_thisOnly) {
    const nextBlock = block.nextConnection && block.nextConnection.targetBlock();
    let nextCode = '';
    if (nextBlock && !opt_thisOnly) {
        if (cssGenerator.forBlock[nextBlock.type]) {
            nextCode = cssGenerator.blockToCode(nextBlock);
        } else {
            nextCode = cssGenerator.scrub_(nextBlock, '', opt_thisOnly);
        }
    }
    return code + nextCode;
};

window.htmlGenerator = new Blockly.Generator('HTML_WEB');
htmlGenerator.INDENT = '  ';

htmlGenerator.scrub_ = function(block, code, opt_thisOnly) {
    const nextBlock = block.nextConnection && block.nextConnection.targetBlock();
    let nextCode = '';
    if (nextBlock && !opt_thisOnly) {
        if (htmlGenerator.forBlock[nextBlock.type]) {
            nextCode = htmlGenerator.blockToCode(nextBlock);
        } else if (cssGenerator.forBlock[nextBlock.type]) {
            nextCode = cssGenerator.blockToCode(nextBlock);
        } else {
            nextCode = htmlGenerator.scrub_(nextBlock, '', opt_thisOnly);
        }
    }
    return code + nextCode;
};

htmlGenerator.forBlock['html_heading'] = function(block) {
    const tag = block.getFieldValue('TAG') || 'h1';
    const text = block.getFieldValue('TEXT') || '';
    return `<${tag}>${text}</${tag}>\n`;
};

let workspace;
let lenguajeActual = 'html';

function aplicarTema(esOscuro) {
    const temaString = esOscuro ? 'dark' : 'light';
    document.documentElement.setAttribute('data-theme', temaString);
    localStorage.setItem('theme-preference', temaString);
    if (workspace) {
        workspace.setTheme(esOscuro ? DarkTheme : ModernTheme);
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
        grid: window.BlocklyData.config.grid || { spacing: 20, length: 3, snap: true },
        zoom: window.BlocklyData.config.zoom || { controls: true, wheel: true },
        scrollbars: true
    });

    const esOscuro = document.documentElement.getAttribute('data-theme') === 'dark';
    workspace.setTheme(esOscuro ? DarkTheme : ModernTheme);

    const xmlPrecargado = `
        <xml xmlns="https://developers.google.com/blockly/xml">
            <block type="html_heading" x="40" y="40">
                <field name="TAG">h1</field>
                <field name="TEXT">Construye código arrastrando bloques</field>
            </block>
        </xml>
    `;
    
    try {
        const dom = Blockly.utils.xml.textToDom(xmlPrecargado);
        Blockly.Xml.domToWorkspace(dom, workspace);
    } catch (e) {
        console.error("Error al precargar bloques:", e);
    }

    Blockly.svgResize(workspace);
    setTimeout(() => Blockly.svgResize(workspace), 100);
    window.addEventListener('resize', () => Blockly.svgResize(workspace));


    let timeoutGeneracion = null;

    workspace.addChangeListener((event) => {
        if (event.type === Blockly.Events.UI) return;
        
        if (event.type === Blockly.Events.BLOCK_CREATE ||
            event.type === Blockly.Events.BLOCK_CHANGE ||
            event.type === Blockly.Events.BLOCK_DELETE ||
            event.type === Blockly.Events.BLOCK_MOVE) {
            
            sincronizarVista();
        }
    });

    function sincronizarVista() {
        clearTimeout(timeoutGeneracion);

        timeoutGeneracion = setTimeout(() => {
            const tituloHero = document.getElementById('hero-title');
            if (!tituloHero) return;

            const todosLosBloques = workspace.getAllBlocks(false);
            const bloqueTitulo = todosLosBloques.find(b => b.type === 'html_heading');

            if (bloqueTitulo) {
                const textoBloque = bloqueTitulo.getFieldValue('TEXT') || '';
                
                let htmlParaMostrar = textoBloque;
                if (textoBloque.includes('arrastrando bloques')) {
                    htmlParaMostrar = textoBloque.replace('arrastrando bloques', '<span class="text-primary">arrastrando bloques</span>');
                }
                
                tituloHero.innerHTML = htmlParaMostrar;
            } else {
                tituloHero.innerHTML = '';
            }
        }, 100);
    }

    sincronizarVista();
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
    lenguajeActual = nuevoLenguaje;
    document.getElementById('btnHtml').className = nuevoLenguaje === 'html' ? 'btn btn-dark active' : 'btn btn-outline-dark';
    document.getElementById('btnCss').className = nuevoLenguaje === 'css' ? 'btn btn-outline-dark' : 'btn btn-dark active';
};

window.addEventListener('temaCambiado', (e) => {
    if (workspace) {
        workspace.setTheme(e.detail === 'dark' ? DarkTheme : ModernTheme);
    }
});