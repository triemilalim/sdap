/*=============================================
UPLOADING USER PICTURE
=============================================*/

$(".newPics").change(function(){

	var newImage = this.files[0];

	/*===============================================
	=            validating image format            =
	===============================================*/
	
	if (newImage["type"] != "image/jpeg" && newImage["type"] != "image/png"){

		$(".newPics").val("");

		swal({
			type: "error",
			title: "Gagal Upload",
			text: "Foto harus JPG atau PNG",
			showConfirmButton: true,
			confirmButtonText: "Close"
		});

	}else if(newImage["size"] > 2000000){

		$(".newPics").val("");

		swal({
			type: "error",
			title: "Gagal Upload",
			text: "Ukuran Foto Terlalu Besar , maksimal 2MB",
			showConfirmButton: true,
			confirmButtonText: "Close"
		});

	}else{

		var imgData = new FileReader;
		imgData.readAsDataURL(newImage);

		$(imgData).on("load", function(event){
			
			var routeImg = event.target.result;

			$(".preview").attr("src", routeImg);

		});

	}

	/*=====  End of validating image format  ======*/
	
})


/*=============================================
EDITING USER PICTURE
=============================================*/
$(document).on("click", ".btnEditUser", function(){

	var nipUser = $(this).attr("userNip");


	var data = new FormData();
	data.append("nipUserData", nipUser);

	$.ajax({

		url: "ajax/users.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){

			$("#EditId").val(answer["id"]);

 			$("#EditName").val(answer["nama"]);

 			$("#EditNIP").val(answer["nip"]);


 			if(answer["role"] == "opr_kab"){
 				$("#EditRole").html("Operator Kabupaten");
 			} else if(answer["role"] == "opr_kanwil"){
 				$("#EditRole").html("Operator Kanwil");
 			} else if(answer["role"] == "apr_kab"){
 				$("#EditRole").html("Kepala Dinas");
 			} else {
 				$("#EditRole").html("Administrator");
 			}

 			$("#EditRole").val(answer["role"]);

 			$("#currentPasswd").val(answer["password"]);

 			$("#currentPicture").val(answer["file_foto"]);
 			
 			if(answer['file_foto'] != null) {
 				$('.preview').attr('src' , answer['file_foto']);
 			}

 			$("#EditKodeLokasi").val(answer["kode_lokasi"]);

 		}

 	});

});


/*=============================================
ACTIVATE USER
=============================================*/

$(document).on("click", ".btnActivate", function(){

	var userNip = $(this).attr("userNip");
	var userStatusAktif = $(this).attr("userStatusAktif");



	var datum = new FormData();
	datum.append("activateId", userNip);
	datum.append("activateUser", userStatusAktif);

	$.ajax({

		url:"ajax/users.ajax.php",
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
      				window.location = "users";
      			}

      		})

      	}

      }

  })


	if(userStatusAktif == 0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Deactivated');
		$(this).attr('userStatusAktif',1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activated');
		$(this).attr('userStatusAktif',0);

	}

});


/*=============================================
VALIDATE IF USER ALREADY EXISTS
=============================================*/
$("#newNIP").change(function(){
	$(".alert").remove();

	var user = $(this).val();

	var data = new FormData();
	data.append("validateUser", user);

	$.ajax({

		url:"ajax/users.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){ 

      	// console.log("answer", answer);

      	if(answer){

      		$("#newNIP").parent().after('<div class="alert alert-warning">NIP sudah terpakai</div>');
      		
      		// $("#newNIP").val('');
      	}

      }

  });

});

/*=============================================
DELETE USER
=============================================*/

$(document).on("click", ".btnDeleteUser", function(){


	var userNip = $(this).attr("userNip");
	var userPhoto = $(this).attr("userFoto");
	var userNama = $(this).attr("userNama");

	swal({
		title: 'Apakah Kamu Yakin Akan Menghapus User Tersebut ?',
		text: "Klik batal untuk kembali.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		cancelButtonColor: '#3085d6',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Ya, Hapus user!'
	}).then(function(result){

		if(result.value){

			window.location = "index.php?route=users&userNip="+userNip+"&userNama="+userNama+"&userPhoto="+userPhoto;

		}

	})
});


$(document).on("click", "#btnAddUser", function(){

	var dateobj = new Date();  
	var tanggalSekarang = dateobj.getDate(); 
	console.log("tanggalSekarang", tanggalSekarang);


	var bulan = $('#btnAddUser').val();
	var data = new FormData();
	data.append("validateDate", bulan);


	$.ajax({
		url:"ajax/periode.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){ 

			if(tanggalSekarang < answer['tanggal']){
				swal({
					title: "Tanggal Sekarang Lebih dari tanggal deadline",
					type: "error",
					confirmButtonText: "Close"	
				});
			}else{
				$('#addUser').modal('show');
			}



		}

});
});


// // First we initialize a variable with the fruits and their prices per kg
// fruitPrices = {'apple':[3, 5, 6], 'banana':[4, 7, 10]}

// // Listen to changes in selected fruit
// $('#fruit-selector').on('change', function(element) {
//   // Clearing the price selector and getting the selected fruit
//   $('#price-selector').empty();
//   chosenFruit = this.value;

