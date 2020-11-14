<?php

Class DB{

    var $debug = true;
    
    //conect to database
	static public function connect(){
		$dbDetails = parse_ini_file("../dbw8.ini"); 
		
		return mysqli_connect($dbDetails["host"], $dbDetails["user"], $dbDetails["pass"], $dbDetails["dbname"]);
    }
    
    //run query
	static public function query($sql){

		$oDB = new DB();

		if($oDB->debug)
		{
			$oDB->debug($sql);
		}

		$results = mysqli_query($oDB->connect(), $sql);

		if($results)
		{
			$data = null;
			while($row = mysqli_fetch_assoc($results))
			{
				$data[] = $row;
			}

			return $data;
		}
	}

	public function debug($sql)
	{
		echo "<script>console.log('$sql')</script>";
	}
}