<?php

class ArtistDAO{
	function getArtists($key = null){
		require_once '../app/core/Database.php';
		require_once 'ArtistDTO.php';
		
		$db = Database::getConnection();
		
		try {
			$query = $db->prepare("SELECT * FROM artist");
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		
			$artists = array();
			foreach ($rows as $row){
				$id = $row["id"];
				$name = $row["name"];
		
				$artist = new ArtistDTO($id, $name);
				array_push($artists, $artist);
			}
				
			return $artists;
				
		} catch(PDOException $ex) {
			//TODO: Add error to log
			//TODO: Inform error to front-end
		}
	}
}