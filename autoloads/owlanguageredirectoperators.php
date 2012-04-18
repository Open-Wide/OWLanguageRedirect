<?php

class owLanguageRedirectOperators
{
    /*!
     Constructor
    */
    function owLanguageRedirectOperators()
    {
        $this->Operators = array( 
									'owLanguageRedirect'
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
						'owLanguageRedirect' => array( )
						
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
            
			case 'owLanguageRedirect':
				$owLanguageRedirect = new owLanguageRedirect();
				$operatorValue = $owLanguageRedirect->redirect();
			break;
			
			
    	}
    }


    /// \privatesection
    var $Operators;
}

?>