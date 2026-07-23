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


cssGenerator.forBlock['css_selector'] = function(block) {
    const selector = block.getFieldValue('SELECTOR');
    const rules = cssGenerator.statementToCode(block, 'RULES');
    return `${selector} {\n${rules}}\n`;
};

cssGenerator.forBlock['css_color'] = function(block) {
    const color = block.getFieldValue('COLOR');
    return `color: ${color};\n`;
};

cssGenerator.forBlock['string_length'] = function(block) {
    const color = block.getFieldValue('VALUE');
    return `color: ${color};\n`;
};

cssGenerator.forBlock['css_background_color_color'] = function(block) {
    const color = block.getFieldValue('COLOR');
    return `background-color: ${color};\n`;
};

cssGenerator.forBlock['css_font_size'] = function(block) {
    const size = block.getFieldValue('SIZE');
    return `font-size: ${size}px;\n`;
};

cssGenerator.forBlock['css_margin'] = function(block) {
    const value = block.getFieldValue('VALUE');
    return `margin: ${value}px;\n`;
};

cssGenerator.forBlock['css_padding'] = function(block) {
    const value = block.getFieldValue('VALUE');
    return `padding: ${value}px;\n`;
};

cssGenerator.forBlock['css_border'] = function(block) {
    const width = block.getFieldValue('WIDTH');
    const style = block.getFieldValue('STYLE');
    const color = block.getFieldValue('COLOR');
    return `border: ${width}px ${style} ${color};\n`;
};