<?php

class owlanguageredirect
{
    /*!
     Constructor
    */
    function owlanguageredirect()
    {
        $this->Operators = array( 
									'languageRedirect'
        );
    }

    /*!
     Returns the operators in this class.
    */
    function &operatorList()
    {
        return $this->Operators;
    }

    /*!
     \return true to tell the template engine that the parameter list
    exists per operator type, this is needed for operator classes
    that have multiple operators.
    */
    function namedParameterPerOperator()
    {
        return true;
    }

    /*!
     Both operators have one parameter.
     See eZTemplateOperator::namedParameterList()
    */
    function namedParameterList()
    {

		return array( 																  
						'languageRedirect' => array( )
						
				  );
    }

    /*!
     \Executes the needed operator(s).
     \Checks operator names, and calls the appropriate functions.
    */
    function modify( &$tpl, &$operatorName, &$operatorParameters, &$rootNamespace,
                     &$currentNamespace, &$operatorValue, &$namedParameters )
    {
        switch ( $operatorName )
        {
            
			case 'languageRedirect':
				require_once("languageRedirect.php");
				$operatorValue = languageRedirect();
			break;
			
			
    	}
    }


    /// \privatesection
    var $Operators;
}

?>