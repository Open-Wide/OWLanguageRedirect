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

// Override ezpLanguageSwitcher to save favorite user language (may be different of browser_locale)
class owLanguageRedirectSwitcher extends ezpLanguageSwitcher
{
	
	public function process() {
		
		// get the cookie path
		$serv = explode( '.', $_SERVER["SERVER_NAME"] );
		$domain = '.' . $serv[count($serv)-2] . '.' . $serv[count($serv)-1];
		
		// get asked language
		$saIni = $this->getSiteAccessIni();
		$locale=strtolower( substr( $saIni->variable( 'RegionalSettings', 'ContentObjectLocale' ), 0, 2 ) );
		
		// set cookie to store locale
		setcookie( 'locale', $locale, time()+60*60*24*30, '/', $domain );
		
		// get parent function
		parent::process();
	}
	

}

?>