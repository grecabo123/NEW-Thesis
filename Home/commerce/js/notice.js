$(document).ready(function(){
	load_file();
	$(document).on('click', '.file_pdf', function(event) {
		event.preventDefault();
		/* Act on the event */
		var url = $(this).attr('value');;
		PDFObject.embed(url);
		
	});

	$('#file_admin').change(function(event) {
		
		var type = $('#file_admin').val().split('.').pop().toLowerCase();

		if ($('#file_admin')[0].files.length === 1 && $.inArray(type,['png','jpeg','jpg','pdf']) == 0) {
			$('#submit').attr('disabled',false);
		}
		else{
			$('#submit').attr('disabled',true);
		}
	});


	// submit and ready
	$('#submit').click(function(event) {
		/* Act on the event */
		var id = $(this).attr('value');

		var type = $('#file_admin')[0].files[0];

		var type_file = $('#file_admin').val().split('.').pop().toLowerCase();

		var form_data = new FormData();

		if ($('#file_admin')[0].files.length === 1 && $.inArray(type_file,['png','jpeg','jpg','pdf']) == 0) {
			$('#submit').attr('disabled',false);


			form_data.append('file_payment',type);
			form_data.append('id',id);

			$.ajax({
				url: "update",
				type: "POST",
				datatype: "script",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				success:function(response){
					// console.log(response);
					if (response == 1) {
						setTimeout(function(){
							alertify.success("Notification Sent");
						},2000);
						setTimeout(function(){
							window.location= "../status";
						},2500);
					}
					else{
						setTimeout(function(){
							alertify.error("Something Went Wrong");
						},2000);
						setTimeout(function(){
							window.location= "business";
						},2500);
					}
				}
			});
		}
		else{
			$('#submit').attr('disabled',true);
		}
	});
});


function load_file(){

	$.ajax({
		url: "load",
		cache: false,

		success:function(response){
			// console.log(response);
			if (response == 2){

			}
			else{
				$.each(response, function(index, val) {
					var location = "../../personnel/inspector/Record/"+''+val['file_upload'];
					var location1 = "../../personnel/inspector/Record/"+''+val['inspection_order'];
					$('.list_file').append('<li class="mt-2">'+
                            '<button class="btn btn-sm btn-outline-secondary file_pdf" value="'+location+'">'+val['file_upload']+'</button>'+
                        '</li>'+
                        '<li class="mt-2">'+
                        '<button class="btn btn-sm btn-outline-secondary file_pdf" value="'+location1+'">'+val['inspection_order']+'</button>'+
                        '</li>');
				});
			}
		}
	});
}

function refresh(){
	window.location = "Comply";
}




