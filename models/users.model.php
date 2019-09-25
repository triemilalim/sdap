<?php

require_once "connection.php";

class UsersModel{

	/*=============================================
	SHOW USER 
	=============================================*/
	
	static public function MdlShowUsers($tableUsers, $tableRefKodeLokasi , $item, $value){

		if($item != null){

		$stmt = Connection::connect()->prepare("SELECT * FROM $tableUsers a , $tableRefKodeLokasi b  where $item = :$item AND a".".kode_lokasi = b".".kode_lokasi");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		else{
			$stmt = Connection::connect()->
			prepare("SELECT id , nip, nama , role , password , file_foto , status_aktif ,keterangan FROM $tableUsers a , $tableRefKodeLokasi b where a".".kode_lokasi = b".".kode_lokasi");
			
			$stmt -> execute();

			return $stmt -> fetchAll();

			
		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SHOW LOKASI 
	=============================================*/

	static public function MdlShowUsersLokasi($tableRefKodeLokasi , $item, $value){

		$stmt = Connection::connect()->
		prepare("SELECT * FROM $tableRefKodeLokasi ORDER by kode_lokasi DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ADD USER 
	=============================================*/	

	static public function mdlAddUser($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(nama, nip, password, role,kode_lokasi, file_foto, status_aktif) VALUES (:nama, :nip, :password, :role,:kode_lokasi ,:file_foto,:status_aktif)");
		// var_dump($stmt);
		$stmt -> bindParam(":nama", $data["nama"], PDO::PARAM_STR);
		$stmt -> bindParam(":nip", $data["nip"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":role", $data["role"], PDO::PARAM_STR);
		$stmt -> bindParam(":kode_lokasi", $data["kode_lokasi"], PDO::PARAM_INT);
		$stmt -> bindParam(":file_foto", $data["file_foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":status_aktif", $data["status_aktif"], PDO::PARAM_INT);

		if ($stmt->execute()) {			
			return 'ok';
		
		} else {
			return 'error';
		}
		
		$stmt -> close();

		$stmt = null;
	}
	
	static public function mdlEditUser($table, $data){
		// $nama = "Dawang Armansyah";
		// $nip = "12222222";
		// $stmt = Connection::connect()->prepare("UPDATE $table set nama = :nama , password = :password , role=:role
		// file_foto=:file_foto WHERE nip = $nip");

		$stmt = Connection::connect()->prepare("UPDATE $table SET nip=:nip,nama=:nama , password= :password ,role=:role,file_foto=:file_foto, kode_lokasi=:kode_lokasi where id =:id");

		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":nama", $data["nama"], PDO::PARAM_STR);
		$stmt -> bindParam(":nip", $data["nip"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":role", $data["role"], PDO::PARAM_STR);
		$stmt -> bindParam(":file_foto", $data["file_foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":kode_lokasi", $data["kode_lokasi"], PDO::PARAM_INT);
		var_dump($stmt);
		if ($stmt->execute()) {

			return 'ok';
		
		} else {
			
			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}


	/*=============================================
	UPDATE USER 
	=============================================*/

	static public function mdlUpdateUser($table, $item1, $value1, $item2, $value2){

		// $table = "user";
		// $item1 = "status_aktif";
		// $value1 = $this->activateUser;

		// $item2 = "nip";
		// $value2 = $this->activateId;

		$stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return 'ok';
		
		} else {

			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	DELETE USER 
	=============================================*/	

	static public function mdlDeleteUser($table, $data){


		var_dump($data);
		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE nip = :nip");

		$stmt -> bindParam(":nip", $data, PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return 'ok';
		
		} else {

			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}

}