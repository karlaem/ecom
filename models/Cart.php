<?php
Class Cart{
    
    public static function add($productGUID, $name, $price, $qty){
        if(isset($_SESSION["arrCart"][$productGUID])){
			//add to the existing qty
			$qty = $qty + $_SESSION["arrCart"][$productGUID]["qty"];
		}
		$_SESSION["arrCart"][$productGUID] = array("id"=>$productGUID, "name"=>$name, "price"=>$price, "qty"=>$qty);
        
    }
    
	public static function show(){
		return $_SESSION["arrCart"];
	}

	public function remove($productGUID){
		unset($_SESSION["arrCart"][$productGUID]);		
	}

	public function update($productGUID, $newQty){
		//traverse the array and update
		$_SESSION["arrCart"][$productGUID]["qty"]=$newQty;
	}

	public function emptyCart(){
		$_SESSION["arrCart"] = array();
	}

	public function showCartCount(){
		//loop over all items and find how many we have
		$count = 0;
		foreach ($_SESSION["arrCart"] as $item) {
			$count = $count + $item["qty"];
		}
		return $count;
		
	}

}
