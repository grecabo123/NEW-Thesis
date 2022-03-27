$(document).ready(function(){

	load_data_complete();

	setInterval(function(){
		load_data_complete();
	},2500);

	$(document).on('click', '#view_details', function(event) {
		event.preventDefault();
 		var id = $(this).attr('value');
		console.log(id);
		/* Act on the event */
	});
});


function load_data_complete(){
	// console.log("12");

	$.ajax({
		url: "completed",
		cache: false,

		success:function(response){
			$('td').remove();
			if (response == 2) {

			}
			else{
				$.each(response, function(index, val) {
					$('#tbl_complete').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light">'+val['business_name']+'</td>'+
                                '<td class="text-light text-center"> <button id="view_details" value="'+val['tbl_service_id']+'" class="btn btn-sm-outline text-info">Details</button> </td>'+
                            '</tr>'
					);
				});
			}
		}
	});
}