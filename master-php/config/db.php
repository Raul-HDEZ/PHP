<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'raul', 'raul', 'tienda_master');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

