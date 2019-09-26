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


$(document).on("click", ".namaBulan", function(){
   var namaBulan = $('.namaBulan').find(":selected").val();
   if(namaBulan == 2){
      $("#tanggalBaru option[value='30']").hide();
      $("#tanggalBaru option[value='31']").hide();
   } else if(namaBulan == 4 || namaBulan == 6 || namaBulan == 9 || namaBulan == 11)  {
      $("#tanggalBaru option[value='31']").hide();
      $("#tanggalBaru option[value='30']").show();
   } else {
       $("#tanggalBaru option[value='30']").show();
      $("#tanggalBaru option[value='31']").show();
   }
});