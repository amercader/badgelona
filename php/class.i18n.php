<?php
	//require_once ("i18n/strings.i18n.php");
	
	class i18n {
		
		public $availableLanguages = array("en","ca","es");
		
		public $currentLanguage;
		
		public $defaultLanguage = "en";
		
		private $strings = array();
		
		public function __construct($lang = false){
			$this->currentLanguage = $this->setLanguage($lang);
		}
		
		public function setLanguage($lang = false){
			
			$setCookie = true;
			
			//Check request parameter
			if (!$lang && isset($_GET["lang"])){
				$lang = $_GET["lang"];
			//Check cookie
			} else if (!$lang && isset($_COOKIE["badgelonaLang"])){
				$lang = $_COOKIE["badgelonaLang"];
				$setCookie = false;
			//Check user preferences
			} else {
				$userPreferences = $this->getUserPreferences();
				if ($userPreferences) $lang = substr($userPreferences[0],0,2);
			}
		
			//If not provided or not available, use default
			if (!$lang || !in_array($lang,$this->availableLanguages)) $lang = $this->defaultLanguage;
			
			//Load strings
			include "i18n/strings.i18n.php";
			$this->strings = $i18nStrings[$lang];
			
			//Set cookie
			if ($setCookie){
				$this->setLanguageCookie($lang);
			}
			
			$this->currentLanguage = $lang;
			
			return $this->currentLanguage;
			
			
		}
		
		public function getString($key){
			return $this->strings[$key];
		}
		
		
		private function setLanguageCookie($lang){

			//$time = ($expires) ? time()+60*60*24*$expires : false;
			$time = ($expires) ? time()+60*60*24*365 : false;

			return setcookie("badgelonaLang", $lang, $time, "/");		
		}
		
		// Thanks to http://www.thefutureoftheweb.com/blog/use-accept-language-header
		public function getUserPreferences(){
			$langs = array();

			if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
				// break up string into pieces (languages and q factors)
				preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);

				if (count($lang_parse[1])) {
					// create a list like "en" => 0.8
					$langs = array_combine($lang_parse[1], $lang_parse[4]);
					
					// set default to 1 for any without q factor
					foreach ($langs as $lang => $val) {
						if ($val === '') $langs[$lang] = 1;
					}

					// sort list based on value	
					arsort($langs, SORT_NUMERIC);
				}
			}

			return $langs;
			
		}
		
		}
/*
function getParameter($name, $default = false, $from = false) {
    if ($from === false) $from = $_REQUEST;
    reset($from);
    while (list($key, $value) = each($from)) {
        if (strcasecmp($key, $name) == 0) return $value;
    }
    return $default;
}

function setUserCookie($name,$value = false,$expires = 0,$path = "/",$domain = false,$secure = false) {
    if (!$name) return false;

    $time = ($expires) ? time()+60*60*24*$expires : false;

    return setcookie($name, $value, $time, $path, $domain, $secure);
}		
		
		
	}
	*/
	
	
?>