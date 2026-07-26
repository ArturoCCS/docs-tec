import './theme.js';
import('./animated/index.js');

const necesitaBlockly = document.getElementById('blocklyDiv') || document.getElementById('blocklyHeroDiv');

if (necesitaBlockly) {
    const inicializarBlockly = async () => {
        try {
            await import('./blockly-generators.js');

            if (document.getElementById('blocklyDiv')) {
                await import('./blockly-setup.js');
            }

            if (document.getElementById('blocklyHeroDiv')) {
                await import('./blockly-hero-setup.js');
            }

            console.log('¡Módulos de Blockly cargados en orden con éxito!');
        } catch (error) {
            console.error('Error cargando los scripts de Blockly:', error);
        }
    };
    inicializarBlockly();
}