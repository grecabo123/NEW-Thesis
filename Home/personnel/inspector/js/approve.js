$(document).ready(function() {
	
	load_approve();

	setInterval(function(){
		load_approve();
	},2000)

});


function load_approve(){

	$.ajax({
		url: "data_approve",
		cache: false,

		success:function(response){
			$('td').remove();

			if (response == 2) {

			}
			else{
				$.each(response, function(index, val) {
					 /* iterate through array or object */
					 $('#approve_data').append('<tr>'+
						'<td>'+val['queue']+'</td>'+
						'<td>'+val['service_type']+'</td>'+
						'<td>'+val['business_name']+'</td>'+
						'<td class="text-center"> <button class="btn btn-outline btn-sm btn-info text-secondary">View</button> </td>'+
				+'<tr>');
				});
			}
		}
	});
}