<?php
Class ProductController extends Controller{
    var $list="";
    var $details="";
    var $content = "";

     //products
     public function products(){
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
    public function addProduct(){
        //add product
        $this->loadView("views/addProduct.php",1,"list");
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cms.php"); 
        $this->loadLastView("views/main.php"); 
    }

    //insert products from addproduct
    public function insertProduct(){
      //if I have variables in post
		if($_POST["strName"] && $_POST["strDescription"] && $_POST["strFeatures"] && $_POST["price"] && $_POST["category_id"] && $_POST["status_id"]){
			$con = DB::connect();
			//var_dump($_POST);
			//save variables from form
			$strName = $_POST["strName"];
			$strDescription = $_POST["strDescription"];
			$strFeatures = $_POST["strFeatures"];
			$price= $_POST["price"];
			$category_id = $_POST["category_id"];
			$status_id = $_POST["status_id"];
			$sql = "INSERT INTO products(strName, strDescription, strFeatures, price, category_id, status_id) 
            values ('".$strName."','".$strDescription."','".$strFeatures."','".$price."','".$category_id."','".$status_id."')";
			//echo $sql;
			mysqli_query($con, $sql);
			$this->goMsg("product","addProduct","success=1");
		}else{
            //echo "error";
			//goback
			$this->go("product", "addProduct");
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