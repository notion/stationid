<div id="Header">
	<h1><a href="/">Station Identification</a></h1>
</div>
<% if ShowStream %>
	<div id='MediaPlayerWrap'>
		<div id='MediaPlayer'></div>
	</div>
	<script type="text/javascript">
	  jwplayer('MediaPlayer').setup({
	    'flashplayer': '$ThemeDir/jwplayer/player.swf',
	    'id': 'playerID',
	    'width': '238',
	    'height': '24',
	    //'file': '$ThemeDir/jwplayer/video.mp4',
		'file': 'mp4:broadcast1',
		'streamer': 'rtmp://fss27.streamhoster.com/lv_notioncollective',
		'type': 'rtmp',
		'autostart': true,
		'skin': '$ThemeDir/jwplayer/simple.zip'
	  });
	</script>
<% end_if %>
<p id="description">An interactive exploration of the Twin Cities’ radio landscape from the top of the Foshay Tower.<br /><a href="/#content">Learn more &rarr;</a></p>
<ul id="links">
	<li id="call-for-entries"><a href="/call-for-entries/">Call for broadcast submissions</a></li>
	<li id="twitter"><a href="http://twitter.com/station_id" target="_blank">Follow <span class="at">@</span><span class="twitter_handle">station_id</span> for updates</a></li>
</ul>
