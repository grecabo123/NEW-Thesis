$(document).ready(function() {
	$('#form').click(function(event) {
		$('#caret').toggleClass('rotate');
		$('.dropdown').toggleClass('view');
	});


	$(document).on('click', '#forward', function(event) {
		event.preventDefault();
		var num = $(this).attr('value');

		$.ajax({
			type: "POST",
			url: "forward",
			data: {
				"update" : true,
				num:num,
			},
			success:function(response){
				$('.center_sp').addClass('bg-spin');
				if (response == 1) {
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						alertify.success("Forwarded To Personnel");
					},2000);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						alertify.error("Something Went Wrong");
					},2000);
				}
			}
		});

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
					if (val['inspection'] == "On Process" || val['inspection'] == "pending" || val['inspection'] == "Comply" || val['inspection'] == "Correction") {
						
					}
					else{
						$('#table_paid').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light">'+val['business_name']+'</td>'+
                                '<td class="text-light"><button id="forward" class="btn-sm btn-primary" value="'+val['tbl_service_id']+'">Forward</button></td>'+
                            '</tr>'
						);
					}
				});
			}
		}
	});
}
Paid();
setInterval(function(){
	Paid();
},3000);
