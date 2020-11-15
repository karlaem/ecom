<?php
Class Status{
    public function __construct($data)
	{
        $this->id = $data["id"];
        $this->strName = $data["strName"];
    }

    // list
    public static function getAllStatus()
	{
        //get all 
        $allstatus = DB::query("SELECT * FROM inventorystatus");

        // acting as a factory
        // empty array to avoid errors when no assignments were found
		$statusArray = array();
		foreach($allstatus as $status)
		{
			// create an instance / object for this SPECIFIC 
			$statusArray[] = new Status($status); // put this  object onto the array
        }
		// return the list of objects
		return $statusArray;
    }
    
    //just one
    public static function getStatus($id)
	{
        $allstatus = DB::query("SELECT * FROM inventorystatus WHERE id=".$id);
        //if no id given
        if($allstatus == ""){
            $statusArray =(object) array(
                "id" => "0",
                'strName' => 'No status',
                );
            return $statusArray;
        }

        // acting as a factory
        // empty array to avoid errors when nothing was found
		$statusArray = array();
		foreach($allstatus as $status)
		{
			// create an instance / object for this SPECIFIC 
			$statusArray[] = new Status($status); // put this  object onto the array
        }
		// return the list of objects
		return $statustArray;
	}
}