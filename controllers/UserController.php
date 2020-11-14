<?php

Class UserController extends Controller {
    //set default to prevent error on views
    var $content = "";
    var $clientlist="";

	public function main(){
        //user information
        $this->loadData(User::getCurrent(), "oCurUser");
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cms.php"); 
        $this->loadLastView("views/main.php");       
    }
    //show a list of clients
    public function clients(){
        //Client list
        $this->loadData(Client::getClients(), "oClients");
        //load clients
        $this->loadView("views/clients.php", 1, "clientlist"); 
        //specific client data
        if(isset($_GET["clientid"])){
            $this->loadData(Client::getClient($_GET["clientid"]), "oClient");
            $this->loadView("views/client.php", 1, "clientlist"); 
        }
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cms.php"); 
        $this->loadLastView("views/main.php");  
    }

    //check login
	public function pretrip(){

		if($_SESSION["userId"]=="")
		{
			$this->go("public", "main");
		}else
		{
        $this->oCurUser = User::getCurrent();
        //confirm login
		//echo $this->oCurUser->id;
		}
	}
}