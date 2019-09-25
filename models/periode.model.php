<?php

require_once "connection.php";

class PeriodeModel{

	/*=============================================
	SHOW PERIODE 
	=============================================*/

	static public function MdlShowPeriode($tableUsers, $item, $value ,$item2 , $value2){

// $item = "bulan";
// 		$value = $this->validateBulan;

// 		$item2 = "tahun";
// 		$value2 = $this->validateTahun;
		$stmt = Connection::connect()->prepare("SELECT * FROM $tableUsers WHERE $item = :$item AND $item2 =:$item2");

		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		
		$stmt -> execute();
		// var_dump($stmt);die;
		return $stmt -> fetch();
		
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlUpdatePeriode($table,$item, $value , $item2 , $value2 , $item3, $value3){


		$stmt = Connection::connect()->prepare("UPDATE $table set $item3 = :$item3 WHERE $item2 = :$item2 and $item = :$item" );

		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $value3, PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return 'ok';
		
		} else {

			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}
}