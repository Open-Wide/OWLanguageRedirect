<?php

// Operator autoloading

$eZTemplateOperatorArray = array();

$eZTemplateOperatorArray[] =
  array( 'script' => 'extension/owlanguageredirect/autoloads/owlanguageredirectoperators.php',
         'class' => 'owLanguageRedirectOperators',
         'operator_names' => array( 
									'owLanguageRedirect'
									),
		 );

?>