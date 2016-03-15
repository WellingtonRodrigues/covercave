<?php

class MusicDAO{
	function getMusicsbyArtist($artistID = null){
		if(!is_null($artistID)){
			require_once '../app/core/Database.php';
			require_once 'MusicDTO.php';
			
			$db = Database::getConnection();
			
			try{
				$query = $db->prepare("SELECT * FROM music WHERE artistID = :artistID");
				$query->bindParam(':artistID', $artistID, PDO::PARAM_INT);
				$query->execute();
				$rows = $query->fetchAll(PDO::FETCH_ASSOC);
			
				$musics = array();
				foreach ($rows as $row){
					$id = $row["id"];
					$name = $row["name"];
			
					$music = new MusicDTO($id, $name, $artistID);
					array_push($musics, $music);
				}

				return $musics;			
			}
			catch(PDOException $ex) {
				//TODO: Add error to log
				//TODO: Inform error to front-end
			}
		}
		else{
			echo 'artist ID is null';
		}
	}
}