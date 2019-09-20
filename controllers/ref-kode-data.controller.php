<?php

 class ControllerRefKodeData{

 
	/*=============================================
	SHOW CATEGORIES
	=============================================*/

	static public function ctrShowRefKodeData($item, $value){

		$table = "ref_kode_data";

		$answer = CategoriesRefKodeData::mdlShowRefKodeData($table, $item, $value);

		return $answer;
	}


}