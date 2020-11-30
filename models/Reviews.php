<?php
Class Reviews{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->userId = $data["userId"];
        $this->productId = $data["productId"];
        $this->strDescription = $data["strDescription"];
        $this->image = $data["image"];
        $this->username = $data["username"];        
    }

    // list
    public static function getReviews()
	{
        //get all 
        $reviews = DB::query("SELECT * FROM reviews");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$reviewsArray = array();
		foreach($reviews as $review)
		{
			// create an instance / object for this SPECIFIC 
			$reviewssArray[] = new Reviews($review); // put this  object onto the array
        }
		// return the list of objects
		return $reviewsArray;
    }
    
    //just one from product id
    public static function getReview($id)
	{
       // $reviews= DB::query("SELECT * FROM reviews WHERE reviews.productId=".$id." LIMIT 1");
        $reviews = DB::query("SELECT reviews.*, users.username FROM reviews 
        LEFT JOIN users ON reviews.userId = users.id
        WHERE reviews.productId=".$id." 
        LIMIT 1");
        //if no id given
        if($reviews == ""){
            return null;
        }

        // acting as a factory
        // empty array to avoid errors when nothing was found
		$reviewsArray = array();
		foreach($reviews as $review)
		{
			// create an instance / object for this SPECIFIC 
			$reviewsArray[] = new Reviews($review); // put this  object onto the array
        }
		// return the list of objects
		return $reviewsArray;
	}
}