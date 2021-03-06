<?php
//this is what the Admin do and see
Class UserController extends Controller {
    //set default to prevent error on views
    var $content = "";
    var $list="";

    //go to cms page
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

     //show a list of orders
     public function clientorders(){
        //if custumer id
        if(isset($_GET["custumerId"])){
            //echo "here";
            //list of orders
            $this->loadData(OrdersAdmin::getOrderUser($_GET["custumerId"]), "oOrders");
            //load clients
            $this->loadView("views/cmsOrdersAdmin.php", 1, "list");  
        }
        
        //list of orders this break something
        //$this->loadData(OrdersAdmin::getOrders(), "oOrders");

        //load clients
        $this->loadView("views/cmsOrdersAdmin.php", 1, "list");         

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
            $this->go("public", "main");//no user
        }else
		{
            $this->oCurUser = User::getCurrent();//get user
        
		}
    }

    //check if is admin or client
    public function usertype(){
        $this->oCurUser = User::getCurrent();
        //confirm login
        //echo $this->oCurUser->typeId;
        if($this->oCurUser->typeId == 2){
            $this->go("client", "main"); //client

        }else if($this->oCurUser->typeId == 1){
            $this->go("user", "main"); //admin
        }
    }    
}