<?php

require_once "../controllers/ref-kode-data.controller.php";
require_once "../models/ref-kode-data.model.php";

class AjaxRefKodeData{

	/*=============================================
	EDIT CATEGORY
	=============================================*/	

	public $kode_data;

	public function ajaxShowRefKodeData(){

		$item = "kode_data";
		$value = $this->kodeData;

		$answer = ControllerRefKodeData::ctrShowRefKodeData($item, $value);

		echo json_encode($answer);

	}
}

/*=============================================
SHOW REF_KODE_DATA
=============================================*/	
if(isset($_POST["kode_data"])){

	$refKodeData = new AjaxRefKodeData();
	$refKodeData -> kodeData = $_POST["kode_data"];
	$refKodeData -> ajaxShowRefKodeData();
}
