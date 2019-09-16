<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";
require_once "../controllers/periode.controller.php";


// 1. mengambil data dari js ---> data.append("nipUserData", nipUser);
// 2. sebelum masuk ke ajaxmasing2 inisiate public $nipUserData; 
// 3. if (isset($_POST["nipUserData"])) {

// 	$edit = new AjaxUsers();
// 	$edit -> nilaiNipUserData = $_POST["nipUserData"];
// 	$edit -> ajaxEditUser();
// }
// 4. nilai nilaiNipUserData dibawa ke controller

class AjaxUsers{

	/*=============================================
	EDIT USER
	=============================================*/



	public $nipUserData;

	public function ajaxEditUser(){

		$item = "nip";
		$value = $this->nilaiNipUserData;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);
	}


	/*=============================================
	ACTIVATE USER
	=============================================*/

	public $activateUser;
	public $activateId;	

	public function ajaxActivateUser(){

		$table = "user";
		$item1 = "status_aktif";
		$value1 = $this->activateUser;

		$item2 = "nip";
		$value2 = $this->activateId;

		$answer = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);


	}


	/*=============================================
	VALIDATE IF USER ALREADY EXISTS
	=============================================*/

	public $validateUser;

	public function ajaxValidateUser(){

		$item = "nip";
		$value = $this->validateUser;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);

	}


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


	// public $deleteUser;
	// public function ajaxDelete(){

	// 	$item = "user";
	// 	$value = $this->deleteUser2;

	// 	$answer = ControllerUsers::ctrDeleteUser($item, $value);

	// 	echo json_encode($answer);

	// }

}




/*=============================================
EDIT USER
=============================================*/

if (isset($_POST["nipUserData"])) {

	$edit = new AjaxUsers();
	$edit -> nilaiNipUserData = $_POST["nipUserData"];
	$edit -> ajaxEditUser();
}

/*=============================================
ACTIVATE USER
=============================================*/

if (isset($_POST["activateUser"])) {

	$activateUser = new AjaxUsers();
	$activateUser -> activateUser = $_POST["activateUser"];
	$activateUser -> activateId = $_POST["activateId"];
	$activateUser -> ajaxActivateUser();
}


/*=============================================
VALIDATE IF USER ALREADY EXISTS
=============================================*/


if (isset($_POST["validateUser"])) {

	$valUser = new AjaxUsers();
	$valUser -> validateUser = $_POST["validateUser"];
	$valUser -> ajaxValidateUser();
}

/*=============================================
VALIDATE IF date !> deadline
=============================================*/


if (isset($_POST["validateDate"])) {

	$valDate = new AjaxUsers();
	$valDate -> validateDate = $_POST["validateDate"];
	$valDate -> ajaxValidateDate();
}

/*=============================================
DELETE
=============================================*/


// if (isset($_POST["deleteUser"])) {

// 	$del = new AjaxUsers();
// 	$del -> deleteUser2 = $_POST["deleteUser"];
// 	$del -> ajaxDelete();
// }
