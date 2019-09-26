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

	static public function MdlShowPeriodeTahunan($item, $value,$item2 , $value2){
		$tahun = getdate()['year']-1;
		$table = "periode";

		$answer = PeriodeModel::MdlShowPeriodeTahunan($table, $item, $value,$item2 , $value2,$tahun);

		return $answer;
	}


}