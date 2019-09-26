<?php 

require_once "connection.php";

class ApprovalsModel{
    static public function MdlShowData($tabelDataPariwisata, $Iddata, $tahun, $bulan, $lokasi){
       
        $stmt = Connection::connect()->

            prepare("SELECT ref_kode_data.keterangan,data_pariwisata.kuantitas,data_pariwisata.id,data_pariwisata.status_persetujuan,ref_kode_data.satuan
            FROM $tabelDataPariwisata
            INNER JOIN ref_kode_data
            ON data_pariwisata.kode_data=ref_kode_data.kode_data
            WHERE kode_lokasi=$lokasi AND tahun=$tahun AND bulan=$bulan and data_pariwisata.kode_data LIKE 'B%' order by FIELD (data_pariwisata.status_persetujuan ,'2' , '0' , '1')");
            // var_dump($stmt);

            $stmt -> execute();

            return $stmt -> fetchAll();
            $stmt -> close();
    }

     static public function MdlShowDataTahunan($tabelDataPariwisata, $tahun, $bulan, $lokasi){
       
        $stmt = Connection::connect()->

            prepare("SELECT ref_kode_data.keterangan,data_pariwisata.kuantitas,data_pariwisata.id,data_pariwisata.status_persetujuan,ref_kode_data.satuan
            FROM $tabelDataPariwisata
            INNER JOIN ref_kode_data
            ON data_pariwisata.kode_data=ref_kode_data.kode_data
            WHERE kode_lokasi=$lokasi AND tahun=$tahun AND bulan=$bulan and data_pariwisata.kode_data LIKE 'T%' order by FIELD (data_pariwisata.status_persetujuan ,'2' , '0' , '1')");

            $stmt -> execute();

            return $stmt -> fetchAll();
            $stmt -> close();
    }

    static public function MdlApproveData($table, $item1, $value1, $item2, $value2){


		$stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return 'ok';
		
		} else {

			return 'error';
		
		}
		
		$stmt -> close();

		$stmt = null;
	}

}

?>