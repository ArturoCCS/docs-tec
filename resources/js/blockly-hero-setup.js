import * as Blockly from 'blockly';
import DarkTheme from '@blockly/theme-dark';
import ModernTheme from '@blockly/theme-modern';
import { esTemaOscuro } from './theme';

let workspace;
let lenguajeActual = 'html';

const contenedor = document.getElementById('blocklyHeroDiv');

function inicializarEditor() {
    if (!contenedor || !window.BlocklyData) return;

    Object.keys(window.BlocklyData.bloques).forEach(categoria => {
        const bloques = window.BlocklyData.bloques[categoria];
        if (bloques && bloques.length > 0) Blockly.common.defineBlocksWithJsonArray(bloques);
    });

    workspace = Blockly.inject(contenedor, {
        grid: window.BlocklyData.config.grid || { spacing: 20, length: 3, snap: true },
        zoom: window.BlocklyData.config.zoom || { controls: true, wheel: true },
        scrollbars: true
    });

    const temaActual = document.documentElement.getAttribute('data-theme');
    workspace.setTheme(esTemaOscuro(temaActual) ? DarkTheme : ModernTheme);

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

inicializarEditor();

if (contenedor) {
    window.seleccionarLenguaje = function (nuevoLenguaje) {
        lenguajeActual = nuevoLenguaje;
        document.getElementById('btnHtml').className = nuevoLenguaje === 'html' ? 'btn btn-dark active' : 'btn btn-outline-dark';
        document.getElementById('btnCss').className = nuevoLenguaje === 'css' ? 'btn btn-outline-dark' : 'btn btn-dark active';
    };
}

window.addEventListener('temaCambiado', (e) => {
    if (workspace) {
        workspace.setTheme(esTemaOscuro(e.detail) ? DarkTheme : ModernTheme);
    }
});