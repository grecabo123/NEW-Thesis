$(document).ready(function(){
	$('#form').click(function(event) {
		$('#form').toggleClass('rotate');
		$('.dropdown').toggleClass('view');

	});


	$(document).on('click', '#View', function(event) {
		event.preventDefault();

		var num = $(this).attr('value');

		$('#View').css('display', 'none');
		$('#loading').css('display', 'block');

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
						window.location = "fsic"
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


function Queue(){
	
	$.ajax({
		type: "POST",
		url: "fetch",
		success:function(response){
			$('td').remove();
			if (response == 2) {

			}
			else{
				$.each(response, function(index, val) {
					$('#table_paid').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light">'+val['business_name']+'</td>'+
                                '<td class="text-light"><button id="View" class="btn btn-sm btn-success" value="'+val['tbl_service_id']+'">View</button></td>'+
                                '<td class="text-light"><button id="loading" class="btn btn-sm btn-success" type="button" disabled>'+ 
                                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Fetching... '+
                                '</button></td>'+
                            '</tr>'
					);
				});
			}
		}
	});
}
Queue();
setInterval(function(){
	Queue();
},3000);