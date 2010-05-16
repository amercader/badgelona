<?php

	require_once("../php/class.i18n.php");
	
	$lang = new i18n();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang->currentLanguage; ?>" lang="<?php echo $lang->currentLanguage; ?>">
  <head>
    <title><?php echo $lang->getString("generic_title"); ?></title>
    <meta name="keywords" content="Badgelona, Badges, Barcelona" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel='shortcut icon' href="img/favicon.ico" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>	

  </head>
  <body>
    <div id="header">
      <img src="img/badgelona_logo_400.png" alt="<?php echo $lang->getString("generic_title"); ?>" title="<?php echo $lang->getString("generic_title"); ?>" />
	  <div id="lang"> <a href="./?lang=en" title="English">en</a> | <a href="./?lang=ca" title="Catal&agrave;">ca</a> | <a href="./?lang=es" title="Espa&ntilde;ol">es</a> </div>
    </div>
    <div id="top-menu">
      <div class="active"><?php echo $lang->getString("menu_home"); ?></div>
	  <div><a href="gallery.php"><?php echo $lang->getString("menu_gallery"); ?></a></div>
      <div><a href="contact.php"><?php echo $lang->getString("menu_contact"); ?></a></div>
      <div id="top-menu-twitter"><a href="http://twitter.com/badgelona"><?php echo $lang->getString("menu_twitter"); ?></a></div>
    </div>
    <div id="main">
	
		<div id="main-left">
			<p><?php echo $lang->getString("home_welcome_1"); ?></p>
			<p><?php echo $lang->getString("home_welcome_2"); ?></p>
			<p><?php echo $lang->getString("home_welcome_3"); ?></p>	
			<img src="img/box_web_small.png" alt="<?php echo $lang->getString("home_box"); ?>" title="<?php echo $lang->getString("home_box"); ?>" />
		</div>
		
		<div id="main-right">
			<div id="slider">
				<img src="pic/slide/slide_1.jpg" alt="slide_1" />
				<img src="pic/slide/slide_2.jpg" alt="slide_2" />
				<img src="pic/slide/slide_3.jpg" alt="slide_3" />
				<img src="pic/slide/slide_4.jpg" alt="slide_4" />
				<img src="pic/slide/slide_5.jpg" alt="slide_5" />
				<img src="pic/slide/slide_6.jpg" alt="slide_6" />
			</div>
		</div>
	
	</div>

	<div id="footer">
      &copy; 2010 badgelona
    </div>
  </body>
</html>
