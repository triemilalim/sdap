<?php

require_once "connection.php";

class PeriodeModel{

	/*=============================================
	SHOW PERIODE 
	=============================================*/

	static public function MdlShowPeriode($tableUsers, $item, $value){

		// if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $tableUsers WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		// }

		$stmt -> close();

		$stmt = null;

	}
}