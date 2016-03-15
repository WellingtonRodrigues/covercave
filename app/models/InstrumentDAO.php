<?php

class InstrumentDAO{
	function getArtists(){
		require_once '../app/core/Database.php';
		require_once 'InstrumentDTO.php';
		
		$db = Database::getConnection();
		
		try {
			$query = $db->prepare("SELECT * FROM instrument");
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		
			$instruments = array();
			foreach ($rows as $row){
				$id = $row["id"];
				$name = $row["name"];
		
				$instrument = new InstrumentDTO($id, $name);
				array_push($instruments, $instrument);
			}
				
			return $instruments;
				
		} catch(PDOException $ex) {
			//TODO: Add error to log
			//TODO: Inform error to front-end
		}
	}
}