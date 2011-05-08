/* Author: The Notion Collective

*/

(function($){
	console.log($('#ScrollingContent').height());
	
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
				$('#Background').css('background-position', arrayToPxDimensions([default_bg_pos[0], bg_height]));
				
		// light positioning
		var new_light_top = light_top - ($(this).scrollTop()/REAR_PARRALAX);
		// console.log('New light top: '+new_light_top);
		$('#light').css('top', new_light_top + 'px');
		// console.log('Actual light top: '+$('#light').css('top'))

	});
})(this.jQuery);





















