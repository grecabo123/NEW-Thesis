$(document).ready(function(){
	load_data();


	$(document).on('click', '.view_data', function(event) {
		event.preventDefault();
		var report_id = $(this).attr('value');
		var user_id = $(this).closest('td').find('.report_id').text();

		console.log(report_id);
		console.log(user_id);

		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"hazard_user" : true,
				report_id:report_id,
				user_id:user_id,
			},
			success:function(response){
				
				if (response == 1) {

				}
				else{
					$('.incident_modal').addClass('bg-active');
					$.each(response, function(index, val) {
						var full = val['fname']+' '+val['lname'];
						$('#from').prop('value',full);
					 	$('#landmark').prop('value',val['landmark']);
					 	$('#brgy').prop('value',val['brgy']);
					 	
					 	$('#feedback').attr('value',val['tbl_report_id']);
					});
				}
			}
		});
	});


	$('#feedback').click(function(event) {
		var id = $(this).attr('value');
		console.log(id);
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"user_hazard" : true,
				id:id,
			},
			success:function(response){
				$('#feedback').css('display', 'none');
				$('.hide').css('display', 'block');
				if (response == 1) {
					setTimeout(function(){
						$('#feedback').css('display', 'block');
						$('.hide').css('display', 'none');
						alertify.success("FeedBack Report Done!");
						$('.incident_modal').removeClass('bg-active');
					},2800);
				}
				else{
					setTimeout(function(){
						$('#feedback').css('display', 'block');
						$('.hide').css('display', 'none');
						alertify.error("Failed");
					},2800);
				}
			}
		});
	});

});

function Close_modal(){
	$('.incident_modal').removeClass('bg-active');
}

function load_data(){
	// console.log("12");
	$.ajax({
		type: "POST",
		url: "data_hazard",
		success:function(response){
			// console.log(response)
			$('td').remove();
			if (response == 2) {
				
			}
			else{
				$.each(response, function(index, val) {
					var date = new Date(val['date_report']);
					var new_date = new Date(date).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
				  	var word_day = date.getDate()+' '+date.getFullYear();
				  	var month = date.getMonth() + 1;
				  	var name =["January", "February", "March","April","May","June","July","August","September","October","November","December"];
					var mntname = "";
					if(month == 1){
						mntname = "Jan";
					}
					else if(month == 2){
						mntname = "Feb";
					}
					else if(month == 3){
						mntname = "Mar";
					}
					else if(month == 4){
						mntname = "April";
					}
					else if(month == 5){
						mntname = "May";
					}
					else if(month == 6){
						mntname = "Jun";
					}
					else if(month == 7){
						mntname = "Jul";
					}
					else if(month == 8){
						mntname = "Aug";
					}
					else if(month == 9){
						mntname = "Sep";
					}
					else if(month == 10){
						mntname = "Oct";
					}
					else if(month == 11){
						mntname = "Nov";
					}
					else if(month == 12){
						mntname = "Dec";
					}
				  	var conta = mntname+' '+word_day;
					if (val['type_of_report'] == "Hazard") {
						$('#table_data').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+conta+' '+new_date+'</span></td>'+
                                '<td class="text-light">'+val['type_of_report']+'</td>'+
                                 '<td class="text-light"><a class="view_data fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_report_id']+'" >'+val['status']+'<span class="d-none report_id">'+val['account_fk']+'</span></td>'+
                            '</tr>'
						);
					}
				});
			}		
		}
	});
}


setInterval(function(){
	load_data();
},2700);

