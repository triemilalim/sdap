<?php 

require_once "connection.php";

class DataPariwisataModel {
 // kode_data , kode_lokasi , kuantitas , tahun , bulan , approved
	static public function mdlCreateDataPariwisata ($table, $data){
		var_dump($data);

		$stmt = Connection::connect()->prepare("INSERT INTO $table(kode_data, kode_lokasi, kuantitas, tahun, bulan, approved) VALUES (:kode_data, :kode_lokasi, :kuantitas, :tahun, :bulan, :approved)");
		var_dump($stmt);

		$stmt -> bindParam(":kode_data", $data["kode_data"], PDO::PARAM_STR);
		$stmt -> bindParam(":kode_lokasi", $data["kode_lokasi"], PDO::PARAM_INT);
		$stmt -> bindParam(":kuantitas", $data["kuantitas"], PDO::PARAM_STR);
		$stmt -> bindParam(":tahun", $data["tahun"], PDO::PARAM_INT);
		$stmt -> bindParam(":bulan", $data["bulan"], PDO::PARAM_INT);
		$stmt -> bindParam(":approved", $data["approved"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return $data["kode_data"];
		
		} else {
			return 'error';
		}
		$stmt -> close();

		$stmt = null;
		
	}


	static public function mdlShowDataPariwisata ($tableDataPariwisata,$tableRefKodeData,$item , $value,$tahun, $bulan,$jenisData){
		
		if($jenisData=="B"){ //JENIS DATA BULANAN
			if($item != null){
				$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where $item =:$item and a".".kode_data = b".".kode_data" );
		
				$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			} else {
				$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where tahun =$tahun and bulan =$bulan and a".".kode_data = b".".kode_data and a.kode_data LIKE 'B%'" );
				
				$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
				$stmt -> execute();

				return $stmt -> fetchAll();
			}
		} else { //JENIS DATA TAHUNAN
			if($item != null){
			$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where $item =:$item and a".".kode_data = b".".kode_data");
	
			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		} else {
			$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where tahun =$tahun and bulan =$bulan and a".".kode_data = b".".kode_data and a.kode_data LIKE 'T%'");
			
			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		}
		

		$stmt -> close();

		$stmt = null;
		

	 }

	static public function mdlUpdateDataPariwisata($table, $item1, $value1, $item2, $value2){



		// $table = "data_pariwisata";
		// $item1 = "approved";
		// $value1 = $this->statusApproved;

		// $item2 = "id";
		// $value2 = $this->idDataPariwisata;
		// $stmt = Connection::connect()->prepare("UPDATE $table set $item1 = $value1 WHERE id = 1");

		$stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		// var_dump($stmt);

		if ($stmt->execute()) {
			// echo "string";
			return 'ok';
		
		} else {

			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlDeleteDataPariwisata($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return 'ok';
		
		} else {

			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}

	static public function mdlEditDataPariwisata($table , $data){

		// { 
		// 	["kode_data"]=> string(3) "T72" 
		// 	["kuantitas"]=> string(3) "100" 
		// 	["id"]=> string(4) "4131" 
		// 	["satuan"]=> string(5) "Orang" 
		// } 

		$stmt = Connection::connect()->prepare("UPDATE data_pariwisata SET kode_data=:kode_data , kuantitas=:kuantitas where id =:id");

		// object(PDOStatement)#4 (1) { ["queryString"]=> string(110) "UPDATE data_pariwisata SET kode_data=:kode_data,kode_lokasi=:kode_lokasi , kuantitas= :kuantitas where id =:id" }

		// UPDATE `data_pariwisata` SET `kode_data`=[value-2],`kode_lokasi`=[value-3],`kuantitas`=[value-4],`tahun`=[value-5],`bulan`=[value-6],`approved`=[value-7] WHERE 1

		// $stmt = Connection::connect()->prepare("UPDATE $table SET kode_data=:kode_data , kuantitas= :kuantitas where id =:id");

		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":kode_data", $data["kode_data"], PDO::PARAM_STR);
		// $stmt -> bindParam(":kode_lokasi", $data["kode_lokasi"], PDO::PARAM_STR);
		$stmt -> bindParam(":kuantitas", $data["kuantitas"], PDO::PARAM_STR);
		var_dump($stmt);
		if ($stmt->execute()) {

			return 'ok';
		
		} else {
			
			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}
}