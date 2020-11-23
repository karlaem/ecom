<?php

Class ClientController extends Controller {
    //set default to prevent error on views
    var $content = "";
    var $list="";

    //main client
    public function main(){
        //user information
        $this->loadData(User::getCurrent(), "oCurUser");
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cmsClient.php"); 
        $this->loadLastView("views/main.php");       
    }

    public function checkout(){
        //show cart	
        $this->loadData(Cart::show(), "oCartProduct");
        
		$this->loadView("views/header.php",1,"nav");//add nav	
		$this->loadView("views/checkout.php");
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