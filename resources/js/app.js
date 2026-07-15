if (document.getElementById('blocklyDiv')) {
    
    const inicializarBlockly = async () => {
        try {
            await import('./blockly-generators.js');
            await import('./blockly-setup.js');
            console.log('¡Módulos de Blockly cargados en orden con éxito!');
        } catch (error) {
            console.error('Error cargando los scripts de Blockly:', error);
        }
    };

    inicializarBlockly();
}