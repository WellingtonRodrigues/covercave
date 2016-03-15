<?php

class VideoDAO{
	function getVideos($musicID = null, $version = null, $instrumentID = null){
		
		if(is_null($musicID)) return false;
		
		//TODO: Check if music/version/instrument exists
		
		require_once '../app/core/Database.php';
		require_once 'VideoDTO.php';
		
		$db = Database::getConnection();
		
		try {
			$query = "SELECT * FROM video WHERE musicID = :musicID";
			
			if(!is_null($version))		$query .= " AND version = :version";
			if(!is_null($instrumentID))	$query .= " AND instrumentID = :instrumentID";
			
			$query = $db->prepare($query);
			$query->bindParam(':musicID', $musicID, PDO::PARAM_INT);
			
			if(!is_null($version)) $query->bindParam(':version', $version, PDO::PARAM_INT);
			if(!is_null($instrumentID)) $query->bindParam(':instrumentID', $instrumentID, PDO::PARAM_INT);
			
			$query->execute();
			$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		
			$videos = array();
			foreach ($rows as $row){
				$id = $row["id"];
				$provider = $row["provider"];
				$providerVideoID = $row["providerVideoID"];
				$musicID = $row["musicID"];
				$version = $row["version"];
				$instrumentID = $row["instrumentID"];
				
				$video = new VideoDTO($id, $provider, $providerVideoID, $musicID, $version, $instrumentID);
				array_push($videos, $video);
			}
		
			return $videos;
		
		} catch(PDOException $ex) {
			//TODO: Add error to log
			//TODO: Inform error to front-end
		}
	}
}