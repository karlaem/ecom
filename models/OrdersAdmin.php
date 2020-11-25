<?php
//Get the order for the admin, sort by username, email, order number
Class OrdersAdmin{
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
        $this->totalAmount = $data["totalAmount"];
        $this->date = $data["date"];
        $this->inventoryproductsname = $data["inventoryproductsname"];
    }
    
    //Get all the orders
    public static function getOrders()
	{
        $orders = DB::query("SELECT orderproducts.*, products.strName, products.strDescription, products.strFeatures, products.price, products.category_id, products.status_id, orders.totalAmount, orders.date, inventoryproducts.name AS inventoryproductsname
        FROM orderproducts
        LEFT JOIN orders ON orderproducts.orderId=orders.id
        LEFT JOIN products ON orderproducts.productId=products.id
        LEFT JOIN inventoryproducts ON products.inventoryproductsId=inventoryproducts.id");

        // acting as a factory
        // empty array to avoid errors when nothing was found
		$ordersArray = array();
		foreach($orders as $order)
		{
			// create an instance / object for this SPECIFIC 
			$ordersArray[] = new OrdersAdmin($order); // put this  object onto the array
        }
		// return the list of objects
		return $ordersArray;
    }
    
    //Sort by order by user if
    public static function getOrderUser($id)
    {
        $orders = DB::query("SELECT orderproducts.*, products.strName, products.strDescription, products.strFeatures, products.price, products.category_id, products.status_id, orders.totalAmount, orders.date, inventoryproducts.name AS inventoryproductsname
        FROM orderproducts
        LEFT JOIN orders ON orderproducts.orderId=orders.id
        LEFT JOIN products ON orderproducts.productId=products.id
        LEFT JOIN inventoryproducts ON products.inventoryproductsId=inventoryproducts.id
        WHERE orderproducts.userId=".$id);
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
                'totalAmount' => '',
                'date' => '',
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
            $ordersArray[] = new OrdersAdmin($order); // put this  object onto the array
        }
        // return the list of objects
        return $ordersArray;
    }

    //Sort by order by orderID
    public static function getOrderPurchase($id)
    {
        $orders = DB::query("SELECT orderproducts.*, products.strName, products.strDescription, products.strFeatures, products.price, products.category_id, products.status_id, orders.totalAmount, orders.date, inventoryproducts.name AS inventoryproductsname
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
                'totalAmount' => '',
                'date' => '',
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
            $ordersArray[] = new OrdersAdmin($order); // put this  object onto the array
        }
        // return the list of objects
        return $ordersArray;
    }
}