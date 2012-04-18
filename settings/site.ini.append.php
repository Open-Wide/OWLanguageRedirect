<?php /* #?ini charset="utf-8"?

[TemplateSettings]
ExtensionAutoloadPath[]=owlanguageredirect


[RegionalSettings]

########################################################
#LanguageRedirect setting :
#
# LanguageRedirect[browser_locale]=name_of_siteaccess
#
#---------------------------------------------------------
# Example
#---------------------------------------------------------
# list of siteaccess :
#		- site1_en
#		- site1_fr
#		- site1_no
#
#		- site2_en
#		- site2_fr
#
# Settings :
#---------------------------------------------------------
# - in settings/siteaccess/site1_en/site.ini.append.php :
#		LanguageRedirect[]
#		LanguageRedirect[en]=site1_en
#		LanguageRedirect[fr]=site1_fr
#		LanguageRedirect[no]=site1_no
#
# - in settings/siteaccess/site1_fr/site.ini.append.php :
#		LanguageRedirect[]
#		LanguageRedirect[en]=site1_en
#		LanguageRedirect[fr]=site1_fr
#		LanguageRedirect[no]=site1_no
#
# and others...
#---------------------------------------------------------
# - in settings/siteaccess/site2_fr/site.ini.append.php :
#		LanguageRedirect[]
#		LanguageRedirect[fr]=site2_fr
#		LanguageRedirect[en]=site2_en
#
# and others...
########################################################

#LanguageRedirect[]
#LanguageRedirect[fr]=site1_fr
#LanguageRedirect[en]=site1_en


# Override ezpLanguageSwitcher to save favorite user language (may be different of browser_locale)
# If you want define a custom class, please modify classes/owlanguageredirectswitcher.php (name of extended class at line 3)
LanguageSwitcherClass=owLanguageRedirectSwitcher


*/ ?>
