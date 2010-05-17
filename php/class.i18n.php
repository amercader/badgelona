<?php
	
	class i18n {
		
		private $requestParameterName = "lang";
		
		private $cookieName = "badgelonaLang";

		public $defaultLanguage = "en";
		
		public $availableLanguages = array("en","ca","es");
		
		public $currentLanguage;

		private $strings = array();
		
		public function __construct($lang = false){
			$this->currentLanguage = $this->setLanguage($lang);
		}
		
		public function setLanguage($lang = false){
			
			$setCookie = true;

			if (!$lang){
				//Check request parameter
				$requestLang = $this->getParameter($this->requestParameterName,false,$_GET);
				if ($requestLang){
					$lang = $requestLang;
				
				} else {
				//Check cookie
				$cookieLang = $this->getParameter($this->cookieName,false,$_COOKIE);
					if ($cookieLang){
						$lang = $cookieLang;
						$setCookie = false;
					//Check user preferences
					} else {
						$userPreferences = $this->getUserPreferences();
						if ($userPreferences) $lang = substr($userPreferences[0],0,2);
					
					}
				}
			}

			//If not provided or not available, use default language
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

			$time = ($expires) ? time()+60*60*24*365 : false;

			return setcookie($this->cookieName, $lang, $time, "/");		
		}
		
		// Thanks to http://www.thefutureoftheweb.com/blog/use-accept-language-header
		public function getUserPreferences($getNumericValues = false){
			$langs = array();
			
			$acceptLanguage = $this->getParameter("HTTP_ACCEPT_LANGUAGE",false,$_SERVER);
			if ($acceptLanguage) {
				// break up string into pieces (languages and q factors)
				preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $acceptLanguage, $langParse);

				if (count($langParse[1])) {
					// create a list like "en" => 0.8
					$langs = array_combine($langParse[1], $langParse[4]);
					
					// set default to 1 for any without q factor
					foreach ($langs as $lang => $val) {
						if ($val === '') $langs[$lang] = 1;
					}

					// sort list based on value	
					arsort($langs, SORT_NUMERIC);
					if (!$getNumericValues) $langs = array_keys($langs);
				}
			}

			return $langs;
			
		}
		
		private function getParameter($name, $default = false, $from = false) {
			if ($from === false) $from = $_REQUEST;
			reset($from);
			while (list($key, $value) = each($from)) {
				if (strcasecmp($key, $name) == 0) return $value;
			}
			return $default;
		}
		
		
		}

	
?>