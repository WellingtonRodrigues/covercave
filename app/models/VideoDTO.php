<?php

class VideoDTO{
	private $id;
	private $provider;
	private $providerVideoID;
	private $musicID;
	private $version;
	private $instrumentID;
	
	function __construct($id, $provider, $providerVideoID, $musicID, $version, $instrumentID){
		$this->id = $id;
		$this->name = $provider;
		$this->providerVideoID = $providerVideoID;
		$this->musicID = $musicID;
		$this->version = $version;
		$this->instrumentID = $instrumentID;
	}
	
	function getID(){
		return $this->id;
	}
	
	function getProvider() {
		return $this->provider;
	}
	
	function getProviderVideoID(){
		return $this->providerVideoID;
	}
	
	function getMusicID(){
		return $this->musicID;
	}
	
	function getVersion(){
		return $this->version;
	}
	
	function getInstrumentID(){
		return $this->instrumentID;
	}
}