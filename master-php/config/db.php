<?php

class Database{
	public static function connect(){
<<<<<<< HEAD
		$db = new mysqli('localhost', 'raul', 'raul', 'camisetas_master');
=======
		$db = new mysqli('localhost', 'raul', 'raul', 'tienda_master');
>>>>>>> 4008e9ce0bf98a53357ad8b43241f94f6d79dcb0
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

