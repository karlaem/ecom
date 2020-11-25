<?php
Class Inventoryproducts{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->strName = $data["name"];
    }

    //product list
    public static function getInventory()
	{
        //get all products
        $Inventory = DB::query("SELECT * FROM inventoryproducts");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$InventoryArray = array();
		foreach($Inventory as $status)
		{
			// create an instance / object for this SPECIFIC 
			$InventoryArray[] = new Inventoryproducts($status); // put this  object onto the array
        }
		// return the list of objects
		return $InventorytArray;
    }
    
}