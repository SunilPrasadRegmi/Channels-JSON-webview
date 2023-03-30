<?php
$channelId = $_GET['channel'];
$channelsData = json_decode(file_get_contents('./channels.json'), true);
$selectedChannel = null;
foreach ($channelsData as $channel) {
  if ($channel['channel_name'] == $channelId) {
    $selectedChannel = $channel;
    break;
  }
}
if (!$selectedChannel) {
  echo 'Error: Invalid channel ID';
  exit;
}
$videoUrl = $selectedChannel['url'];
$videoTitle = $selectedChannel['channel_name'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $videoTitle ?></title>
  <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
  <link href="https://unpkg.com/@videojs/themes@1.0.1/dist/fantasy/index.css" rel="stylesheet" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script src="https://vjs.zencdn.net/7.11.4/video.js"></script>
  <style type="text/css">
  .vjs-fantasy .vjs-play-progress,
  .vjs-fantasy .vjs-volume-level { background-color: #1c9de3 }
  .vjs-fantasy .vjs-control-bar { font-size: 200% }
	    .channel-logo {
	      width: 100px;
	      height: 100px;
	    }
  </style>
  
  
  
</head>
<body>
	<div class="w3-content" style="max-width:1500px">
  <video id="my-video" class="video-js vjs-big-play-centered vjs-fantasy" controls preload="auto"
      data-setup='{"fluid": true}'>
    <source src="<?php echo $videoUrl ?>" type="application/x-mpegURL">
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
	  supports HTML5 video</a>
    </p>
  </video>
	<header class="w3-panel w3-center w3-opacity" style="padding:40px 16px">
		<h1 class="w3-xlarge">TAP TO PLAY</h1>
		<img class="channel-logo" src="<?php echo $channel['tvg-logo']; ?>" alt="<?php echo $channel['channel_name']; ?> logo">
    <h1><?php echo $videoTitle ?></h1>
	</header>
  <script>
    var player = videojs('my-video');
    player.on('fullscreenchange', function () {
      if (player.isFullscreen())
    });
  </script>
</body>
</html>
