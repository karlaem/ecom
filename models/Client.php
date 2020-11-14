<?php
//country table from https://blog.radwell.codes/2013/09/iso-3166-country-list-for-mysql/
Class Client{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->first_name = $data["first_name"];
        $this->last_name = $data["last_name"];
        $this->email = $data["email"];
        $this->age = $data["age"];
        $this->countryId = $data["countryId"];
        $this->image = $data["image"];
        $this->code = $data["code"];
        $this->country = $data["country"];
        $this->phone = $data["phone"];
    }

    //client list
    public static function getClients()
	{
        //get all clients
        //$clients = DB::query("SELECT * FROM clients"); 
        //client+country
        $clients = DB::query("SELECT clients.*, country.code, country.name AS country FROM clients LEFT JOIN country ON clients.countryId = country.id");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$clientArray = array();
		foreach($clients as $client)
		{
			// create an instance / object for this SPECIFIC 
			$clientArray[] = new Client($client); // put this  object onto the array
        }
		// return the list of objects
		return $clientArray;
    }
    
    //1 client
    public static function getClient($id)
	{
        $clients = DB::query("SELECT clients.*, country.code, country.name AS country FROM clients LEFT JOIN country ON clients.countryId = country.id WHERE clients.id=".$id);
        //if no id given
        if($clients == ""){
            $clientArray =(object) array(
                "id" => "0",
                'first_name' => 'No client',
                'last_name' => '',
                'email' => '',
                'age' => '',
                'countryId' => '',
                'image' => '',
                'code' => '',
                'country' => '',
                'phone' => '');
            return $clientArray;
        }

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$clientArray = array();
		foreach($clients as $client)
		{
			// create an instance / object for this SPECIFIC 
			$clientArray[] = new Client($client); // put this  object onto the array
        }
		// return the list of objects
		return $clientArray;
	}
}