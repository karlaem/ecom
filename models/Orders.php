<?php
Class Orders{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->userId = $data["userId"];
        $this->totalCart = $data["totalCart"];
        $this->totalAmount = $data["totalAmount"];
        $this->date = $data["date"];
    }

    // list
    public static function getOrders()
	{
        //get all 
        $orders = DB::query("SELECT * FROM orders");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$ordersyArray = array();
		foreach($orders as $order)
		{
			// create an instance / object for this SPECIFIC 
			$ordersArray[] = new Orders($order); // put this  object onto the array
        }
		// return the list of objects
		return $ordersArray;
    }
    
    //just one
    public static function getOrder($id)
	{
        $orders = DB::query("SELECT * FROM orders WHERE orders.userId=".$id);
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
			$ordersArray[] = new Orders($order); // put this  object onto the array
        }
		// return the list of objects
		return $ordersArray;
	}
}