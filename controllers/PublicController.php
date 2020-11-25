<?php
//this is the home page and that people see without the need to be logged in
Class PublicController extends Controller{
	//variables
	var $content = "";

	//load home page
	public function main(){
		//client information
		if(isset($_SESSION["userId"])){
		$this->loadData(User::getCurrent(), "oCurUser");
		}

		$this->loadView("views/header.php",1,"nav");//add nav
		$this->loadView("views/home.php");//go home

		//view patches list
		$this->loadData(ProductDetail::getProducts(), "oProduct");
		$this->loadView("views/patches.php");

		//add subscribe form
		$this->loadData(Countries::getCountries(), "oCountry");
		$this->loadView("views/subscribe.php"); 

		$this->loadLastView("views/main.php");
	}
	//load patch detail
	public function mainDetail(){
		//client information
		if(isset($_SESSION["userId"])){
		$this->loadData(User::getCurrent(), "oCurUser");
		}

		$this->loadView("views/header.php",1,"nav");//add nav	

		//view patches list detail
		$this->loadData(ProductDetail::getProduct($_GET["productid"]), "oProduct");
		$this->loadView("views/patch.php");//go detail view	

		//client information
		if(isset($_SESSION["userId"])){
		$this->loadData(User::getCurrent(), "oCurUser");
		}	

		$this->loadLastView("views/main.php");
	}

	//load login page
	public function login(){
		$this->loadView("views/header.php");
		$this->loadView("views/login.php");
		$this->loadLastView("views/main.php");
	}

	//load Register page
	public function register(){
		$this->loadView("views/header.php");
		$this->loadView("views/register.php");
		$this->loadLastView("views/main.php");
	}

	//login function secure
	public function doLogIn(){
		$con = DB::connect();
		//save variables from form
		$username = $_POST["username"];
		$password = $_POST["password"];
		//from modal user
		//capes special characters in a string
		$sql = "SELECT * FROM users WHERE username='".mysqli_escape_string($con, $username)."'";

		$results = mysqli_query($con, $sql);

		$user = $results = mysqli_fetch_assoc($results);
		
		if ($user)
		{
			if (password_verify($password, $user["password"])) 
			{
				//save id in session
				$_SESSION["userId"]=$user["id"];
				new User($user);
				//go to admin
				$this->go("user", "usertype"); 
			} else {
				//go to login wrong password
				$this->goMsg("public","login","error=1");
			}
		} else {
			//go to login wrong user
			$this->goMsg("public","login","error=2");
		}
	}

	//login function secure
	public function doRegister(){
		$con = DB::connect();
		//save variables from form
		$username = $_POST["username"];
		$password = $_POST["password"];

		$passwordhash = password_hash($password, PASSWORD_DEFAULT);

		$type = 2;

		//from modal user
		//capes special characters in a string
		$sql = "INSERT INTO users (username, password, typeId) VALUES ('".$username."', '".$passwordhash."', '".$type."')";

		$results = mysqli_query($con, $sql);

		//get the id and save in session
		$lastID = mysqli_insert_id($con);

		$_SESSION["userId"] = $lastID;
		$this->go("user", "usertype"); 
	}


	//logout
	public function doLogOut(){
		unset($_SESSION["userId"]);
		$this->go("public", "main");
	}

	//insert subscribers
	public function doSubscribe(){
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
		if($_POST["first_name"]&& $_POST["last_name"]){
			$con = DB::connect();
			//var_dump($_POST);
			//save variables from form
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$email = $_POST["email"];
			$phone= $_POST["phone"];
			$age = $_POST["age"];
			$countryId = $_POST["countryId"];
			$sql = "INSERT INTO clients(first_name, last_name, email, phone, age, countryId, image) values ('".$first_name."','".$last_name."','".$email."','".$phone."','".$age."','".$countryId."','".$target_file."')";
			//echo $sql;
			mysqli_query($con, $sql);
			$this->goMsg("public","main","success=1");
		}else{
			//go home
			$this->go("public", "main");
		}
	}
	//add a product to the cart
	public function addToCart(){
		//client information
		if(isset($_SESSION["userId"])){
			$this->loadData(User::getCurrent(), "oCurUser");
		}
		
		//send to Cart
		if(isset($_GET["pid"])){
		Cart::add($_GET["pid"],$_GET["name"],$_GET["price"],1);
		$this->loadData(Cart::show(), "oCartProduct");
		}
		
		//shows user cart
		$this->loadView("views/header.php",1,"nav");//add nav	
		$this->loadView("views/cartpage.php");
		$this->loadLastView("views/main.php"); 
	}

	//cart page information
	public function cart(){
		//show cart	
		$this->loadData(Cart::show(), "oCartProduct");
			
		//client information
		if(isset($_SESSION["userId"])){
			$this->loadData(User::getCurrent(), "oCurUser");
		}
		$this->loadView("views/header.php",1,"nav");//add nav	
		$this->loadView("views/cartpage.php");
		$this->loadLastView("views/main.php");
	}
	//cart functions
	public function emptyCart(){
		$oCart = new cart();

		$oCart -> emptyCart();
		$this->go("public", "cart");
	}
	public function removeCart(){
		$oCart = new cart();

		$oCart -> remove($_GET["pid"]);
		$this->go("public", "cart");
	}

	//go to login before checkout
	public function checkout(){
		//check if login
		if($_SESSION["userId"]=="")
		{
			$this->goMsg("public","login","error=4");//go to login to checkout
        }else
		{
			$this->oCurUser = User::getCurrent();//get user
			$this->go("client", "checkout");
        
		}
    }

}
