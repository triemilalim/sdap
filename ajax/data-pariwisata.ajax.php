<?php

require_once "../controllers/data-pariwisata.controller.php";
require_once "../models/data-pariwisata.model.php";


// 1. mengambil data dari js ---> data.append("nipUserData", nipUser);
// 2. sebelum masuk ke ajaxmasing2 inisiate public $nipUserData; 
// 3. if (isset($_POST["nipUserData"])) {

// 	$edit = new AjaxUsers();
// 	$edit -> nilaiNipUserData = $_POST["nipUserData"];
// 	$edit -> ajaxEditUser();
// }
// 4. nilai nilaiNipUserData dibawa ke controller




class AjaxDataPariwisata{

	/*=============================================
	Tombol Persetujuan inputan data
	=============================================*/


	public $idDataPariwisata;
	public $statusApproved;
	public function ajaxPersetujuanData(){

		$table = "data_pariwisata";
		$item1 = "approved";
		$value1 = $this->statusApproved;

		$item2 = "id";
		$value2 = $this->idDataPariwisata;

		$answer = DataPariwisataModel::mdlUpdateDataPariwisata($table, $item1, $value1, $item2, $value2);
	}

	public $idDataPariwisataUntukEditData;
	public function ajaxEditDataPariwisata(){
		$item = "id";
		$value = $this ->idDataPariwisataUntukEditData;
		$answer = ControllerDataPariwisata::ctrShowDataPariwisataUntukEdit($item, $value);

		echo json_encode($answer);

	}
}


if (isset($_POST["idDataPariwisata"])) {

	$persetujuanData = new AjaxDataPariwisata();
	$persetujuanData -> statusApproved = $_POST["statusApproved"];
	$persetujuanData -> idDataPariwisata = $_POST["idDataPariwisata"];
	$persetujuanData -> ajaxPersetujuanData();
}

if (isset($_POST["idDataPariwisataUntukEditData"])) {

	$editDataPariwisata = new AjaxDataPariwisata();
	$editDataPariwisata -> idDataPariwisataUntukEditData = $_POST["idDataPariwisataUntukEditData"];
	$editDataPariwisata -> ajaxEditDataPariwisata();
}





