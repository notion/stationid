
// remap jQuery to $
(function($){
	console.log($('#ScrollingContent').height());
	
	var REAR_PARRALAX = 5;
	var PERSPECTIVE = 2;
	
	// background positioning
	var default_bg_pos = pxDimensionsToArray($('#Background').css('background-position'));
	
	// light positioning
	var light_top_percent = $('#light').css('top');
	// convert to decimal
	var light_top_decimal = parseFloat('.'+light_top_percent.slice(0, light_top_percent.length-1));
	var light_top = light_top_decimal * $(window).height();
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

function pxDimensionsToArray(string) {
	// convert string to array
	var array = string.split(' ');
	// remove 'px' and convert to numbers
	jQuery.each(array, function(i, s) {
		array[i] = parseFloat(s.slice(0, s.length-2));
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

// usage: log('inside coolFunc',this,arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};



// catch all document.write() calls
(function(doc){
  var write = doc.write;
  doc.write = function(q){ 
    log('document.write(): ',arguments); 
    if (/docwriteregexwhitelist/.test(q)) write.apply(doc,arguments);  
  };
})(document);


