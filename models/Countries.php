<?php
//country table from https://blog.radwell.codes/2013/09/iso-3166-country-list-for-mysql/
Class Countries{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->code = $data["code"];
        $this->name = $data["name"];
    }

    //countries
    public static function getCountries()
	{
        //get all countries
        $countries = DB::query("SELECT * FROM country");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$countryArray = array();
		foreach($countries as $country)
		{
			// create an instance / object for this SPECIFIC 
			$clientArray[] = new Countries($country); // put this  object onto the array
        }
		// return the list of objects
		return $clientArray;
    }
    
    //1 country
    public static function getCountry($id)
	{
        $countries = DB::query("SELECT * FROM country WHERE country.id=".$id);

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$countryArray = array();
		foreach($countries as $country)
		{
			// create an instance / object for this SPECIFIC 
			$countryArray[] = new Countries($country); // put this  object onto the array
        }
		// return the list of objects
		return $countryArray;
	}
}