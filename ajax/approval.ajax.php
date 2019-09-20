<?php 

require_once "../controllers/approval.controller.php";
require_once "../models/approval.model.php";
require_once "../controllers/periode.controller.php";

/*=============================================
xxxx
=============================================*/
class AjaxAprroval{
    public $approveData;
	public $approveId;	

	public function ajaxApproveData(){

        $table = "data_pariwisata";
		$item1 = "approved";
		$value1 = $this->approveData;

		$item2 = "id";
        $value2 = $this->approveId;
        

		$answer = ApprovalsModel::MdlApproveData($table, $item1, $value1, $item2, $value2);

    }
    
}

/*=============================================
xxxx
=============================================*/
if (isset($_POST["approveData"])) {

    $approveData = new AjaxAprroval();
    $approveData -> approveData = $_POST["approveData"];
    $approveData -> approveId = $_POST["approveId"];
    $approveData -> ajaxApproveData();
}
?>