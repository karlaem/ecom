<?php
session_start();
//files
include("controllers/Controller.php");
include("libs/DB.php");
include("libs/Errors.php");
include("models/User.php");
include("models/Client.php");
include("models/Countries.php");

//set default
$controller = setVariable("controller", "Public");
$action = setVariable("action", "main");

// this function, looks at the post and get variables, and gives priority to the post variable
function setVariable($name, $default){
       
	if (isset($_POST[$name]))
	{
		return $_POST[$name];
	}

    //index.php?$action
	if (isset($_GET[$name]))
	{
		return $_GET[$name];
	}

	return $default;
}
// create the controller name and the path to the controller file and save to variable
//ucfirstr = first character of str capitalized
$controllerName = ucfirst($controller)."Controller";
$controllerFile = "controllers/".$controllerName.".php";

if(file_exists($controllerFile))
{
	include($controllerFile);

	// create an instance of the controller
	$theController = new $controllerName();

	// if there is a function inside the controller, called pretrip
	// then call that function, BEFORE calling the main action we requested
	if(method_exists($theController, "pretrip"))
	{
		$theController->pretrip(); // pretrip is a way of doing something before the main action (also known as a mixin)
	}

	// now call the main action the user requested
	if(method_exists($theController, $action))
	{
        //do something
		$theController->$action();
		if ($theController->bLastViewRun)
		{
			$theController->output();
		}
	} else {
        //if there is no method
		Errors::missingMethodError($controllerName, $action);
	}

} else {
    //if there is no file
	Errors::missingControllerError($controllerName);
}

?>