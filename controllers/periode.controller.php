<?php

class ControllerPeriode{



	static public function ctrShowPeriode($item, $value,$item2 , $value2){

		$table = "periode";

		$answer = PeriodeModel::MdlShowPeriode($table, $item, $value,$item2 , $value2);

		return $answer;
	}




}