//   // For each price in the fruitPrices for this fruit
//   for (fruitIndex in fruitPrices[chosenFruit]) {
//       // Get the price and create an option element for it
//       price = fruitPrices[chosenFruit][fruitIndex];
//       price_option = '<option>{0} {1}kg {2}$<option>'.replace('{0}', chosenFruit).replace('{1}', fruitIndex + 1).replace('{2}', price);
//       // Add the option to the price selector
//       $('#price-selector').append(price_option)
//   }
// })

// var diction = {
// 	objekWisata: ["Objek Wisata Budaya", "Objek Wisata Bahari", "Objek Wisata Pertanian"],
// 	penginapan: ["Hotel", "Wisma", "Motel"]
// }

// bind change event handler
// $('#newJenis').change(function() {
//   // get the second dropdown
//   $('#newNama').html(
//       // get array by the selected value
//       diction[this.value]
//       // iterate  and generate options
//       .map(function(v) {
//         // generate options with the array element
//         return $('<option/>', {
//         	value: v,
//         	text: v
//         });
//     })
//       )
//     // trigger change event to generate second select tag initially
// }).change();


// $('#newJenis').on('change', function() {
//   $('#newNama').html(
//     diction[$(this).val()].reduce(function(p, c) {
//       return p.concat('<option value="' + c + '">' + c + '</option>');
//     }, '')
//   );
// }).trigger('change');
var newSatuan = document.getElementById("newSatuan");
// var optionText = $("#firstList option:selected").val();


// var list1 = document.getElementById("firstList");
// var list2 = document.getElementById("secondList");
// function getItem(){
//  			var optionText = $("#firstList option:selected").val();
// 			var optionText2 = $("#secondList option:selected").val();
// 			var list1 = document.getElementById("firstList");
// 			var list2 = document.getElementById("secondList");
             
//             if (optionText=='penginapan')
//             {
                 
//                 list2.options.length=0;
//                 // list2.options[0] = new Option('--Select--', '');
//                 list2.options[0] = new Option('Hotel', 'hotel');
//                 list2.options[1] = new Option('Wisma', 'wisma');
//                 list2.options[2] = new Option('Condotel', 'Condotel');
//                 list2.options[3] = new Option('Motel', 'motel');
//                 newSatuan.setAttribute("value", "Unit");

                 
//             }
//             else if (optionText=='objekWisata')
//             {
                 
//                 list2.options.length=0;
//                 list2.options[0] = new Option('Objek Wisata Bahari', 'Objek Wisata Bahari');
//                 list2.options[1] = new Option('Objek Wisata Budaya', 'Objek Wisata Budaya');
//                 list2.options[2] = new Option('Objek Wisata Cagar Alam', 'Objek Wisata Cagar Alam');
//                 list2.options[3] = new Option('Objek Wisata Alama', 'Objek Wisata Alama');
//                 newSatuan.setAttribute("value", "Objek");
                 
//             }
//             else if (optionText=='pemanduWisata')
//             {
                 
//                 list2.options.length=0;
//                 list2.options[0] = new Option('Bersetifikat', 'Bersetifikat');
//                 list2.options[1] = new Option('Tidak Bersetifikat', 'Tidak Bersetifikat');
//                 newSatuan.setAttribute("value", "Orang");
                 
//             }
//             else if (optionText=='restoran')
//             {
                 
//                 list2.options.length=0;
//                 list2.options[0] = new Option('American Food', 'American Food');
//                 list2.options[1] = new Option('Chinnese Food', 'Chinnese Food');
//                 newSatuan.setAttribute("value", "Resto");
                 
//             }
//             else if (optionText=='usahaMakananMinuman')
//             {
                 
//                 list2.options.length=0;
//                 list2.options[0] = new Option('Kafe', 'Kafe');
//                 list2.options[1] = new Option('Kantin', 'Kantin');
//                 newSatuan.setAttribute("value", "Buah");
                 
//             }
//             else if (optionText=='cendramata')
//             {
                 
//                 list2.options.length=0;
//                 list2.options[0] = new Option('Toko Cendramata', 'Toko Cendramata');
//                 list2.options[1] = new Option('Pedagang Cendramata Non Toko', 'Pedagang Cendramata Non Toko');  
//                 // $('#example').append('<option value="foo" selected="selected">Foo</option>');                   
//             }


// }


// VALIDATE NIP NUMBER ONLY
// Restricts input for the given textbox to the given inputFilter.
// function setInputFilter(textbox, inputFilter) {
//   ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
//     textbox.addEventListener(event, function() {
//       if (inputFilter(this.value)) {
//         this.oldValue = this.value;
//         this.oldSelectionStart = this.selectionStart;
//         this.oldSelectionEnd = this.selectionEnd;
//       } else if (this.hasOwnProperty("oldValue")) {
//         this.value = this.oldValue;
//         this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
//       }
//     });
//   });
// }


// // Install input filters.
// setInputFilter(document.getElementById("newNIP"), function(value) {
//   return /^\d*$/.test(value); });
// END OF VALIDATE NIP NUMBER ONLY