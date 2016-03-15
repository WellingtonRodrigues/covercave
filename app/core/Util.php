<?php

class Util{
	private static $errors = array(
			"VD01"	=>	"Video not found"
	);
	
	static function getErrorMessage($errorId){
		if(isset(self::$errors[$errorId]))
			return self::$errors[$errorId];
		else
			return "Something went wrong";
	}
}