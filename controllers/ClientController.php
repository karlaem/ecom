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
                //saved in cart
                if($success3){
                    //echo "New record created successfully.";
                   // $this->goMsg("client","checkout","success=2");
                    //empty cart
                    $oCart = new cart();
                    $oCart -> emptyCart();

                    //if I have variables in post save client checkout
                    if($_POST["first_name"]&& $_POST["last_name"]){

                        //save variables from form
                        $first_name = $_POST["first_name"];
                        $last_name = $_POST["last_name"];
                        $email = $_POST["email"];
                        $phone= $_POST["phone"];
                        //$age = $_POST["age"];
                        $city = $_POST["city"];
                        $street1 = $_POST["street1"];
                        $street2 = $_POST["street2"];
                        $zipcode = $_POST["zipcode"];
                        $countryId = $_POST["countryId"];
                        $nUserId = $_SESSION["userId"];
                        $sql = "INSERT INTO clients(first_name, last_name, email, phone,nUsersId, city,street1, street2, zipcode, countryId) 
                        values ('".$first_name."','".$last_name."','".$email."','".$phone."','".$nUserId ."','".$city."','".$street1."','".$street2."','".$zipcode."','".$countryId."')";
                        //echo $sql;
                        mysqli_query($con, $sql);
                        $this->goMsg("client","checkout","success=2");
                    }else{
                        //echo "error inserting client";
                        $this->goMsg("client","checkout","error=3");
                    }

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
      //checkout Form page
    public function doReview(){     
        //print_r($_POST);
        //image security
		$timestamp =round(microtime(true) * 1000);
        $target_dir = "assets/"; 
        $target_file = $target_dir.basename($timestamp.$_FILES["image"]["name"]);
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		$fileTypeAllowed = array('pdf', 'png', 'jpeg', 'jpg');
		if(!in_array($ext, $fileTypeAllowed))
        {
            //echo ("file type not allowed");
            $target_file = null;

        } else {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
        //if I have variables in post
		if($_POST["strDescription"]){
            //connect to database
            $con = DB::connect();
            //save variables
            $userId=$_SESSION["userId"];
            $review =$_POST["strDescription"];
            $productId= $_POST["productId"];

            $sql = "INSERT INTO reviews(userId, productId, strDescription, image) 
            values ('".$userId."','".$productId."','".$review."','".$target_file."')";
            //echo $sql;
           
            $success = mysqli_query($con, $sql);
            if($success){
                //echo "success";
                $this->goMsg("public","mainDetail","productid=".$productId."&success=1");
            }else{
            //error
            $this->goMsg("public","mainDetail","productid=".$productId."&error=1");
            }            
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