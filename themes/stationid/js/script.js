/* Author: The Notion Collective

*/

(function($){
	// console.log($('#ScrollingContent').height());
	
	var REAR_PARRALAX = 5;
	var PERSPECTIVE = 2;
	
	// background positioning
	var default_bg_pos = pxDimensionsToArray($('#Background').css('background-position'));
	
	// light positioning
	var light_top_px = $('#light').css('top');
	// convert to decimal
	var light_top = parseFloat(light_top_px.slice(0, light_top_px.length-2));
	// console.log(light_top);
	$(window).scroll(function(e) {
		// background positioning
		var bg_height = default_bg_pos[1];
		bg_height = (default_bg_pos[1] - $(this).scrollTop())/REAR_PARRALAX;
		// console.log(pxDimensionsToArray($('#Background').css('background-position')));
		$('#Background').css('background-position', arrayToPxDimensions([default_bg_pos[0], bg_height]));
				
		// light positioning
		var new_light_top = light_top - ($(this).scrollTop()/REAR_PARRALAX);
		// console.log('New light top: '+new_light_top);
		$('#light').css('top', new_light_top + 'px');
		// console.log('Actual light top: '+$('#light').css('top'))

	});
})(this.jQuery);

function pxDimensionsToArray(string) {
	// console.log(string);
	// convert string to array
	var array = string.split(' ');
	// remove 'px' and convert to numbers
	jQuery.each(array, function(i, s) {
		if(array[i].charAt(s.length-1) == "%") {
			array[i] = parseFloat(s.slice(0, s.length-1));
		} else {
			array[i] = parseFloat(s.slice(0, s.length-2));
		}
	});	
	return array;
}

function arrayToPxDimensions(array) {
	jQuery.each(array, function(i, n) {
		array[i] = n+'px'
	});
	var string = array.join(' ');
	
	return string;
}




















