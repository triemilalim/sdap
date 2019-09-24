$(document).on("click", "#editJatuhTempo", function(){

	var namaBulan = $('.namaBulan').find(":selected").val();
  	console.log("namaBulan", namaBulan);
  	var tahun = $('.tahun').find(":selected").val();
  	console.log("tahun", tahun);
  	var tanggalBaru = $('.tanggalBaru').find(":selected").val();
  	console.log("tanggalBaru", tanggalBaru);

  	



	var datum = new FormData();
	datum.append("bulanJatuhTempo", namaBulan);
	datum.append("tahunJatuhTempo", tahun);
	datum.append("tanggalJatuhTempo", tanggalBaru);


	$.ajax({

		url:"ajax/periode.ajax.php",
		method: "POST",
		data: datum,
		cache: false,
		contentType: false,
		processData: false,
		success: function(answer){

      	console.log("answer", answer);
      		
      		swal({
      			title: "Tanggal Jatuh Tempo Berhasil Diupdate",
      			type: "success",
      			confirmButtonText: "Close"	
      		}).then(function(result) {

      			if (result.value) {
      				window.location = "edit-jatuh-tempo";
      			}

      		})

      	

      }

  })

});