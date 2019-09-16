<?php

class ControllerPeriode{



	static public function ctrShowPeriode($item, $value){

		$table = "periode";

		$answer = PeriodeModel::MdlShowPeriode($table, $item, $value);

		return $answer;
	}




}