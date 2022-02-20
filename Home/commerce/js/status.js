$(document).ready(function(){

	status();


	setInterval(function(){
		status();
	},2000);

});


function status(){
	$.ajax({
		url: "status_load",
		success:function(response){
			$('td').remove();
			if (response == 2) {
				
			}
			else{

				$.each(response, function(index, val) {
					if (val['status_cro'] == "lacking" && val['service_type'] == "FSIC-Business Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="text-danger" href="compilation_fsic" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+"<span class'text-danger'>Comply</span>"+'</a></td>'+
                            '</tr>'
						);
					}
					else if (val['status_cro'] == "lacking" && val['service_type'] == "FSEC-Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="text-danger" href="compilation_fsec" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+"<span class'text-danger'>Comply</span>"+'</a></td>'+
                            '</tr>'
						);
					}
					else if (val['status_cro'] == "lacking" && val['service_type'] == "FSIC-Occupancy Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="text-danger" href="compilation_occupancy" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+"<span class'text-danger'>Comply</span>"+'</a></td>'+
                            '</tr>'
						);
					}
					else if (val['status_cro'] == "pending") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                            '</tr>'
						);
					}
				});
			}	
		}
	});
}