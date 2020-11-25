<?php
//this controls what my client do and see
Class ClientController extends Controller {
    //set default to prevent error on views
    var $content = "";
    var $list="";

    //main client
    public function main(){
        //user information
        $this->loadData(User::getCurrent(), "oCurUser");
        //load the header in variable called header, so I can move it inside the hero
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cmsClient.php"); 
        $this->loadLastView("views/main.php");       
    }

    //checkout Form page
    public function checkout(){
        //get countries data
        $this->loadData(Countries::getCountries(), "oCountry");
        //show cart	
        $this->loadData(Cart::show(), "oCartProduct");
        
		$this->loadView("views/header.php",1,"nav");//add nav	
		$this->loadView("views/checkout.php");
		$this->loadLastView("views/main.php");
    }

    //for client cmsOrders, where the client reviews the purchases
    public function clientorders(){

        //orders information
        $this->loadData(Orders::getOrder($_SESSION["userId"]), "oOrders1");
        if(Orders::getOrder($_SESSION["userId"])){
            //last order information
            foreach ($this->oOrders1 as $order1){   
            $this->loadData(OrdersproductsDetails::getOrderProductD($order1->id), "oOrders");
            //load list of orders each time
            $this->loadView("views/cmsOrders.php", 1, "list"); 
            }     
        }  
       
        //load list of orders
        //$this->loadView("views/cmsOrders.php", 1, "list"); 
        //user information
        $this->loadData(User::getCurrent(), "oCurUser");
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cmsClient.php"); 
        $this->loadLastView("views/main.php");  
    }

    //saves order in database
    public function sendOrder(){
        /*echo "cart";
        print_r($_SESSION["arrCart"]);
        echo "user";
        print_r($_SESSION["userId"]);
        echo "post";
        print_r($_POST);*/
        //if log in
        if($_SESSION["userId"]){
            $con = DB::connect();

            //variables
            $userId=$_SESSION["userId"];
            $totalamount=0;
            //from stackoverflow
            $date = date('Y/m/d');

            //variables in cart
            foreach ($_SESSION["arrCart"] as $key => $arrItemInCart) {
                $productId = $arrItemInCart['id'];
                $name = $arrItemInCart['name'];
                $price = $arrItemInCart['price'];
                $quantity = $arrItemInCart['qty'];
                //each total
                $total= $arrItemInCart['qty'] * $arrItemInCart['price'];
                //all total
                $totalamount = $totalamount + $total;
            }

            //insert into orders
            $sql="INSERT INTO orders(userId, totalCart, totalAmount, date)
            values ('".$userId."','".$total."','".$totalamount."','".$date."')";
            //echo $sql;
            $success = mysqli_query($con, $sql);
            if ($success){
                //from https://www.w3schools.com/php/php_mysql_insert_lastid.asp
                $last_id = $con->insert_id;
            
                //another so I dont confuse myself
                foreach ($_SESSION["arrCart"] as $key => $arrItemInCart) {
                    $productId = $arrItemInCart['id'];
                    $name = $arrItemInCart['name'];
                    $price = $arrItemInCart['price'];
                    $quantity = $arrItemInCart['qty'];
                    //each total
                    $total= $arrItemInCart['qty'] * $arrItemInCart['price'];
                    //insert into orderproducts
                    $sql="INSERT INTO orderproducts(userId, orderId, productId, quantity, total)
                    values ('".$userId."','".$last_id."','".$productId."','".$quantity."','".$total."')";
                    $success3 = mysqli_query($con, $sql);
                }
                if($success3){
                    //echo "New record created successfully.";
                    $this->goMsg("client","checkout","success=2");
                    //empty cart
                    $oCart = new cart();
		            $oCart -> emptyCart();
                }else{
                    //echo "error inserting ordersproducts";
                    $this->goMsg("client","checkout","error=2");
                }

            }else{
                //echo "error inserting orders";
                $this->goMsg("client","checkout","error=1");
            }
        }else{
            $this->goMsg("public","login","error=4");//go to login 
        }
        

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