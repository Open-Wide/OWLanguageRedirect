<?php 

class owLanguageRedirectSwitcher extends ezpLanguageSwitcher
{
	
	public function process() {
		
		// get the cookie path
		$serv = explode('.', $_SERVER["SERVER_NAME"]);
		$domain = '.' . $serv[count($serv)-2] . '.' . $serv[count($serv)-1];
		
		// get asked language
		$saIni = $this->getSiteAccessIni();
		$locale=strtolower(substr($saIni->variable( 'RegionalSettings', 'ContentObjectLocale' ), 0, 2));
		// set cookie
		setcookie('locale', $locale, time()+60*60*24*30, '/', $domain);
		
		
		// get parent function
		parent::process();
	}
	

}

?>