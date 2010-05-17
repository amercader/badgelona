<?php
	
	class common {
		

		public function getParameter($name, $default = false, $from = false) {
			if ($from === false) $from = $_REQUEST;
			reset($from);
			while (list($key, $value) = each($from)) {
				if (strcasecmp($key, $name) == 0) return $value;
			}
			return $default;
		}
		
		/**
		 *	Sets a cookie in the client's browser
		 * @param string $name Cookie name
		 * @param variant $value Cookie value. Can be none
		 * @param integer $expires The time at which the cookie expires, in days. If no one is provided, cookie expires at the end of the session
		 * @param string $path The path on the server in which the cookie will be available (false -> current directory, '/' -> entire domain)
		 * @param string $domain The domain that the cookie is available (Important with subdomains!)
		 * @param boolean $secure If true, cookie will be only be transmitted over a secure HTTPS connection
		 * @return boolean True if sent, false otherwise
		 */
		public function setBrowserCookie($name,$value = false,$expires = 0,$path = "/",$domain = false,$secure = false) {
			if (!$name) return false;

			$time = ($expires) ? time()+60*60*24*$expires : false;

			return setcookie($name, $value, $time, $path, $domain, $secure);
		}
		
		
	}

	
?>