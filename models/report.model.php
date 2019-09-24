<?php 

require_once "connection.php";

class ReportModel {

	static public function mdlShowReportDataPariwisata ($tableDataPariwisata,$tableRefKodeData,$tahun, $bulan,$lokasi){
			// var_dump($lokasi);
		if($bulan != null){
			$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where tahun =$tahun and bulan =$bulan and a".".kode_data = b".".kode_data and kode_lokasi =$lokasi and approved= 1" );
			// var_dump($stmt);
			$stmt -> execute();
			return $stmt -> fetchAll();

		} else {
			$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where tahun =$tahun and a".".kode_data = b".".kode_data and approved= 1 and kode_lokasi =$lokasi" );
			// var_dump($stmt);
			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;	
	}

	static public function mdlShowReportDataPariwisataProvinsi ($tableDataPariwisata,$tableRefKodeData,$bulan, $valueBulan, $satker,$valueSatker){
	// static public function mdlShowReportDataPariwisataProvinsi ($tableDataPariwisata,$tableRefKodeData,$valueBulans,$valueSatker){
		
		if($bulan != null){
			$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$valueBulan and a".".kode_data = b".".kode_data and kode_lokasi =$valueSatker and approved= 1" );

			$stmt -> execute();
			return $stmt -> fetchAll();

		} else {
			$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where a".".kode_data = b".".kode_data and approved= 1 and kode_lokasi =$valueSatker");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		 
		

		$stmt -> close();

		$stmt = null;	
	}

	static public function mdlShowReportDataPariwisataProvinsiExport ($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan, $valueBulan, $satker,$valueSatker){
		
		if($valueBulan != null){
			$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$valueBulan and a".".kode_data = b".".kode_data and kode_lokasi =$valueSatker and approved= 1" );

			$stmt -> execute();
			var_dump($stmt);
			return $stmt -> fetchAll();

		} else {
			$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where a".".kode_data = b".".kode_data and approved= 1 and kode_lokasi =$valueSatker");
			$stmt -> execute();
			// var_dump($stmt);
			return $stmt -> fetchAll();
		}
		 
		

		$stmt -> close();

		$stmt = null;	
	}

	static public function mdlShowReportDataPariwisataProvinsiExport2 ($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan){
		
		if($bulan!= null){
			$stmt = Connection::connect()->prepare("SELECT id, a".".kode_data,keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where bulan =$bulan and a".".kode_data = b".".kode_data and approved= 1" );

			$stmt -> execute();
			return $stmt -> fetchAll();

		} else {
			$stmt = Connection::connect()->prepare("SELECT id, keterangan ,kuantitas , approved ,satuan from $tableDataPariwisata a ,  $tableRefKodeData b where a".".kode_data = b".".kode_data and approved= 1");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		 
		

		$stmt -> close();

		$stmt = null;	
	}

}