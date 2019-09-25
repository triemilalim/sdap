<?php 

 class ControllerDataPariwisata {

	static public function ctrCreateDataPariwisata(){
		if(isset($_POST['addJenisData'])){
			$data = array('kode_data' => $_POST["addNamaData"],
				'kode_lokasi' => $_SESSION["kode_lokasi"],
				'kuantitas' => $_POST["addKuantitas"],
				'tahun' => $_POST["addTahun"],
				'bulan' => $_POST["addBulan"],
				'approved' => 0);
			$table = 'data_pariwisata';
			
				$answer = DataPariwisataModel::mdlCreateDataPariwisata($table, $data);
				// var_dump($answer);
				$x = substr($answer,0,1);
				// var_dump($x);	
				if($x == 'B'){
					if($answer == $data['kode_data']){

					echo '<script>
						
						swal({
							type: "success",
							title: "Data berhasil ditambahkan !",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {
									
									window.location = "input-data-bulanan";

								}
							});
						
						</script>';
				} else {
					echo '<script>
						
						swal({
							type: "error",
							title: "Gagal Tambah data",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "input-data-bulanan";
								}
							});
						
						</script>';

				}
				} else {
					if($answer == $data['kode_data']){

					echo '<script>
						
						swal({
							type: "success",
							title: "Data berhasil ditambahkan !",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {
									
									window.location = "input-data";

								}
							});
						
						</script>';
				} else {
					echo '<script>
						
						swal({
							type: "error",
							title: "Gagal Tambah data",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "input-data";
								}
							});
						
						</script>';

				}
				}
				
				

		}
	}


	static public function ctrShowDataPariwisata($item , $value , $tahun, $bulan ,$jenisData,$lokasi){
		
		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";

		$answer = DataPariwisataModel::mdlShowDataPariwisata($tableDataPariwisata,$tableRefKodeData,$item ,$value,$tahun,$bulan,$jenisData,$lokasi);
		return $answer;
	}


	static public function ctrShowDataPariwisataUntukEdit($item , $value){
		
		$tableDataPariwisata = "data_pariwisata";
		$tableRefKodeData = "ref_kode_data";

		$answer = DataPariwisataModel::mdlShowDataPariwisataUntukEdit($tableDataPariwisata,$tableRefKodeData,$item ,$value);
		return $answer;
	}

	static public function ctrDeleteDataPariwisata(){

		if(isset($_GET["idDataPariwisata"])){

			$table ="data_pariwisata";
			$data = $_GET["idDataPariwisata"];
			// var_dump($data);

			$answer = DataPariwisataModel::mdlDeleteDataPariwisata($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Berhasil Mengahapus Data",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  }).then(function(result){
					  	
						if (result.value) {

						window.location = "input-data";

						}
					})

				</script>';

			} else {
				echo'<script>

				swal({
					  type: "error",
					  title: "Gagal Hapus Data",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  })

				</script>';
			}

		}

	}

	static public function ctrDeleteDataPariwisataBulanan(){

		if(isset($_GET["idDataPariwisata"])){

			$table ="data_pariwisata";
			$data = $_GET["idDataPariwisata"];
			// var_dump($data);

			$answer = DataPariwisataModel::mdlDeleteDataPariwisata($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Berhasil Mengahapus Data",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  }).then(function(result){
					  	
						if (result.value) {

						window.location = "input-data-bulanan";

						}
					})

				</script>';

			} else {
				echo'<script>

				swal({
					  type: "error",
					  title: "Gagal Hapus Data",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  })

				</script>';
			}

		}

	}

	static public function ctrEditDataPariwisata(){
		if (isset($_POST["editJenisData"])) {
			// id`, `kode_data`, `kode_lokasi`, `kuantitas`, `tahun`, `bulan`, `approved
			$table = 'data_pariwisata';

			$data = array('kode_data' => $_POST["editNamaData"],
						  'kuantitas' => $_POST["editKuantitas"],
						  'id' => $_POST["EditIdDataPariwisata"],
						  'satuan' => $_POST["satuan"]);

			// var_dump($data);

			$answer = DataPariwisataModel::mdlEditDataPariwisata($table, $data);

			// var_dump($answer);
			if ($answer == 'ok') {
				
				echo '<script>
				
					swal({
						type: "success",
						title: "Berhasil Mengedit Data!",
						showConfirmButton: true,
						confirmButtonText: "Close"

					 }).then(function(result){
						
						if (result.value) {

							window.location = "input-data";
						}

					});
				
				</script>';
			}
			else{
				echo '<script>
					
					swal({
						type: "error",
						title: "No especial characters in the name or blank field",
						showConfirmButton: true,
						confirmButtonText: "Close"
						 }).then(function(result){
								
							if (result.value) {

								window.location = "input-data";
							
							}

						});
					
				</script>';
			}	
		
		}
	}

	static public function ctrEditDataPariwisataBulanan(){
		if (isset($_POST["editJenisData"])) {
			// id`, `kode_data`, `kode_lokasi`, `kuantitas`, `tahun`, `bulan`, `approved
			$table = 'data_pariwisata';

			$data = array('kode_data' => $_POST["editNamaData"],
						  'kuantitas' => $_POST["editKuantitas"],
						  'id' => $_POST["EditIdDataPariwisata"],
						  'satuan' => $_POST["satuan"]);

			// var_dump($data);

			$answer = DataPariwisataModel::mdlEditDataPariwisata($table, $data);

			// var_dump($answer);
			if ($answer == 'ok') {
				
				echo '<script>
				
					swal({
						type: "success",
						title: "Berhasil Mengedit Data!",
						showConfirmButton: true,
						confirmButtonText: "Close"

					 }).then(function(result){
						
						if (result.value) {

							window.location = "input-data-bulanan";
						}

					});
				
				</script>';
			}
			else{
				echo '<script>
					
					swal({
						type: "error",
						title: "No especial characters in the name or blank field",
						showConfirmButton: true,
						confirmButtonText: "Close"
						 }).then(function(result){
								
							if (result.value) {

								window.location = "input-data-bulanan";
							
							}

						});
					
				</script>';
			}	
		
		}
	}
}

	

