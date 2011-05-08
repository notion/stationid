
// remap jQuery to $
(function($){
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


