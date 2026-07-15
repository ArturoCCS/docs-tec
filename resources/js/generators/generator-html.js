window.htmlGenerator = new Blockly.Generator('HTML_WEB');
htmlGenerator.INDENT = '  ';

htmlGenerator.scrub_ = function(block, code, opt_thisOnly) {
    const nextBlock = block.nextConnection && block.nextConnection.targetBlock();
    let nextCode = '';
    if (nextBlock && !opt_thisOnly) {
        if (htmlGenerator.forBlock[nextBlock.type]) {
            nextCode = htmlGenerator.blockToCode(nextBlock);
        } else {
            nextCode = htmlGenerator.scrub_(nextBlock, '', opt_thisOnly);
        }
    }
    return code + nextCode;
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