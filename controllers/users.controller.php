<?php

class ControllerUsers{

	/*=============================================
	USER LOGIN
	=============================================*/
	
	static public function ctrUserLogin(){

		if (isset($_POST["loginUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginUser"]) && 
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginPass"])) {
				
				$table = 'user';
				$table2= 'ref_kode_lokasi';

				$item = 'nip';
				$value = $_POST["loginUser"];

				$answer = UsersModel::MdlShowUsers($table, $table2, $item, $value);

				if($answer["nip"] == $_POST["loginUser"] && $answer["password"] == $_POST["loginPass"]){

					if($answer["status_aktif"] == 1){

						$_SESSION["loggedIn"] = "ok";
						$_SESSION["nip"] = $answer["nip"];
						$_SESSION["nama"] = $answer["nama"];
						$_SESSION["file_foto"] = $answer["file_foto"];
						$_SESSION["role"] = $answer["role"];
						$_SESSION["status_aktif"] = $answer["status_aktif"];
						$_SESSION["kode_lokasi"] = $answer["kode_lokasi"];

					if($_SESSION["role"] != 'admin'){
						echo '<script>

						window.location = "home";

					</script>';
					}else {
						echo '<script>

						window.location = "users";

					</script>';
					}
					


					}else{
						
						echo '<br><div class="alert alert-danger">User is deactivated</div>';
					
					}

				}else{

					echo '<br><div class="alert alert-danger">User or password incorrect</div>';
				
				}
			
			}
		
		}
	
	}


	/*=============================================
	CREATE USER
	=============================================*/
	
	static public function ctrCreateUser(){

		if (isset($_POST["newNIP"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newNama"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newNIP"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPasswd"])){

				/*=============================================
				VALIDATE IMAGE
				=============================================*/

				$photo = "";
			
				if (isset($_FILES["newPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);
					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Let's create the folder for each user
					=============================================*/

					$folder = "views/img/users/".$_POST["newNama"];

					mkdir($folder, 0755);

					/*=============================================
					PHP functions depending on the image
					=============================================*/

					if($_FILES["newPhoto"]["type"] == "image/jpeg"){

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["newNama"]."/".$randomNumber.".jpg";
						
						$srcImage = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destination, $photo);

					}

					if ($_FILES["newPhoto"]["type"] == "image/png") {

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["newNama"]."/".$randomNumber.".png";
						
						$srcImage = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destination, $photo);
					}

				}

				$table = 'user';

				$encryptpass = crypt($_POST["newPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$data = array('nama' => $_POST["newNama"],
							  'nip' => $_POST["newNIP"],
								'password' => $encryptpass,
								'role' => $_POST["newRole"], 
								'kode_lokasi' =>$_POST["newKodeLokasi"],
								'file_foto' => $photo,
								'status_aktif' => 1);

				
				var_dump($data);

				$answer = UsersModel::mdlAddUser($table, $data);

				if ($answer == 'ok') {

						echo '<script>
						
						swal({
							type: "success",
							title: "User Berhasil Ditambahkan!",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
						
						</script>';

				} 
				else {
					echo '<script>
						
						swal({
							type: "error",
							title: "Gagal Tambah User!",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
						
						</script>';
				}
			
			}else{

				echo '<script>
					
					swal({
						type: "error",
						title: "Terdapat spesial karakter atau isian yang kosong",
						showConfirmButton: true,
						confirmButtonText: "Close"
			
						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
					
				</script>';
			}
			
		}
	}

	/*=============================================
	SHOW USER
	=============================================*/

	static public function ctrShowUsers($item, $value){

		$table = "user";
		$table2 = "ref_kode_lokasi";

		$answer = UsersModel::MdlShowUsers($table,$table2, $item, $value);
		return $answer;
	}

	/*=============================================
	SHOW Lokasi
	=============================================*/
	static public function ctrShowUsersLokasi($item, $value){

		$table = "ref_kode_lokasi";

		$answer = UsersModel::MdlShowUsersLokasi($table, $item, $value);
		return $answer;
	}

	/*=============================================
	EDIT USER
	=============================================*/

	static public function ctrEditUser(){

		if (isset($_POST["EditNIP"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditName"])){

				/*=============================================
				VALIDATE IMAGE
				=============================================*/

				$photo = $_POST["currentPicture"];

				if(isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);
					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Let's create the folder for each user
					=============================================*/

					$folder = "views/img/users/".$_POST["EditName"];

					/*=============================================
					we ask first if there's an existing image in the database
					=============================================*/

					if (!empty($_POST["currentPicture"])){
						
						unlink($_POST["currentPicture"]);

					}else{

						mkdir($folder, 0755);

					}

					/*=============================================
					PHP functions depending on the image
					=============================================*/

					if($_FILES["editPhoto"]["type"] == "image/jpeg"){

						/*We save the image in the folder*/

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["EditName"]."/".$randomNumber.".jpg";
						
						$srcImage = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destination, $photo);

					}
					
					if ($_FILES["editPhoto"]["type"] == "image/png") {

						/*We save the image in the folder*/

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["EditName"]."/".$randomNumber.".png";
						
						$srcImage = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destination, $photo);
					}

				}

				
				$table = 'user';

				if($_POST["EditPasswd"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["EditPasswd"])){

						$encryptpass = crypt($_POST["EditPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}

					else{

						echo '<script>
					
							swal({
								type: "error",
								title: "No especial characters in the password or blank fields",
								showConfirmButton: true,
								confirmButtonText: "Close"

								}).then(function(result){
										
									if (result.value) {
						
										window.location = "users";

									}
								});
							
						</script>';
					}
				
				}else{

					$encryptpass = $_POST["currentPasswd"];
					
				}

				$data = array('nama' => $_POST["EditName"],
								'nip' => $_POST["EditNIP"],
								'password' => $_POST["EditPasswd"],
								'role' => $_POST["EditRole"],
								'id'   =>$_POST["EditId"],
								'kode_lokasi' => $_POST["EditKodeLokasi"],
								'file_foto' => $photo);
				// var_dump($data);

				$answer = UsersModel::mdlEditUser($table, $data);


				if ($answer == 'ok') {
					
					echo '<script>
					
						swal({
							type: "success",
							title: "Berhasil Mengedit User!",
							showConfirmButton: true,
							confirmButtonText: "Close"

						 }).then(function(result){
							
							if (result.value) {

								window.location = "users";
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

									window.location = "users";
								
								}

							});
						
					</script>';
				}
			
			}	
		
		}
	
	}

	/*=============================================
	DELETE USER
	=============================================*/

	static public function ctrDeleteUser(){

		if(isset($_GET["userNip"])){

			$table ="user";
			$data = $_GET["userNip"];
			var_dump($data);

			if($_GET["userPhoto"] != ""){

				unlink($_GET["userPhoto"]);				
				rmdir('views/img/users/'.$_GET["userNama"]);

			}

			$answer = UsersModel::mdlDeleteUser($table, $data);
			var_dump($answer);
			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Berhasil Menghapus User",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  }).then(function(result){
					  	
						if (result.value) {

						window.location = "users";

						}
					})

				</script>';

			} else {
				echo'<script>

				swal({
					  type: "error",
					  title: "Terjadi Kesalahan",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  })

				</script>';
			}

		}

	}
	
}

