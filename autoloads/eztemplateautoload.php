<?php

// Operator autoloading

$eZTemplateOperatorArray = array();

$eZTemplateOperatorArray[] =
  array( 'script' => 'extension/owlanguageredirect/autoloads/owlanguageredirect.php',
         'class' => 'owlanguageredirect',
         'operator_names' => array( 
									'languageRedirect'
									),
		 );

?>