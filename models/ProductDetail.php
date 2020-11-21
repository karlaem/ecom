<?php
Class ProductDetail{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->strName = $data["strName"];
        $this->strDescription = $data["strDescription"];
        $this->strFeatures = $data["strFeatures"];
        $this->price = $data["price"];
        $this->strPhoto = $data["strPhoto"];
        $this->bPrimary = $data["bPrimary"];
        $this->category = $data["category"];
        $this->inventorystatus = $data["inventorystatus"];
    }

    //product list
    public static function getProducts()
	{
        //get al the information from products
        $products = DB::query("SELECT products.id, products.strName, products.strDescription, products.strFeatures , products.price, productphotos.strPhoto, productphotos.bPrimary , categories.strName AS category,inventorystatus.strName AS inventorystatus
        FROM products
        LEFT JOIN
        productphotos ON nProductId = products.id 
        LEFT JOIN categories ON products.category_id = categories.id
        LEFT JOIN inventorystatus ON products.status_id = inventorystatus.id
        WHERE productphotos.bPrimary=1");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$productArray = array();
		foreach($products as $product)
		{
			// create an instance / object for this SPECIFIC 
			$productArray[] = new ProductDetail($product); // put this  object onto the array
        }
		// return the list of objects
		return $productArray;
    }
    
    //1 product
    public static function getProduct($id)
	{
        $products = DB::query("SELECT products.id, products.strName , products.strDescription, products.strFeatures , products.price, productphotos.strPhoto, productphotos.bPrimary , categories.strName AS category,inventorystatus.strName AS inventorystatus
        FROM products
        LEFT JOIN
        productphotos ON nProductId = products.id 
        LEFT JOIN categories ON products.category_id = categories.id
        LEFT JOIN inventorystatus ON products.status_id = inventorystatus.id
        WHERE productphotos.bPrimary=1 AND products.id =".$id);
        //if no id given
        if($products == ""){
            $productArray =(object) array(
                "id" => "0",
                'strName' => 'No patch',
                'strDescription' => '',
                'strFeatures' => '',
                'price' => '',
                'strPhoto' => '',
                'bPrimary' => '',
                'category' => '',
                'inventorystatus' => '',
                );
            return $productArray;
        }

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$productArray = array();
		foreach($products as $product)
		{
			// create an instance / object for this SPECIFIC 
			$productArray[] = new ProductDetail($product); // put this  object onto the array
        }
		// return the list of objects
		return $productArray;
	}
}