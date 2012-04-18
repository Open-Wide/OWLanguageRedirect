<?php 
class owLanguageRedirect {

	protected function redirect(  ) {
		// get current locale
		$ini = eZINI::instance();
		$currentLocale = $ini->variable('RegionalSettings','ContentObjectLocale');
		$currentLocale = strtolower( substr($currentLocale, 0, 2) );
			
		// get user locale (browser or cookie)
		$userLocale = isset( $_COOKIE['locale'] ) ? $_COOKIE['locale'] : substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
		
		if ( $currentLocale != $userLocale ) {
				
			// get settings array ([language] => siteaccess)
			$languageRedirectArray = $ini->variable('RegionalSettings','LanguageRedirect');
	
			// redirect if necessary
			if ( isset( $languageRedirectArray[$userLocale] ) ) {
				$http = eZHTTPTool::instance();
				$http->redirect( "/switchlanguage/to/" . $languageRedirectArray[$userLocale] . $_SERVER['REQUEST_URI'] );
				return false;
			} else {
				return false;
			}
			
		}
	
		return false;
	}
}

?>