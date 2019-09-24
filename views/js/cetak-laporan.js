/*=============================================
LOCAL STORAGE VARIABLE 
=============================================*/

if(localStorage.getItem("captureRange2") != null){

	$("#daterange-btn2 span").html(localStorage.getItem("captureRange2"));


}else{

	$("#daterange-btn2 span").html('<i class="fa fa-calendar"></i> Date Range')

}

/*=============================================
DATES RANGE
=============================================*/

$('#daterange-btn2').daterangepicker(
  {
    ranges   : {
      ''       : [moment(), moment()],
      'Januari'	  	: [moment('01', 'MM'), moment('01', 'MM')],
      'Februari'	: [moment('02', 'MM'), moment('02', 'MM')],
      'Maret'	  	: [moment('03', 'MM'), moment('03', 'MM')],
      'April'	    : [moment('04', 'MM'), moment('04', 'MM')],
      'Mei'	  		: [moment('05', 'MM'), moment('05', 'MM')],
      'Juni'		: [moment('06', 'MM'), moment('06', 'MM')],
      'Juli'	  	: [moment('07', 'MM'), moment('07', 'MM')],
      'Agustus'		: [moment('08', 'MM'), moment('08', 'MM')],
      'September'	: [moment('09', 'MM'), moment('09', 'MM')],
      'Oktober'		: [moment('10', 'MM'), moment('10', 'MM')],
      'November'	: [moment('11', 'MM'), moment('11', 'MM')],
      'Desember'	: [moment('12', 'MM'), moment('12', 'MM')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {

    var lokasi = $('#lokasi').val();
    console.log("lokasi", lokasi);

    $('#daterange-btn2 span').html(start.format('MMMM'));

    var initialDate = start.format('M');
    console.log("initialDate", initialDate);


    var finalDate = end.format('M');

    var captureRange = $("#daterange-btn2 span").html();
   
   	localStorage.setItem("captureRange2", captureRange);
        
    
    window.location = "index.php?route=cetak-laporan&initialDate="+initialDate+"&finalDate="+finalDate+"&lokasi="+lokasi;
    
   	

  }

)

/*=============================================
CANCEL DATES RANGE
=============================================*/

$(".daterangepicker.opensright .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("captureRange2");
	localStorage.clear();
  var lokasi = $('#lokasi').val();
  console.log("lokasi", lokasi);
	window.location = "index.php?route=cetak-laporan&lokasi="+lokasi;
})

/*=============================================
CAPTURE TODAY'S BUTTON
=============================================*/

// $(".daterangepicker.opensright .ranges li").on("click", function(){

// 	var todayButton = $(this).attr("data-range-key");

// 	if(todayButton == "Today"){

// 		var d = new Date();
		
// 		var day = d.getDate();
// 		var month= d.getMonth()+1;
// 		var year = d.getFullYear();

// 		if(month < 10){

// 			var initialDate = year+"-0"+month+"-"+day;
// 			var finalDate = year+"-0"+month+"-"+day;

// 		}else if(day < 10){

// 			var initialDate = year+"-"+month+"-0"+day;
// 			var finalDate = year+"-"+month+"-0"+day;

// 		}else if(month < 10 && day < 10){

// 			var initialDate = year+"-0"+month+"-0"+day;
// 			var finalDate = year+"-0"+month+"-0"+day;

// 		}else{

// 			var initialDate = year+"-"+month+"-"+day;
// 	    	var finalDate = year+"-"+month+"-"+day;

// 		}	

//     	localStorage.setItem("captureRange2", "Today");

//     	// window.location = "index.php?route=sales&initialDate="+initialDate+"&finalDate="+finalDate;

// 	}

// })