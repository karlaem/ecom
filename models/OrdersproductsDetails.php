<?php
//this left joins the product details with product order
Class OrdersproductsDetails{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->userId = $data["userId"];
        $this->orderId = $data["orderId"];
        $this->productId = $data["productId"];
        $this->quantity = $data["quantity"];
        $this->total = $data["total"];
        $this->strName = $data["strName"];
        $this->strDescription = $data["strDescription"];
        $this->strFeatures = $data["strFeatures"];
        $this->price = $data["price"];
        $this->category_id = $data["category_id"];
        $this->status_id = $data["status_id"];
        $this->totalCart = $data["totalCart"];
        $this->totalAmount = $data["totalAmount"];
        $this->date = $data["date"];
        $this->inventoryproductsId = $data["inventoryproductsId"];
        $this->inventoryproductsname = $data["inventoryproductsname"];
    }
    
    //just one
    public static function getOrderProductD($id)
	{
        $orders = DB::query("SELECT orderproducts.*, products.strName, products.strDescription, products.strFeatures, products.price, products.category_id, products.status_id, products.inventoryproductsId, orders.totalCart, orders.totalAmount, orders.date, inventoryproducts.name AS inventoryproductsname
        FROM orderproducts
        LEFT JOIN orders ON orderproducts.orderId=orders.id
        LEFT JOIN products ON orderproducts.productId=products.id
        LEFT JOIN inventoryproducts ON products.inventoryproductsId=inventoryproducts.id
        WHERE orderproducts.orderId=".$id);
        //if no id given
        if($orders == ""){
            $ordersArray =(object) array(
                "id" => "0",
                "userId" => "0",
                "orderId" => "0",
                'productId' => '0',
                'quantity' => "0",
                'total' => "0",
                'strName' => 'No patch',
                'strDescription' => '',
                'strFeatures' => '',
                'price' => '',
                'countryId' => '',
                'category_id' => '',
                'status_id' => '',
                'totalCart' => '',
                'totalAmount' => '',
                'date' => '',
                'inventoryproductsId'=>'',
                'inventoryproductsname'=>'',
                );
            return $ordersArray;
        }

        // acting as a factory
        // empty array to avoid errors when nothing was found
		$ordersArray = array();
		foreach($orders as $order)
		{
			// create an instance / object for this SPECIFIC 
			$ordersArray[] = new OrdersproductsDetails($order); // put this  object onto the array
        }
		// return the list of objects
		return $ordersArray;
	}
}