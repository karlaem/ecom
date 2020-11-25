<?php
//this left joins the product details with product order
Class Ordersproducts{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->userId = $data["userId"];
        $this->orderId = $data["orderId"];
        $this->productId = $data["productId"];
        $this->quantity = $data["quantity"];
        $this->total = $data["total"];
    }

    // list
    public static function getOrdersProducts()
	{
        //get all 
        $orders = DB::query("SELECT * FROM orderproducts");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$ordersyArray = array();
		foreach($orders as $order)
		{
			// create an instance / object for this SPECIFIC 
			$ordersArray[] = new Ordersproducts($order); // put this  object onto the array
        }
		// return the list of objects
		return $ordersArray;
    }
    
    //just one
    public static function getOrderProduct($id)
	{
        $orders = DB::query("SELECT * FROM orderproducts WHERE  orderproducts.orderId=".$id);
        //if no id given
        if($orders == ""){
            $ordersArray =(object) array(
                "id" => "0",
                "userId" => "0",
                'totalCart' => 'No orders',
                "totalAmount" => "0",
                "date" => "0",
                );
            return $ordersArray;
        }

        // acting as a factory
        // empty array to avoid errors when nothing was found
		$ordersArray = array();
		foreach($orders as $order)
		{
			// create an instance / object for this SPECIFIC 
			$ordersArray[] = new Ordersproducts($order); // put this  object onto the array
        }
		// return the list of objects
		return $ordersArray;
	}
}