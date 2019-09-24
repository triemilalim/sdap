<?php

class ControllerPeriode{



	static public function ctrShowPeriode($item, $value,$item2 , $value2){
		// $item = "bulan";
		// $value = $this->validateBulan;

		// $item2 = "tahun";
		// $value2 = $this->validateTahun;
		$table = "periode";

		$answer = PeriodeModel::MdlShowPeriode($table, $item, $value,$item2 , $value2);

		return $answer;
	}




}