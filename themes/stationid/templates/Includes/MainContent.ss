<div id="Header">
	<h1><a href="/">Station Identification</a></h1>
</div>
<p id="description">An interactive exploration of the Twin Cities’ radio landscape from the top of the Foshay Tower.<br /><a href="/#content">Learn more &rarr;</a></p>
<% if ShowStream %>
	<div id='MediaPlayerWrap'>
		<div id='MediaPlayer'></div>
	</div>
	<script type="text/javascript">
	  jwplayer('MediaPlayer').setup({
	    'width': '100%',
	    'height': '24',
		'provider': 'rtmp',
		'file': 'mp3:broadcast1',
		'streamer': 'rtmp://fss27.streamhoster.com/lv_notioncollective',
		'autostart': true,
		'skin': '$ThemeDir/jwplayer/simple.zip',
		'controlbar.position': 'bottom',
		'modes': [
			{
				type: 'flash', 
				src: '$ThemeDir/jwplayer/player.swf'
			},
			{
				type: 'html5',
				config: {
					'file': 'http://fss27.streamhoster.com/lv_notioncollective/broadcast1/playlist.m3u8',
					'provider': 'video',
					'x-webkit-airplay': 'allow',
					'height': '100'
				}
			}
		]
	  });
	</script>
<% end_if %>
<div class="tweet"></div>
<ul id="links">
	<li id="twitter"><a href="http://twitter.com/station_id" target="_blank">Follow <span class="at">@</span><span class="twitter_handle">station_id</span> for updates</a></li>
	<li id="schedule"><a href="/schedule/">See what's playing (schedule)</a></li>
</ul>
