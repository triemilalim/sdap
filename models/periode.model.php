<?php

require_once "connection.php";

class PeriodeModel{

	/*=============================================
	SHOW PERIODE 
	=============================================*/

	static public function MdlShowPeriode($tableUsers, $item, $value ,$item2 , $value2){


		$stmt = Connection::connect()->prepare("SELECT * FROM $tableUsers WHERE $item = :$item AND $item2 =:$item2");

		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		
		$stmt -> execute();
		
		return $stmt -> fetch();
		
		$stmt -> close();

		$stmt = null;

	}
}