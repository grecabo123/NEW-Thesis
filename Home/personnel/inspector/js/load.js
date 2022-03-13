$(document).ready(function(){
	load_data_inspection();


	setInterval(function(){
		load_data_inspection();
	},2000);
});

function load_data_inspection(){

	$.ajax({
		url: "load",
		cache: false,

		success:function(response){
			// console.log(response);

			
			$('td').remove();
			if (response == 2) {

			}
			else{
				$.each(response, function(index, val) {
					if (val['inspection'] == "pending") {
						$('#table_data').append('<tr>'+
						'<td>'+val['queue']+'</td>'+
						'<td>'+val['service_type']+'</td>'+
						'<td>'+val['business_name']+'</td>'+
						'<td class="text-danger">'+val['inspection']+'</td>'+
						'<td class="text-center">'+
                          '<ul>'+
                          	'<li>'+
                          		'<button class="btn btn-success" id="form" value="'+val['tbl_service_id']+'"><i class="fas fa-pen"></i></button>'+
           
                          	'</li>'+
                          	'<li>'+
                          		'<button class="btn btn-primary" value="'+val['tbl_service_id']+'" id="file"><i class="fas fa-file-upload"></i></button>'+
           
                          	'</li>'+
                          '</ul>'+
                         '</td>'+
					'</tr>');
					}
					else if (val['inspection'] == "On Process") {
						$('#table_data').append('<tr>'+
						'<td>'+val['queue']+'</td>'+
						'<td>'+val['service_type']+'</td>'+
						'<td>'+val['business_name']+'</td>'+
						'<td class="text-info">'+val['inspection']+'</td>'+
						'<td class="text-center">'+
                          '<button class="btn btn-success" id="form" value="'+val['tbl_service_id']+'"><i class="fas fa-pen"></i></button>'+
                           '<button class="btn btn-primary" value="'+val['tbl_service_id']+'" id="file"><i class="fas fa-file-upload"></i></button>'+
                         '</td>'+
					'</tr>');
					}

				});
			}
		}
	});	
}
