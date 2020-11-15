<?php
Class Category{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->strName = $data["strName"];
    }

    // list
    public static function getCategories()
	{
        //get all 
        $categories = DB::query("SELECT * FROM categories");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$categoryArray = array();
		foreach($categories as $category)
		{
			// create an instance / object for this SPECIFIC 
			$categoryArray[] = new Category($category); // put this  object onto the array
        }
		// return the list of objects
		return $categoryArray;
    }
    
    //just one
    public static function getCategory($id)
	{
        $categories = DB::query("SELECT * FROM categories WHERE id=".$id);
        //if no id given
        if($categories == ""){
            $categoryArray =(object) array(
                "id" => "0",
                'strName' => 'No Category',
                );
            return $categoryArray;
        }

        // acting as a factory
        // empty array to avoid errors when nothing was found
		$categoryArray = array();
		foreach($categories as $category)
		{
			// create an instance / object for this SPECIFIC 
			$categoryArray[] = new Category($category); // put this  object onto the array
        }
		// return the list of objects
		return $categorytArray;
	}
}