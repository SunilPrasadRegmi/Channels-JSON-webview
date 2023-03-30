<!DOCTYPE html>
<html>
<head>
<title>LiveTV | Web</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<style>
	    .container {
	      display: flex;
	      flex-wrap: wrap;
	      justify-content: center;
	      align-items: center;
	      height: 100%;
	    }
	    .channel-box {
	      width: 104px;
	      height: 188px;
	      background-color: #ebedf0;
	      border: 2px solid black;
	      border-radius: 0px;
	      margin: 5px;
	      display: flex;
	      flex-direction: column;
	      justify-content: center;
	      align-items: center;
	      cursor: pointer;
	    }
	    .channel-logo {
	      width: 100px;
	      height: 100px;
	    }
	    .channel-name {
	      background-color: black;
	      color: white;
	      font-weight: bold;
	      height: 55px;
	      width: 100%;
	      padding-top: 0.3rem;
	      text-align: center;
	      bottom: 0%;
	    }
	    .group-title {
	      background-color: black;
	      color: white;
	      font-weight: bold;
	      height: 30px;
	      width: 100%;
	      padding-top: 0.3rem;
	      text-align: center;
	      bottom: 0%;
	    }
		.container {
			display: flex;
			justify-content: center;
			margin-top: 20px; 
		}
		.search {
			margin: 10px 0;
		}
		#search {
			padding: 8px;
			border: 2px solid black;
			width: 100%;
			max-width: 400px;
			font-size: 16px;
			transition: border-color 0.3s ease;
		}
		#search:focus {
			outline: none;
			border-color: #3498db;
		}
		#menuimg {
			max-height: 35px; 
			max-width: 100%; 
		}	
		#searchWrapper {
			display: flex;
			justify-content: center;
			margin-top: 20px;
		}
		#searchBar {
			width: 350px;
			height: 40px;
			font-size: 16px;
			border-radius: 3px;
			border: 2px solid black;
			padding: 5px;
			margin-right: 5px;
		}
  	</style>
</head>
<body>
	<div class="w3-content" style="max-width:1500px">
	<header class="w3-panel w3-center w3-opacity" style="padding:40px 16px">
		<h1 class="w3-xlarge">WEB VERSION OF</h1>
		<h1>LIVE TV</h1>
	</header>
	<div id="searchWrapper">
		<input id="searchBar" onkeyup="search_channels()" type="text" name="search" placeholder="Find a channel ...">
	</div>
	<div class="container">
<?php
   $json = file_get_contents('./channels.json');
   $channels = json_decode($json, true);
?>
<?php foreach ($channels as $channel): ?>
  <div class="channel-box">
    <div class="group-title">
	  <?php echo $channel['category']; ?> 
    </div>
    <a href="./player.php?channel=<?php echo $channel['channel_name']; ?>">
      <img class="channel-logo" src="<?php echo $channel['logo']; ?>" alt="<?php echo $channel['channel_name']; ?> logo">
    </a>
    <div class="channel-name">
      <?php echo $channel['channel_name']; ?>
    </div>
	</div>
<?php endforeach; ?>
	</div>
	</div>
	<footer class="w3-container w3-padding-20 w3-light-grey w3-center w3-large"> 
		<p>Made by <a href="http://sunilprasad.com.np/" target="_blank" class="w3-hover-text-green">Sunil Prasad</a><br>.
		A Project for Entertainment and Education</p>
</footer>
	<script>
		function search_channels() {
  let input = document.getElementById('searchBar').value.toLowerCase();
  let channelBoxes = document.getElementsByClassName('channel-box');

  for (let i = 0; i < channelBoxes.length; i++) {
    let channelName = channelBoxes[i].getElementsByClassName('channel-name')[0].innerHTML.toLowerCase();
    let groupTitle = channelBoxes[i].getElementsByClassName('group-title')[0].innerHTML.toLowerCase();
    if (channelName.includes(input) || groupTitle.includes(input)) {
      channelBoxes[i].style.display = "inline-block";
    } else {
      channelBoxes[i].style.display = "none";
    }
  }
}
	</script>
</body>
</html>