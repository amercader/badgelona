    <div id="header">
      <img src="img/badgelona_logo_400.png" alt="<?php echo $lang->getString("generic_title"); ?>" title="<?php echo $lang->getString("generic_title"); ?>" />
	  <div id="lang"> <a href="./?lang=en" title="English">en</a> | <a href="./?lang=ca" title="Catal&agrave;">ca</a> | <a href="./?lang=es" title="Espa&ntilde;ol">es</a> </div>
    </div>
	
    <div id="top-menu">
		<?php 
			foreach ($pages as $key => $value){
				$caption = $lang->getString("menu_".$key);
				if ($key == $page){
					echo "<div class=\"active\">".$caption."</div>";
				} else {
					echo "<div><a href=\"?page=".$key."\">".$caption."</a></div>";
				}
			}
		?>

      <div id="top-menu-twitter"><a href="http://twitter.com/badgelona"><?php echo $lang->getString("menu_twitter"); ?></a></div>
    </div>