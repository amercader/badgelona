<?php
	
	require_once("../php/class.i18n.php");
	
	$common = new common();
	$lang = new i18n();
	
	
	//Available pages
	$pages = array(
		"home" => array("jquery","slider","main"),
		"gallery" => array("jquery","main"),
		"contact" => array()
		); 
	
	$page = $common->getParameter("page","home",$_GET);

	if (!in_array($page,array_keys($pages))) $page = "home";

	$includes = "";
	if (in_array("jquery",$pages[$page]))
		$includes .= "<script src=\"js/jquery-1.4.2.min.js\" type=\"text/javascript\"></script>\n";
	
	if (in_array("slider",$pages[$page]))
		$includes .= "<link rel=\"stylesheet\" href=\"css/nivo-slider.css\" type=\"text/css\" media=\"screen\" />\n<script src=\"js/jquery.nivo.slider.js\" type=\"text/javascript\"></script>\n";
	
	if (in_array("main",$pages[$page]))
		$includes .= "<script src=\"js/main.js\" type=\"text/javascript\"></script>\n";
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang->currentLanguage; ?>" lang="<?php echo $lang->currentLanguage; ?>">
  <head>
    <title><?php echo $lang->getString("generic_title"); ?></title>
    <meta name="keywords" content="Badgelona, Badges, Barcelona" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel='shortcut icon' href="img/favicon.ico" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
	
	<?php echo $includes; ?>
	
  </head>
  <body>
		
	<?php include("pages/common.header.php"); ?>
	
    <div id="main">
		<?php 
			if(file_exists("pages/page.".$page.".php")){
				include("pages/page.".$page.".php");
			} else {
				include("pages/page.home.php");
			}
		?>
	</div>
	
	<?php include("pages/common.footer.php"); ?>
	
  </body>
</html>
