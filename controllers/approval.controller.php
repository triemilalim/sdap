<?php 
class ControllerApproval{

    static public function ctrShowData(){
        
        $tabelDataPariwisata = "data_pariwisata";
        $Iddata = 'id';
        $tahun = getdate()['year'];
        $bulan = getdate()['mon']-1;
        $lokasi = $_SESSION["kode_lokasi"];
        
        // var_dump($lokasi);

        $answer = ApprovalsModel::MdlShowData($tabelDataPariwisata, $Iddata, $tahun, $bulan, $lokasi);
        // var_dump ($answer);
		return $answer;
	}

      static public function ctrShowDataTahunan(){
        
        $tabelDataPariwisata = "data_pariwisata";
        $tahun = getdate()['year'];
        $bulan = 1;
        $lokasi = $_SESSION["kode_lokasi"];
        
        // var_dump($lokasi);

        $answer = ApprovalsModel::MdlShowDataTahunan($tabelDataPariwisata, $tahun, $bulan, $lokasi);
        // var_dump ($answer);
        return $answer;
    }
}
?>