<?php


require_once "connection.php";

class CategoriesRefKodeData{


	/*=============================================
	SHOW CATEGORY 
	=============================================*/
	
	static public function mdlShowRefKodeData($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT DISTINCT kode_data , keterangan , satuan FROM $table where $item LIKE '$value%'");

			$stmt -> execute();
			

			return $stmt -> fetchAll();

		}
		else{
			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		var_dump($stmt);

		$stmt -> close();

		$stmt = null;

	}
}