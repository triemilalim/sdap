var newSatuan = document.getElementById("newSatuan");


function getItem(){


	var objekWisata = $(this).attr("value");
	console.log("objekWisata", objekWisata);
	console.log("newSatuan", newSatuan);

	// var datum = new FormData();
	// datum.append("idCategory", idCategory);

	// $.ajax({
	// 	url: "ajax/categories.ajax.php",
	// 	method: "POST",
 //      	data: datum,
 //      	cache: false,1
 //     	contentType: false,
 //     	processData: false,
 //     	dataType:"json",
 //     	success: function(answer){
     		
 //     		// console.log("answer", answer);

 //     		$("#editCategory").val(answer["Category"]);
 //     		$("#idCategory").val(answer["id"]);

 //     	}

	// })


 			var optionText = $("#firstList option:selected").val();
			var optionText2 = $("#secondList option:selected").val();
			var list1 = document.getElementById("firstList");
			var list2 = document.getElementById("secondList");
             
            if (optionText=='penginapan')
            {
                 
                list2.options.length=0;
                // list2.options[0] = new Option('--Select--', '');
                list2.options[0] = new Option('Hotel', 'hotel');
                list2.options[1] = new Option('Wisma', 'wisma');
                list2.options[2] = new Option('Condotel', 'Condotel');
                list2.options[3] = new Option('Motel', 'motel');
                newSatuan.setAttribute("value", "Unit");

                 
            }
            else if (optionText=='objekWisata')
            {
                 
                list2.options.length=0;
                list2.options[0] = new Option('Objek Wisata Bahari', 'Objek Wisata Bahari');
                list2.options[1] = new Option('Objek Wisata Budaya', 'Objek Wisata Budaya');
                list2.options[2] = new Option('Objek Wisata Cagar Alam', 'Objek Wisata Cagar Alam');
                list2.options[3] = new Option('Objek Wisata Alama', 'Objek Wisata Alama');
                newSatuan.setAttribute("value", "Objek");
                 
            }
            else if (optionText=='pemanduWisata')
            {
                 
                list2.options.length=0;
                list2.options[0] = new Option('Bersetifikat', 'Bersetifikat');
                list2.options[1] = new Option('Tidak Bersetifikat', 'Tidak Bersetifikat');
                newSatuan.setAttribute("value", "Orang");
                 
            }
            else if (optionText=='restoran')
            {
                 
                list2.options.length=0;
                list2.options[0] = new Option('American Food', 'American Food');
                list2.options[1] = new Option('Chinnese Food', 'Chinnese Food');
                newSatuan.setAttribute("value", "Resto");
                 
            }
            else if (optionText=='usahaMakananMinuman')
            {
                 
                list2.options.length=0;
                list2.options[0] = new Option('Kafe', 'Kafe');
                list2.options[1] = new Option('Kantin', 'Kantin');
                newSatuan.setAttribute("value", "Buah");
                 
            }
            else if (optionText=='cendramata')
            {
                 
                list2.options.length=0;
                list2.options[0] = new Option('Toko Cendramata', 'Toko Cendramata');
                list2.options[1] = new Option('Pedagang Cendramata Non Toko', 'Pedagang Cendramata Non Toko');  
                // $('#example').append('<option value="foo" selected="selected">Foo</option>');                   
            }


}