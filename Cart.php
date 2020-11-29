<?php
Class Cart{
	//this adds an array to the session and update the quantity
    public static function add($productGUID, $name, $price, $qty){
        if(isset($_SESSION["arrCart"][$productGUID])){
			//add to the existing qty
			$qty = $qty + $_SESSION["arrCart"][$productGUID]["qty"];
		}
		$_SESSION["arrCart"][$productGUID] = array("id"=>$productGUID, "name"=>$name, "price"=>$price, "qty"=>$qty);
        
    }
	
	//this is called to show the array
	public static function show(){
		//if empty
		if(isset($_SESSION['arrCart'])){
			return $_SESSION["arrCart"];	
		}else{
			return $_SESSION["arrCart"] = array();
		}
		
	}

	//removes what is saved on the session for 1 item
	public function remove($productGUID){
		unset($_SESSION["arrCart"][$productGUID]);		
	}

	//this updates qty in the session
	public function update($productGUID, $newQty){
		//traverse the array and update
		$_SESSION["arrCart"][$productGUID]["qty"]=$newQty;
	}

	//empty all items in cart
	public function emptyCart(){
		$_SESSION["arrCart"] = array();
	}

	//this counts how many items you have
	public function showCartCount(){
		//loop over all items and find how many we have
		$count = 0;
		if(isset($_SESSION['arrCart'])){
			foreach ($_SESSION["arrCart"] as $item) {
				$count = $count + $item["qty"];
			}
		}
		return $count;
		
    }
    
}
