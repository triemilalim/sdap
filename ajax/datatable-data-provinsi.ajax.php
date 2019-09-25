<?php

require_once "../controllers/report.controller.php";
require_once "../models/report.model.php";


class cetakDataProvinsiTable{

	// public $valueBulan;
	// public $valueSatker;

	public function showReportDataProvinsi(){
	

		$bulan = "bulan";
		$valueBulan = 2;

		$satker = "kode_lokasi";
        $valueSatker = null;
        
		$answer = ControllerReport::ctrShowReportDataPariwisataProvinsi($bulan, $valueBulan, $satker,$valueSatker);
		// $answer = ControllerReport::ctrShowReportDataPariwisataProvinsi();

		// var_dump($answer);
		if(count($answer) == 0){

			$jsonData = '{"data":[]}';

			echo $jsonData;

			return;
		}

		$jsonData = '{
			"data":[';

				for($i=0; $i < count($answer); $i++){

					$jsonData .='[
						"'.($i+1).'",
						"'.$answer[$i]["keterangan"].'",
						"'.$answer[$i]["kuantitas"].'",
						"'.$answer[$i]["satuan"].'",
						"'.$answer[$i]["status_persetujuan"].'"
					],';
				}

				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
	} 

		
}

// if(isset($_POST["kode_data"])){

// 	$refKodeData = new AjaxRefKodeData();
// 	$refKodeData -> kodeData = $_POST["kode_data"];
// 	$refKodeData -> ajaxShowRefKodeData();
// }
// if(isset($_POST["valueBulan"])){
	$activateDataTable = new cetakDataProvinsiTable();
$activateDataTable -> showReportDataProvinsi();
// $activateDataTable -> bulan = $_POST["$valueBulan"];
// }



