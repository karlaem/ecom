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
        //Images
        if(isset($_GET["productid"])){
        $this->loadView("views/addproductImages.php", 1, "image"); 
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
        //get list of inventory status
        $this->loadData(Status::getAllStatus(), "oStatus");
        //get list of categories
        $this->loadData(Category::getCategories(), "oCategory");
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
      //var_dump($_POST);
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

            //save new product
			$sql = "INSERT INTO products(strName, strDescription, strFeatures, price, category_id, status_id) 
            values ('".$strName."','".$strDescription."','".$strFeatures."','".$price."','".$category_id."','".$status_id."')";
            mysqli_query($con, $sql);
    
			$this->goMsg("product","addProduct","success=1");
		}else{
            //echo "error";
			//goback
			$this->go("product", "addProduct");
		}
    }
    public function productImages(){
        //var_dump($_FILES);
        if($_FILES['strphoto']){
            $con = DB::connect();
            //image security
            $timestamp =round(microtime(true) * 1000);
            $target_dir = "assets/"; 
            $target_file = $target_dir.basename($timestamp.$_FILES["strPhoto"]["name"]);//the image
            $ext = strtolower(pathinfo($_FILES['strPhoto']['name'], PATHINFO_EXTENSION));
            $fileTypeAllowed = array('pdf', 'png', 'jpeg', 'jpg');
            if(!in_array($ext, $fileTypeAllowed))
            {
                //echo ("file type not allowed");
                $target_file = null;

            } else {
                move_uploaded_file($_FILES["strPhoto"]["tmp_name"], $target_file);
            }
            //var_dump($target_file);
            //image
            $sql = "INSERT INTO productphotos (nProductId, strPhoto, bPrimary) VALUES ('".$_POST["id"]."', '".$target_file."', '1')";
            $success = mysqli_query($con, $sql);
            
            $this->goMsg("product","product","success=1");            
        }else{
			$this->goMsg("product", "product","productid=".$_POST["id"]);
		}
    }

    //delete product
    public function deleteProduct(){
        $con = DB::connect();
        $sql = "DELETE FROM products WHERE id='".$_GET["productid"]."'";
        $success = mysqli_query($con, $sql);    
        if ($success)
        {
            //echo "deleted";
            $this->goMsg("product","products","success=1");
        } else {
            //echo "error";
            $this->goMsg("product","products","error=1"); 
        }
    }
    //edit product
    public function editProduct(){
        //get list of inventory status
        $this->loadData(Status::getAllStatus(), "oStatus");
        //get list of categories
        $this->loadData(Category::getCategories(), "oCategory");
        //specific productdata
        if(isset($_GET["productid"])){
            $this->loadData(Product::getProduct($_GET["productid"]), "oProduct");
            $this->loadView("views/product.php", 1, "details"); 
        }
        //load products
        $this->loadView("views/editProduct.php", 1, "list"); 
        //load the header
        $this->loadView("views/header.php", 1 ,"header"); 
        //load the admin final view
        $this->loadLastView("views/cms.php"); 
        $this->loadLastView("views/main.php"); 
    }
    //save edit
    public function updateProduct(){
         //if I have variables in post
        var_dump($_POST);
		if($_POST["id"] && $_POST["strName"] && $_POST["strDescription"] && $_POST["strFeatures"] && $_POST["price"] && $_POST["category_id"] && $_POST["status_id"]){
			$con = DB::connect();

            //save variables from form
            $id = $_POST["id"];
			$strName = $_POST["strName"];
			$strDescription = $_POST["strDescription"];
			$strFeatures = $_POST["strFeatures"];
			$price= $_POST["price"];
			$category_id = $_POST["category_id"];
			$status_id = $_POST["status_id"];
			$sql = "UPDATE products
            SET strName='".$strName."', strDescription='".$strDescription."', strFeatures='".$strFeatures."', price='".$price."', category_id='".$category_id."', status_id='".$status_id."'
            WHERE id='".$id."'";
			//echo $sql;
			mysqli_query($con, $sql);
			$this->goMsg("product","product","success=1");
		}else{
            echo "error";
			//goback
			$this->goMsg("product","editProduct","error=1");
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