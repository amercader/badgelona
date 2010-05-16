<?php

	require_once("../php/class.i18n.php");
	
	$lang = new i18n();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang->currentLanguage; ?>" lang="<?php echo $lang->currentLanguage; ?>">
  <head>
    <title>Badgelona!</title>
    <meta name="keywords" content="Badgelona, Badges, Barcelona" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel='shortcut icon' href="img/favicon.ico" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
	
	<!--<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>-->
	<!--<script src="js/main.js" type="text/javascript"></script>-->

  </head>
  <body>
    <div id="header">
      <img src="img/badgelona_logo_400.png" alt="Badgelona!" title="Badgelona!" />
	  <div id="lang"> <a href="./?lang=en" title="English">en</a> | <a href="./?lang=ca" title="Catal&agrave;">ca</a> | <a href="./?lang=es" title="Espa&ntilde;ol">es</a> </div>
    </div>
    <div id="top-menu">
      <div><a href="index.php"><?php echo $lang->getString("menu_home"); ?></a></div>
	  <div><a href="gallery.php"><?php echo $lang->getString("menu_gallery"); ?></a></div>
      <div class="active"><?php echo $lang->getString("menu_contact"); ?></div>
      <div id="top-menu-twitter"><a href="http://twitter.com/badgelona"><?php echo $lang->getString("menu_twitter"); ?></a></div>
    </div>
    <div id="main">
			<p><?php echo $lang->getString("contact_1"); ?></p>
			<p><?php echo $lang->getString("contact_2"); ?></p>
			<p><?php echo $lang->getString("contact_3"); ?></p>
		<div id="email">badgelona <img src="img/pig_small.png" alt="oink!" title="oink!" /> gmail.com</div>
		
	</div>

	<div id="footer">
      &copy; 2010 badgelona
    </div>
  </body>
</html>
