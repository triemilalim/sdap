<?php 

require_once "connection.php";

class ReportModel {

	static public function mdlShowReportDataPariwisata ($tableDataPariwisata,$tableRefKodeData,$tahun, $bulan,$lokasi){
			// var_dump($lokasi);
		if($bulan != null){
			$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , status_persetujuan ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where tahun =$tahun and bulan =$bulan and a".".kode_data = b".".kode_data and kode_lokasi =$lokasi and status_persetujuan= 1" );
			// var_dump($stmt);
			$stmt -> execute();
			return $stmt -> fetchAll();

		} else {
			$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , status_persetujuan ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where tahun =$tahun and a".".kode_data = b".".kode_data and status_persetujuan= 1 and kode_lokasi =$lokasi" );
			// var_dump($stmt);
			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;	
	}

	static public function mdlShowReportDataPariwisataProvinsi ($tableDataPariwisata,$tableRefKodeData,$bulan, $valueBulan, $satker,$valueSatker,$tahun){
		// var_dump($valueBulan);

		
		if($valueBulan != 13){
			if($valueSatker == 99 ){
				$stmt = Connection::connect()->prepare("SELECT  keterangan ,SUM(kuantitas) kuantitas,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$valueBulan and a".".kode_data = b".".kode_data and status_persetujuan= 1 and tahun=$tahun GROUP by keterangan , satuan"  );
			}else{
				$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , status_persetujuan ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$valueBulan and a".".kode_data = b".".kode_data and kode_lokasi =$valueSatker and status_persetujuan= 1 and tahun=$tahun"  );
			}

			$stmt -> execute();
			return $stmt -> fetchAll();


		} else {

			$stmt = Connection::connect()->prepare("SELECT keterangan ,SUM(kuantitas) kuantitas ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where a".".kode_data = b".".kode_data and tahun=$tahun and status_persetujuan= 1 and kode_lokasi =$valueSatker GROUP by keterangan , satuan");

			$stmt -> execute();
			// var_dump($stmt);
			return $stmt -> fetchAll();
		}
	
		 
		

		$stmt -> close();

		$stmt = null;	
	}

	static public function mdlShowReportDataPariwisataProvinsiExport2 ($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan,$lokasi){
		if($bulan!= 13){
			if($lokasi == 99 ){
				$stmt = Connection::connect()->prepare("SELECT  keterangan ,SUM(kuantitas) kuantitas,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$bulan and a".".kode_data = b".".kode_data and status_persetujuan= 1 and tahun=$tahun GROUP by keterangan , satuan"  );
			} else {
				$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , status_persetujuan ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$bulan and tahun=$tahun and a".".kode_data = b".".kode_data and status_persetujuan= 1 and kode_lokasi=$lokasi" );
			}
			
			// var_dump($stmt);die;
			$stmt -> execute();
			return $stmt -> fetchAll();

		}//untuk mencari data kota setahun
		 else {
			$stmt = Connection::connect()->prepare("SELECT  keterangan ,SUM(kuantitas) kuantitas,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where kode_lokasi=$lokasi and a".".kode_data = b".".kode_data and status_persetujuan= 1 and tahun=$tahun GROUP by keterangan , satuan");
			// var_dump($stmt);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;	
	}

}