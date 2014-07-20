/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

// Overriding client side functionality:

/*
// Example - Overriding the replaceCustomCommands method:
ajaxChat.replaceCustomCommands = function(text, textParts) {
	return text;
}
 */
  //Replace stuff people say:
ajaxChat.replaceCustomText = function(text) {
    text = text.replace(/fuck/gi, 'sheep');
    text = text.replace(/fuk/gi, 'sheepy');
    text = text.replace(/hello/gi, 'good morning');
    text = text.replace(/fag/gi, 'froggy');
    text = text.replace(/fuc/gi, 'sheepyyy');
    text = text.replace(/fk/gi, 'bobby');
    text = text.replace(/cunt/gi, 'quack');
    text = text.replace(/kunt/gi, 'poo');
    text = text.replace(/kient/gi, 'poopoo');
    text = text.replace(/cnt/gi, 'meow');
    text = text.replace(/uck/gi, 'ack');
    text = text.replace(/shit/gi, 'poopy');


    return text;
}

