<?php

require_once "../controllers/periode.controller.php";
require_once "../models/periode.model.php";

class AjaxPeriode{

	/*=============================================
	VALIDATE IF date !> deadline
	=============================================*/

	public $validateDate;
	public function ajaxValidateDate(){

		$item = "bulan";
		$value = $this->validateDate;

		$answer = ControllerPeriode::ctrShowPeriode($item, $value);

		echo json_encode($answer);

	}
}

/*=============================================
VALIDATE IF date !> deadline
=============================================*/


if (isset($_POST["validateDate"])) {

	$valDate = new AjaxPeriode();
	$valDate -> validateDate = $_POST["validateDate"];
	$valDate -> ajaxValidateDate();
}