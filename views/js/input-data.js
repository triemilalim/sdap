var data;

function getJenisData(){

	var kode_data = $("#addJenisData option:selected").val();
	var optionPilihJenis = $("#addNamaData option:selected").val();
	var optionPilihNama = document.getElementById("addNamaData");
	var addSatuan = document.getElementById("addSatuan");
	addSatuan.setAttribute("value", "");


	var datum = new FormData();
	datum.append("kode_data", kode_data);

	$.ajax({
		url: "ajax/ref-kode-data.ajax.php",
		method: "POST",
      	data: datum,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(answer){
     		console.log("answer", answer);
     			data = answer;
     		    optionPilihNama.options.length=0;
                for (var i = 0; i < answer.length; i++){
                	optionPilihNama.options[i] = new Option(answer[i]["keterangan"], answer[i]["kode_data"]);

                }    

     	}

	});

}

function getJenisDataEdit(){
	// $("#editNamaData").prop("disabled", false);
	var kode_data = $("#editJenisData option:selected").val();
	var optionPilihJenis = $("#editNamaData option:selected").val();
	var optionPilihNama = document.getElementById("editNamaData");
	var editSatuan = document.getElementById("satuan");
	editSatuan.setAttribute("value", "");


	var datum = new FormData();
	datum.append("kode_data", kode_data);

	$.ajax({
		url: "ajax/ref-kode-data.ajax.php",
		method: "POST",
      	data: datum,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(answer){
     		console.log("xxxx", answer);
     			data = answer;
     		    optionPilihNama.options.length=0;
                for (var i = 0; i < answer.length; i++){
                	optionPilihNama.options[i] = new Option(answer[i]["keterangan"], answer[i]["kode_data"]);

                }    

     	}

	});

}

function getNamaData() {

	var param = $("#addNamaData option:selected").val();
	var status = "";
	for (var i = 0; i < data.length; i++){
		if (data[i]["kode_data"] == param){
			status = data[i]["satuan"];
		}
	}
	document.getElementById("addSatuan").setAttribute("value", status);

}			

function getNamaDataEdit() {
	// console.log("data" , data)
	var satuan = document.getElementById("satuan");
	var param = $("#editNamaData option:selected").val();
	console.log("param", param);
	
	var status2 = "";
	for (var i = 0; i < data.length; i++){
		if (data[i]["kode_data"] == param){
			status2 = data[i]["satuan"];
			console.log("status2", status2);

		}
	}
	// document.getElementById("satuan").setAttribute("value", status2);
	$("#satuan").val(status2);


}	         

$(document).on("click", ".btnPersetujuan", function(){

	var idDataPariwisata = $(this).attr("idDataPariwisata");
	console.log("idDataPariwisata", idDataPariwisata);
	var statusApproved = $(this).attr("statusApproved");
	console.log("statusApproved", statusApproved);

	var datum = new FormData();
	datum.append("idDataPariwisata", idDataPariwisata);
	datum.append("statusApproved", statusApproved);

	$.ajax({

		url:"ajax/data-pariwisata.ajax.php",
		method: "POST",
		data: datum,
		cache: false,
		contentType: false,
		processData: false,
		success: function(answer){

      	// if(window.matchMedia("(max-width:767px)").matches){

      		swal({
      			title: "The user status has been updated",
      			type: "success",
      			confirmButtonText: "Close"	
      		}).then(function(result) {

      			if (result.value) {
      				window.location = "input-data";
      			}

      		})

      	}

      // }

  })

	// 0 = belum disetujui 
	// 1 = sudah disetujui 
	if(statusApproved == 0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Belum Setuju');
		$(this).attr('statusApproved',1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Setuju');
		$(this).attr('statusApproved',0);

	}

});

$(document).on("click", ".btnDeleteDataPariwisata", function(){
	
	var idDataPariwisata = $(this).attr("idDataPariwisata");
	console.log("idDataPariwisata", idDataPariwisata);


	swal({
		title: 'Apakah Kamu Yakin Akan Menghapus Data Tersebut ?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Ya, Hapus Data!'
	}).then(function(result){

		if(result.value){
			// window.location = "index.php?route=users&userNip="+userNip+"&userNama="+userNama+"&userPhoto="+userPhoto;
			window.location = "index.php?route=input-data&idDataPariwisata="+idDataPariwisata;

		}

	})
});
             

$(document).on("click", "#btnAddDataPariwisata", function(){
	var getDate = new Date();  
	var tanggalSekarang = getDate.getDate(); 
	console.log("tanggalSekarang", tanggalSekarang);



	// var bulan = $('#btnAddDataPariwisata').val();// sebagai paramete query untuk mendapatkan deadline per bulannya berapa 
	var bulan = $(this).attr("bulan");
	var tahun = $(this).attr("tahun");

	if(bulan == 0){
		tahun = tahun - 1 ;
		bulan = 12; 
	}

	console.log("bulan if" , bulan);
	console.log("tahun if" , tahun);

	document.getElementById("addTahun").setAttribute('value', tahun);
	document.getElementById("addBulan").setAttribute('value', bulan);

	var data = new FormData();
	data.append("validateBulan", bulan);
	data.append("validateTahun", tahun);


	$.ajax({
		url:"ajax/periode.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){ 

			console.log("answer" , answer);

			if(tanggalSekarang > answer['tanggal']){
				swal({
					title: "Tanggal Sekarang Lebih dari tanggal deadline",
					type: "error",
					confirmButtonText: "Close"	
				});
			}else{
				$('#addDataPariwisata').modal('show');
			}



		}    

	})
});

$(document).on("click", ".btnEditDataPariwisata", function(){
	// $('#editNamaData').prop('disabled', 'disabled');
	var idDataPariwisatax = $(this).attr("idDataPariwisata");
	console.log("idDataPariwisata", idDataPariwisatax);

	var datum = new FormData();
	datum.append("idDataPariwisataUntukEditData", idDataPariwisatax);
	console.log("datum", datum);

	$.ajax({

		url: "ajax/data-pariwisata.ajax.php",
		method: "POST",
		data: datum,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){

			var kode_data = answer["kode_data"];
			var substring_kodedata = kode_data.substring(0, 2);

			$("#EditIdDataPariwisata").val(answer["id"]);
			$("#editJenisData").val(substring_kodedata);
			$(".editNamaData").val(answer["kode_data"]);
			$(".editNamaData").html(answer["keterangan"]);
 			$("#satuan").val(answer["satuan"]);
 			$("#editKuantitas").val(answer["kuantitas"]);


 		}

 	});
});