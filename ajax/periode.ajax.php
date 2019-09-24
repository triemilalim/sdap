<?php

require_once "../controllers/periode.controller.php";
require_once "../models/periode.model.php";

class AjaxPeriode{
	// 	data.append("bulanValidasi", bulanValidasi);
	// data.append("validateTahun", tahun);
	/*=============================================
	VALIDATE IF date !> deadline
	=============================================*/
	public $bulanValidasi;
	public $validateTahun;
	public function ajaxValidateDate(){

		$item = "bulan";
		$value = $this->bulanValidasi;

		$item2 = "tahun";
		$value2 = $this->validateTahun;

		$answer = ControllerPeriode::ctrShowPeriode($item, $value , $item2 , $value2);

		echo json_encode($answer);

	}


	public $bulanJatuhTempo;
	public $tahunJatuhTempo;
	public $tanggalJatuhTempo;
	public function ajaxEditJatuhTempo(){
		$table = "periode";
		$item = "bulan";
		$value = $this->bulanJatuhTempo;

		$item2 = "tahun";
		$value2 = $this->tahunJatuhTempo;

		$item3 = "tanggal";
		$value3 = $this->tanggalJatuhTempo;


		$answer = PeriodeModel::mdlUpdatePeriode($table , $item, $value , $item2 , $value2 , $item3, $value3);

		echo json_encode($answer);

	}

}

/*=============================================
VALIDATE IF date !> deadline
=============================================*/


if (isset($_POST["bulanValidasi"])) {

	$valDate = new AjaxPeriode();
	$valDate -> bulanValidasi = $_POST["bulanValidasi"];
	$valDate -> validateTahun = $_POST["validateTahun"];
	$valDate -> ajaxValidateDate();
}

/*=============================================
Change Jatuh Tempo 
=============================================*/
if (isset($_POST["tahunJatuhTempo"])) {

	$jatuhTempo = new AjaxPeriode();
	$jatuhTempo -> bulanJatuhTempo = $_POST["bulanJatuhTempo"];
	$jatuhTempo -> tahunJatuhTempo = $_POST["tahunJatuhTempo"];
	$jatuhTempo -> tanggalJatuhTempo = $_POST["tanggalJatuhTempo"];
	$jatuhTempo -> ajaxEditJatuhTempo();
}

