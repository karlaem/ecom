<?php

Class Controller{
    //set default variables
    var $jsHeaderFiles = array();
	var $cssHeaderFiles = array();
    var $bLastViewRun = false;
    
    /* default: the load view appends the contents of the included file into $this->content
	
	params: $viewFile = the file we want to load
	$bAppendToVariable =  false|true, if true, then I'm going to GIVE A NEW VARIABLE NAME, and i want to append to that. 
	If false, If I give a new variable name, then just set it, DONT APPEND TO IT 

	returns: nothing, BUT it sets an object scoped variable $this->content OR $this->mynewvarname
	*/
    public function loadView($viewFile, $bAppendToVariable=false, $nameOfVariable="")
	{
		ob_start();// start the output buffer
		include($viewFile);
		
		$tempHTML = ob_get_contents();// transfer the content from the buffer, into the $response variable
		ob_clean();// empties the buffer

		// if you want to append variable
		if($bAppendToVariable)
		{
			// if the variable exists append 
			if(isset($this->$nameOfVariable))
			{
				$this->$nameOfVariable .= $tempHTML;
			} else {
				$this->$nameOfVariable = $tempHTML;
			}
		} else {
			$this->content .= $tempHTML;
		}
    }
	//does not append
    public function loadLastView($viewFile){

		$this->bLastViewRun = true;
		ob_start();// start the output buffer
		include($viewFile);
		
		$tempHTML = ob_get_contents();
		ob_clean();

		$this->content = $tempHTML;
	}
    //load data received data into $data parameter and in variable name and saved data in a varialbe called variable name
	// we will have have a variable which is OBJECT scoped. $this->newVariableName 
	public function loadData($data, $variableName)
	{
		$this->$variableName = $data;
    }
    
    //used in the other controllers to go somewhere if not login
    public function go($controller, $action, $additonal="", $debug=false)
	{
		$goingTo = "location: index.php?controller=".$controller."&action=".$action."&".$additional;

		if($debug)
		{
			echo $goingTo;
			die();
		}

		header($goingTo);
    }
	//for get errors
	public function goMsg($controller, $action, $additonal, $debug=false)
	{
		$goingTo = "location: index.php?controller=".$controller."&action=".$action."&".$additonal;

		if($debug)
		{
			echo $goingTo;
			die();
		}

		header($goingTo);
    }
    public function loadRoute($controller, $action, $variableName="content", $append=0)
    {
       //echo "<h1>Opened Controller: $controller";
        // create the controller name and the path to the controller file and save to varibales
        $controllerName = $controller."Controller"; // PublicController
        $controllerFile = "controllers/".$controllerName.".php";
        if(file_exists($controllerFile))
        {

            include_once($controllerFile);
            // you've created a new instance of the controller, just for this route you are calling
            $oController = new $controllerName();
            $oController->$action();
            // therefore it has its own method and properties, as if you had called it directly. 
            // we know that the $oController->youraction() process creates and appends to $this->content... 
            //var_dump($oController);
        } 
        // save whatever we got from the oController content into a variable
        if ($append && isset($this->$variableName))
        {
            $this->$variableName .= $oController->content;
        } else {
            $this->$variableName = $oController->content;
        }
    } 

	public function output()
	{
		echo $this->content;
	}
}
?>