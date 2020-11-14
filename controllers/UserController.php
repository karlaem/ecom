<?php

Class UserController extends Controller {
    //set default to prevent error on views
    var $content = "";
    var $list="";
    var $details="";

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
        $this->loadView("views/clients.php", 1, "list"); 
        //specific client data
        if(isset($_GET["clientid"])){
            $this->loadData(Client::getClient($_GET["clientid"]), "oClient");
            $this->loadView("views/client.php", 1, "list"); 
        }
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cms.php"); 
        $this->loadLastView("views/main.php");  
    }
    public function products(){
        //specific productdata
        if(isset($_GET["productid"])){
            $this->loadData(Product::getProduct($_GET["productid"]), "oProduct");
            $this->loadView("views/product.php", 1, "details"); 
        }
        //product data
        $this->loadData(Product::getProducts(), "oProducts");
        //load products
        $this->loadView("views/cmsProduct.php", 1, "list"); 
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cms.php"); 
        $this->loadLastView("views/main.php"); 
    }
    public function product(){
        //specific productdata
        if(isset($_GET["productid"])){
            $this->loadData(Product::getProduct($_GET["productid"]), "oProduct");
            $this->loadView("views/product.php", 1, "details"); 
        }
         //load products
         $this->loadView("views/productDetails.php", 1, "list"); 
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