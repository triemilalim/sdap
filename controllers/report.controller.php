<?php 
// require_once "users.controller.php";

class ControllerReport { 

	static public function ctrDownloadReport(){

		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";
		$tahun=getdate()['year'];
		$lokasi = $_GET["lokasi"];
		if(isset($_GET["report"])){
			if(isset($_GET["initialDate"])){

				$bulan = $_GET["initialDate"];
				$answer = ReportModel::mdlShowReportDataPariwisata($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan,$lokasi);
			}else{
	
				$bulan = null;
				$answer = ReportModel::mdlShowReportDataPariwisata($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan,$lokasi);

			}

			

			/*=============================================
			WE CREATE EXCEL FILE
			=============================================*/

			// $name = $_GET["report"].'.xls';

			// header('Expires: 0');
			// header('Cache-control: private');
			// header("Content-type: application/vnd.ms-excel"); // Excel file
			// header("Cache-Control: cache, must-revalidate"); 
			// header('Content-Description: File Transfer');
			// header('Last-Modified: '.date('D, d M Y H:i:s'));
			// header("Pragma: public"); 
			// header('Content-Disposition:; filename="'.$name.'"');
			// header("Content-Transfer-Encoding: binary");

			// echo utf8_decode("<table border='0'> 

			// 		<tr> 
			// 		<td style='font-weight:bold; border:1px solid #eee;'>Nama</td> 
			// 		<td style='font-weight:bold; border:1px solid #eee;'>Nilai</td>
			// 		<td style='font-weight:bold; border:1px solid #eee;'>Satuan</td>
	
			// 		</tr>");
			// foreach ($answer as $row => $item){

			// 	echo utf8_decode("<tr>
			//  			<td style='border:1px solid #eee;'>".$item["keterangan"]."</td> 
			//  			<td style='border:1px solid #eee;'>".$item["kuantitas"]."</td>
			//  			<td style='border:1px solid #eee;'>".$item["satuan"]."</td>
			//  			</tr>");
			// }

			// echo "</table>";

		}

	}

	public function ctrDownloadReportProvinsi($bulan, $valueBulan, $satker,$valueSatker){

		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";
		$tahun=getdate()['year'];
		$answer = ReportModel::mdlShowReportDataPariwisataProvinsiExport($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan, $valueBulan, $satker,$valueSatker);

			

			/*=============================================
			WE CREATE EXCEL FILE
			=============================================*/

			// $name = $tahun.'.xls';
			// header('Expires: 0');
			// header('Cache-control: private');
			// header("Content-type: application/vnd.ms-excel"); // Excel file
			// header("Cache-Control: cache, must-revalidate"); 
			// header('Content-Description: File Transfer');
			// header('Last-Modified: '.date('D, d M Y H:i:s'));
			// header("Pragma: public"); 
			// header('Content-Disposition:; filename="'.$name.'"');
			// header("Content-Transfer-Encoding: binary");

			
			// echo utf8_decode("<table border='0'> 

			// 		<tr> 
			// 		<td style='font-weight:bold; border:1px solid #eee;'>Nama</td> 
			// 		<td style='font-weight:bold; border:1px solid #eee;'>Nilai</td>
			// 		<td style='font-weight:bold; border:1px solid #eee;'>Satuan</td>
	
			// 		</tr>");
			// foreach ($answer as $row => $item){

			// 	echo utf8_decode("<tr>
			//  			<td style='border:1px solid #eee;'>".$item["keterangan"]."</td> 
			//  			<td style='border:1px solid #eee;'>".$item["kuantitas"]."</td>
			//  			<td style='border:1px solid #eee;'>".$item["satuan"]."</td>
			//  			</tr>");
			// }

			// echo "</table>";


		
		
	}

	static public function ctrShowReportDataPariwisata($tahun, $bulan,$lokasi){
		
		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";

		$answer = ReportModel::mdlShowReportDataPariwisata($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan,$lokasi);
		return $answer;
	}


	static public function ctrShowReportDataPariwisataProvinsi($bulan, $valueBulan, $satker,$valueSatker){

		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";

		$answer = ReportModel::mdlShowReportDataPariwisataProvinsi($tableDataPariwisata,$tableRefKodeData,$bulan, $valueBulan, $satker,$valueSatker);
		// $answer = ReportModel::mdlShowReportDataPariwisataProvinsi($tableDataPariwisata,$tableRefKodeData,$valueBulan,$valueSatker);

		return $answer;
	}

	public function ctrDownloadReportProvinsi2(){

		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";
		$tahun=getdate()['year'];
		$bulan = getdate()['mon'];
		// $answer = ReportModel::mdlShowReportDataPariwisata($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan,$lokasi);
		$answer = ReportModel::mdlShowReportDataPariwisataProvinsiExport2($tableDataPariwisata,$tableRefKodeData,$tahun,$bulan);

			

			/*=============================================
			WE CREATE EXCEL FILE
			=============================================*/

			$name = $tahun.'.xls';
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Excel file
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$name.'"');
			header("Content-Transfer-Encoding: binary");

			
			echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>Nama</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>Nilai</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Satuan</td>
	
					</tr>");
			foreach ($answer as $row => $item){

				echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["keterangan"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["kuantitas"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["satuan"]."</td>
			 			</tr>");
			}

			echo "</table>";


		
		
	}
	
}

	

