<?php 

require_once "../controllers/report.controller.php";
require_once "../models/report.model.php";



/*=============================================
xxxx
=============================================*/
class AjaxReportDataProvinsi{
    public $valueBulan;
	public $valueSatker;	

	public function ajaxShowReportDataProvinsi(){

		$bulan = "bulan";
		$valueBulan = $this->valueBulan;

		$satker = "kode_lokasi";
        $valueSatker = $this->valueSatker;
        
		$answer = ControllerReport::ctrShowReportDataPariwisataProvinsi($bulan, $valueBulan, $satker,$valueSatker);

        echo json_encode($answer);

    }
    
}

if (isset($_POST["valueBulan"])) {

    $showDataProvinsi = new AjaxReportDataProvinsi();
    $showDataProvinsi -> valueBulan = $_POST["valueBulan"];
    $showDataProvinsi -> valueSatker = $_POST["valueSatker"];
    $showDataProvinsi -> ajaxShowReportDataProvinsi();
}
?>