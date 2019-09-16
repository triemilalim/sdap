// $(document).ready(function() {
//     $('#example').DataTable( {
//         "ajax": "data/arrays.txt"
//     } );
// } );


$.ajax({

	url: "ajax/datatable-products.ajax.php",
	success:function(answer){
		
		console.log("answer", answer);

	}

})
