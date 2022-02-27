$(document).ready(function(){
	Paid();


	$(document).on('click', '#forward', function(event) {
		event.preventDefault();

		var num = $(this).attr('value');

		console.log(num);

		$.ajax({
			type: "POST",
			url: "search",
			data:{
				"find" : true,
				num:num,
			},
			success:function(response){
				
				if (response == 2) {
					setTimeout(function(){
						window.location = "info"
					},3000);
				}
				else{
					alert("Failed");
				}
			}
		});

		/* Act on the event */
	});

});


// load data for those paid client
function Paid(){
	
	$.ajax({
		type: "POST",
		url: "data",
		success:function(response){
			
			$('td').remove();
			if (response == 2) {

			}
			else{
				$.each(response, function(index, val) {
					$('#table_data').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light">'+val['business_name']+'</td>'+
                                '<td class="text-light"><a id="forward" class="text-success fw-bold" style="cursor: pointer;" value="'+val['tbl_service_id']+'">View</a></td>'+
                            '</tr>'
					);
				});
			}
		}
	});
}
setInterval(function(){
	Paid();
},3000);