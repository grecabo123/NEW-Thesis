$(document).ready(function() {
	

	$(document).on('click', '#btn_fk', function(event) {
		event.preventDefault();
		var id = $(this).val();



		$.ajax({
			url: "search",
			type: "POST",
			data:{
				"correction" : true,
				id:id,
			},
			success:function(response){
				// console.log(response);
				if (response == 2) {

				}
				else{
					$('.correction').addClass('bg-active');
					$.each(response, function(index, val) {
						const img = "../../commerce/Payment/"+''+val['correction_fee'];
						const pdf_file ="../../inspector/Record/"+''+val['file_upload'];
						 $('#inspection_ref').prop('value',val['inspection_no']);
						 $('#owner_name').prop('value',val['business_owner']);
						 $('#esta').prop('value',val['business_name']);
						 $('.correction_file').attr('src',img);
						 $('#pdf').attr('href',pdf_file);
						 $('#proceed').attr('value',val['tbl_service_id']);
					});
				}
			}
		});
	});

	$('#proceed').click(function(event) {
		/* Act on the event */
		const id = $(this).attr('value');

		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"update_correction": true,
				id:id,
			},
			success:function(response){
				if (response == 1) {
					$('.correction').removeClass('bg-active');
				}
				else{
					
				}
			}
		});
	});

	load_payment();
	setInterval(function(){
		load_payment();
	},2000)


});


function Close_modal(){
	$('#owner_name').val('');
	$('#esta').val('');
	$('#inspection_ref').val('');
	$('.correction').removeClass('bg-active');
}

function load_payment(){
	$.ajax({
			type: "POST",
			url: "correction_fee",
			success:function(response){
				// console.log(response)
				$('td').remove();
				if (response == 2) {
					
				}
				else{

					$.each(response, function(index, val) {
						$('#table_data').append('<tr>'+
									'<td class="text-light"> <button class="btn btn-outline btn-sm" value="'+val['tbl_service_id']+'" id="btn_fk"><span id="fk_id" class="text-primary">'+val['queue']+'</span></button></td>'+
                                    '<td class="text-light">'+val['service_type']+'</td>'+
                                    '<td class="text-light">'+val['business_name']+'</td>'+
                                '</tr>'
						);
					});
				}		
			}
		});
}