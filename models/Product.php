<?php
Class Product{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->strName = $data["strName"];
        $this->strDescription = $data["strDescription"];
        $this->strFeatures = $data["strFeatures"];
        $this->price = $data["price"];
        $this->category_id = $data["category_id"];
        $this->status_id = $data["status_id"];
    }

    //product list
    public static function getProducts()
	{
        //get all products
        $products = DB::query("SELECT * FROM products");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$productArray = array();
		foreach($products as $product)
		{
			// create an instance / object for this SPECIFIC 
			$productArray[] = new Product($product); // put this  object onto the array
        }
		// return the list of objects
		return $productArray;
    }
    
    //1 product
    public static function getProduct($id)
	{
        $products = DB::query("SELECT * FROM products WHERE id=".$id);
        //if no id given
        if($products == ""){
            $productArray =(object) array(
                "id" => "0",
                'strName' => 'No patch',
                'strDescription' => '',
                'strFeatures' => '',
                'price' => '',
                'countryId' => '',
                'category_id' => '',
                'status_id' => '',
                );
            return $productArray;
        }

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$productArray = array();
		foreach($products as $product)
		{
			// create an instance / object for this SPECIFIC 
			$productArray[] = new Product($product); // put this  object onto the array
        }
		// return the list of objects
		return $productArray;
	}
}