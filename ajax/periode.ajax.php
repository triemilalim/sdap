<?php

require_once "../controllers/periode.controller.php";
require_once "../models/periode.model.php";

class AjaxPeriode{

	/*=============================================
	VALIDATE IF date !> deadline
	=============================================*/

	public $validateBulan;
	public $validateTahun;
	public function ajaxValidateDate(){

		$item = "bulan";
		$value = $this->validateBulan;

		$item2 = "tahun";
		$value2 = $this->validateTahun;

		$answer = ControllerPeriode::ctrShowPeriode($item, $value , $item2 , $value2);

		echo json_encode($answer);

	}
}

/*=============================================
VALIDATE IF date !> deadline
=============================================*/


if (isset($_POST["validateBulan"])) {

	$valDate = new AjaxPeriode();
	$valDate -> validateBulan = $_POST["validateBulan"];
	$valDate -> validateTahun = $_POST["validateTahun"];
	$valDate -> ajaxValidateDate();
}