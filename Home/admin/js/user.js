$(document).ready(function(){
	load_data_user();


	setInterval(function(){
		load_data_user();
	},2600);
});

function load_data_user(){

	$.ajax({
		url: "account/user",
		success:function(response){
			$.each(response, function(index, val) {
				$('td').remove();
				if (response == 2) {

				}
				else{
					$.each(response, function(index, val) {
						if (val['account'] == "Verified in Google") {
							$('#table_data').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['tbl_user_id']+'</span></td>'+
	                                '<td class="text-light">'+val['fname']+' '+val['lname']+'</td>'+
	                                '<td class="text-light">'+val['email']+'</td>'+
	                                '<td class="text-light"> <span class="text-success">Google</span> </td>'+
	                            '</tr>'
							);
						}
						else if (val['account'] == "Verified in Facebook") {
							$('#table_data').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['tbl_user_id']+'</span></td>'+
	                                '<td class="text-light">'+val['fname']+' '+val['lname']+'</td>'+
	                                '<td class="text-light">'+val['email']+'</td>'+
	                                '<td class="text-light"> <span class="text-primary">Facebook</span> </td>'+
	                            '</tr>'
							);
						}
						else if (val['account'] == null) {
							$('#table_data').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['tbl_user_id']+'</span></td>'+
	                                '<td class="text-light">'+val['fname']+' '+val['lname']+'</td>'+
	                                '<td class="text-light">'+val['email']+'</td>'+
	                                '<td class="text-light"> <span class="text-info">BFP</span> </td>'+
	                            '</tr>'
							);
						}
					});
				}
			});
		}
	});
}