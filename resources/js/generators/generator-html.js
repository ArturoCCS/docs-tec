window.htmlGenerator = new Blockly.Generator('HTML_WEB');
htmlGenerator.INDENT = '  ';

htmlGenerator.scrub_ = function(block, code, opt_thisOnly) {
    const nextBlock = block.nextConnection && block.nextConnection.targetBlock();
    let nextCode = '';
    if (nextBlock && !opt_thisOnly) {
        // Si el siguiente bloque es de HTML, usamos htmlGenerator
        if (htmlGenerator.forBlock[nextBlock.type]) {
            nextCode = htmlGenerator.blockToCode(nextBlock);
        } 
        // ¡IMPORTANTE! Si el siguiente bloque es de CSS, usamos cssGenerator
        else if (cssGenerator.forBlock[nextBlock.type]) {
            nextCode = cssGenerator.blockToCode(nextBlock);
        }
        // Si no es ninguno, intentamos seguir recorriendo
        else {
            nextCode = htmlGenerator.scrub_(nextBlock, '', opt_thisOnly);
        }
    }
    return code + nextCode;
};


// Añade esta función de respaldo para bloques que no pertenecen a HTML
htmlGenerator.forBlock['css_selector'] = function(block) { return cssGenerator.forBlock['css_selector'](block); };
htmlGenerator.forBlock['css_color'] = function(block) { return cssGenerator.forBlock['css_color'](block); };
htmlGenerator.forBlock['css_background_color'] = function(block) { return cssGenerator.forBlock['css_background_color'](block); };
htmlGenerator.forBlock['css_font_size'] = function(block) { return cssGenerator.forBlock['css_font_size'](block); };
htmlGenerator.forBlock['css_margin'] = function(block) { return cssGenerator.forBlock['css_margin'](block); };
htmlGenerator.forBlock['css_padding'] = function(block) { return cssGenerator.forBlock['css_padding'](block); };
htmlGenerator.forBlock['css_border'] = function(block) { return cssGenerator.forBlock['css_border'](block); };


htmlGenerator.forBlock['html_style'] = function(block) {
    // Cambia 'CSS_RULES' por 'CONTENT' para que coincida con el JSON
    const cssContent = cssGenerator.statementToCode(block, 'CONTENT'); 
    return `<style>\n${cssContent}</style>\n`;
};
htmlGenerator.forBlock['html_doctype'] = function(block) { return '<!DOCTYPE html>\n'; };
htmlGenerator.forBlock['html_root'] = function(block) {
    const inner = htmlGenerator.statementToCode(block, 'CONTENT');
    return `<html lang="es">\n${inner}</html>\n`;
};
htmlGenerator.forBlock['html_head'] = function(block) {
    const inner = htmlGenerator.statementToCode(block, 'CONTENT');
    return `<head>\n${inner}</head>\n`;
};
htmlGenerator.forBlock['html_title'] = function(block) {
    const text = block.getFieldValue('TEXT');
    return `<title>${text}</title>\n`;
};
htmlGenerator.forBlock['html_body'] = function(block) {
    const inner = htmlGenerator.statementToCode(block, 'CONTENT');
    return `<body>\n${inner}</body>\n`;
};
htmlGenerator.forBlock['html_heading'] = function(block) {
    const tag = block.getFieldValue('TAG');
    const text = block.getFieldValue('TEXT');
    return `<${tag}>${text}</${tag}>\n`;
};
htmlGenerator.forBlock['html_paragraph'] = function(block) {
    const text = block.getFieldValue('TEXT');
    return `<p>${text}</p>\n`;
};
htmlGenerator.forBlock['html_div'] = function(block) {
    const inner = htmlGenerator.statementToCode(block, 'CONTENT');
    return `<div>\n${inner}</div>\n`;
};