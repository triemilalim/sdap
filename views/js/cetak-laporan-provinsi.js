$(".showDataProvinsi").on("click", function(e){

	var namaBulan = $('.namaBulan').find(":selected").val();
  console.log("namaBulan", namaBulan);
  var satuanKerja = $('.satuanKerja').find(":selected").val();
	var datum = new FormData();
	datum.append("valueBulan", namaBulan);
	datum.append("valueSatker", satuanKerja);
	var table = $("#records_table tbody");
	$.ajax({
		url: "ajax/cetak-laporan-provinsi.ajax.php",
		method: "POST",
      data: datum,
      cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(answer){
        // window.location = "index.php?route=cetak-laporan-provinsi&bulan="+namaBulan+"&lokasi="+satuanKerja;
      // window.location = "index.php?route=cetak-laporan-provinsi&bulan="+namaBulan+"&satuanKerja="+satuanKerja;

      var trHTML = '';
      table.empty();

      for (var i = 0; i < answer.length; i++){
      	trHTML += '<tr><td>' + (i+1) + '</td><td>' + answer[i]['keterangan'] + '</td><td>' +answer[i]['kuantitas'] + '</td><td>' +answer[i]['satuan'] + '</td></tr>';
      }
	 table.append(trHTML);

	 $('#records_table').dataTable();
   // window.history.pushState({"html":"pageTitle"},"", "index.php?route=cetak-laporan-provinsi&bulan="+namaBulan+"&lokasi="+satuanKerja);
  
   
   

	}


})

// window.location = "index.php?route=cetak-laporan-provinsi&bulan="+namaBulan+"&satuanKerja="+satuanKerja;console.log("xxx");
// e.preventDefault();console.log("asd");
})

$("#exportProvinisi").on("click", function(){
  var namaBulan = $('.namaBulan').find(":selected").val();
  console.log("namaBulan", namaBulan);
  var satuanKerja = $('.satuanKerja').find(":selected").val();
  console.log("satuanKerja", satuanKerja);
  // if(namaBulan != ""){
  //     console.log("tidak kosong");
      window.location = "views/modules/download-report-provinsi.php?report=report&bulan="+namaBulan+"&lokasi="+satuanKerja;
  // }

  // else{
  //     console.log("kosong");
  //     window.location = "views/modules/download-report-provinsi.php?report=report";
  // }
  
})
