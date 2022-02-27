$(document).ready(function(){

	load_data();



function Next(){
	$.ajax({
		url: "next",
		type: "POST",
		dataType: "json",
		success:function(response){
			$('#num').html(response.notification_pop);

		}
	});
}
	Next();
	setInterval(function(){
		Next();
	},3000);

	setInterval(function(){
		load_data();
	},2000);



});

function Search(){
	var num = $('#data_number').val();
	$('.normal').css('display', 'none');
	$('.error_hide').text("");
	$('.loading_hide').css('display', 'block');


	$.ajax({
		url: "search",
		type: "POST",
		data:{
			"search" : true,
			num:num,
		},
		success:function(response){
			console.log(response);
			if (response == 1) {
				setTimeout(function(){
					$('.normal').css('display', 'block');
					$('.loading_hide').css('display', 'none');
					$('.data').css('display', 'none');
					var msg = "Ticket number does not exist"+' '+num;
					$('.error_hide').text(msg);
					$('#data_number').val("");
				},2000)
			}
			else{
				setTimeout(function(){
					$('#data_number').val("");
					$('.error_hide').text("");
					$('.normal').css('display', 'block');
					$('.loading_hide').css('display', 'none');
					window.location ="invoice";
				},2000);
			}
		}
	});

}


function load_data(){
		// console.log("12");
		$.ajax({
			type: "POST",
			url: "data",
			success:function(response){
				// console.log(response)
				$('td').remove();
				if (response == 2) {
					
				}
				else{

					$.each(response, function(index, val) {
						$('#table_data').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                    '<td class="text-light">'+val['service_type']+'</td>'+
                                    '<td class="text-light">'+val['business_name']+'</td>'+
                                '</tr>'
						);
					});
				}		
			}
		});
	}
