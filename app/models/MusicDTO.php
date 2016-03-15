<?php

class MusicDTO{
	private $id;
	private $name;
	private $artistID;
	
	function __construct($id, $name, $artistID){
		$this->id = $id;
		$this->name = $name;
		$this->artistID = $artistID;
	}
	
	function getID(){
		return $this->id;
	}
	
	function getName() {
		return $this->name;
	}
	
	function getArtistID(){
		return $this->artistID;
	}
}