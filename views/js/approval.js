/*=============================================
xxxx
=============================================*/

$(document).on("click", ".btnApprove", function(){

	var dataId = $(this).attr("dataId");
	var statusApprove = $(this).attr("statusApprove");

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

      	console.log("answer", answer);

      	if(window.matchMedia("(max-width:767px)").matches){

      		swal({
      			title: "The user status has been updated",
      			type: "success",
      			confirmButtonText: "Close"	
      		}).then(function(result) {

      			if (result.value) {
      				window.location = "approval";
      			}

      		})

      	}

      }

  })

	if(statusApprove == 0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Belum Disetujui');
		$(this).attr('statusApprove',1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Disetujui');
		$(this).attr('statusApprove',0);

	}

});