<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <% base_tag %>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>$SiteConfig.Title // $SiteConfig.Tagline</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="shortcut icon" href="/favicon.gif">
  <link rel="apple-touch-icon" href="$ThemeDir/images/apple-touch-icon.png">


  <!-- CSS : implied media="all" -->
	<link href="http://fast.fonts.com/cssapi/c24845b9-2bfa-4bd3-95cd-64f9ec0a3b11.css" rel="stylesheet" type="text/css" />

  <!-- <link rel="stylesheet" href="$ThemeDir/css/style.css?v=2"> -->

  <!-- <link rel="stylesheet" media="handheld" href="$ThemeDir/css/handheld.css?v=2"> -->

	<link rel="stylesheet" href="$ThemeDir/css/core.css" media="screen"/> 
	<link rel="stylesheet" href="$ThemeDir/css/handheld.css" media="handheld, only screen and (max-device-width:480px)"/>
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="$ThemeDir/js/libs/modernizr-1.6.min.js"></script>
	<!-- <script type="text/javascript" src="http://fast.fonts.com/jsapi/c24845b9-2bfa-4bd3-95cd-64f9ec0a3b11.js"></script></head> -->

<body>
	$Form
	$Layout
  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="$ThemeDir/js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>
  
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="$ThemeDir/js/plugins.js"></script>
  <script src="$ThemeDir/js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="$ThemeDir/js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

  <!-- yui profiler and profileviewer - remove for production -->
  <script src="$ThemeDir/js/profiling/yahoo-profiling.min.js"></script>
  <script src="$ThemeDir/js/profiling/config.js"></script>
  <!-- end profiling code -->


  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet 
       change the UA-XXXXX-X to be your site's ID -->
  <script>
   var _gaq = [['_setAccount', 'UA-23301250-1'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script>
  
</body>
</html>