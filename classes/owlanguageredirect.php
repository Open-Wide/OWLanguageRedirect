<?php 

//
// ## BEGIN COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
// SOFTWARE NAME: OWLanguageRedirect
// SOFTWARE RELEASE: 1.0
// POWERED BY: OpenWide http://www.openwide.fr/
// SOFTWARE LICENSE: GNU General Public License v2.0
// NOTICE: >
//  This program is free software; you can redistribute it and/or
//  modify it under the terms of version 2.0  of the GNU General
//  Public License as published by the Free Software Foundation.
//
//  This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of version 2.0 of the GNU General
//  Public License along with this program; if not, write to the Free
//  Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//  MA 02110-1301, USA.
// ## END COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
//

class owLanguageRedirect {

	public function redirect(  ) {
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
				
				$requestUri = $_SERVER['REQUEST_URI'];
				
				// Get system prefix
				$sys = eZSys::instance();
        		$dir = $sys->indexDir();
				
        		// Build redirect URL
        		if ($dir) {
	        		$requestUri = preg_replace( '!^'.$dir.'/!', '/', $requestUri );
	        		$requestUri = preg_replace( '!^'.$dir.'$!', '/', $requestUri );
        		}
        		$redirect = "/switchlanguage/to/" . $languageRedirectArray[$userLocale] . $requestUri;
        		
        		// Redirect
        		$http = eZHTTPTool::instance();
        		
        		// Add optional HTTP header before redirect, to avoid caching
        		$languageRedirectHeaderArray = $ini->variable('RegionalSettings','LanguageRedirectHeader');
        		foreach ( $languageRedirectHeaderArray as $key => $value ) {
        			eZHTTPTool::headerVariable( $key, $value );
        		}
        		
        		$http->redirect( $redirect );
        		
        		return true;
			}
		}
		return false;
	}
}

?>