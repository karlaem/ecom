<?php
Class Productimages{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->nProductId = $data["nProductId"];
        $this->strPhoto = $data["strPhoto"];
        $this->bPrimary = $data["bPrimary"];
    }

    public static function getImages()
	{
        //get all
        $productimages = DB::query("SELECT * FROM productphotos");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$imagesArray = array();
		foreach($productimages as $images)
		{
			// create an instance / object for this SPECIFIC 
			$imagesArray[] = new Productimages($images); // put this  object onto the array
        }
		// return the list of objects
		return $imagesArray;
    }
    
    public static function getProductImages($id)
	{
        $productimages = DB::query("SELECT * FROM productphotos WHERE nProductId=".$id);

        if($productimages == ""){
            $imagesArray[] = (object) array(
                "id" => "0",
                'nProductId' => $id,
                'strPhoto' => 'no Photo',
                'bPrimary' => '',
                );
            return $imagesArray;
        }

        // acting as a factory
		foreach($productimages as $images)
		{
			// create an instance / object for this SPECIFIC 
			$imagesArray[] = new Productimages($images); // put this  object onto the array
        }
		// return the list of objects
		return $imagesArray;
	}
}