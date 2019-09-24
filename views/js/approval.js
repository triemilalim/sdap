/*=============================================
xxxx
=============================================*/

$(document).on("click", ".btnApprove", function(){
	var statusApprove = $(this).attr("statusApprove");
	console.log("statusApprove", statusApprove);

	var dataId = $(this).attr("dataId");
	console.log("dataId", dataId);

	var datum = new FormData();
	datum.append("approveId", dataId);
	datum.append("approveData", statusApprove);

	$.ajax({

		url:"ajax/approval.ajax.php",
		method: "POST",
		data: datum,
		cache: false,
		contentType: false,
		processData: false,
		success: function(answer){

 		}
 	})

      	// if(window.matchMedia("(max-width:767px)").matches){

      	// 	swal({
      	// 		title: "The user status has been updated",
      	// 		type: "success",
      	// 		confirmButtonText: "Close"	
      	// 	}).then(function(result) {

      	// 		if (result.value) {
      	// 			window.location = "approval";
      	// 		}

      	// 	})

      	// }
      

      	


	if(statusApprove == 0){
		$('#'+ dataId).removeClass('btn-success');
		$('#'+ dataId).removeClass('btn-danger');
		$('#'+ dataId).addClass('btn-warning');
		$('#'+ dataId).html('Belum Disetujui');
		$(this).attr('statusApprove',1);

	}else if (statusApprove == 1){
		$('#'+ dataId).addClass('btn-success');
		$('#'+ dataId).removeClass('btn-danger');
		$('#'+ dataId).removeClass('btn-warning');
		$('#'+ dataId).html('Disetujui');
		$(this).attr('statusApprove',0);

	} else {
		$('#'+ dataId).addClass('btn-danger');
		$('#'+ dataId).removeClass('btn-warning');
		$('#'+ dataId).removeClass('btn-success');
		$('#'+ dataId).html('Ditolak');
		$(this).attr('statusApprove',2);
	}

});