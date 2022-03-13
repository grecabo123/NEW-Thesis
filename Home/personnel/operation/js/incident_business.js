$(document).ready(function(){

	incident_load_data();
	load_report_incident();
	load_report_hazard();

	$('#select_incident').on('change', function () {
		var data = $(this).val();
		if (data == "User") {
			user_incident();
		}
		else if(data == "Business"){
			business_incident();
		}
	});


	$(document).on('click', '.view_data', function(event) {
		event.preventDefault();
		var report_id = $(this).attr('value');
		var business_id = $(this).closest('td').find('.report_id').text();


		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"report_business" : true,
				report_id:report_id,
				business_id:business_id,
			},
			success:function(response){
				
				if (response == 1) {

				}
				else{
					$('.incident_modal').addClass('bg-active');
					$.each(response, function(index, val) {
						$('#from').prop('value',val['name_of_person']);
					 	$('#landmark').prop('value',val['landmark']);
					 	$('#brgy').prop('value',val['brgy']);
					 	$('#incident').prop('value',val['Incident_type']);
					 	$('#feedback').attr('value',val['tbl_report_id']);
					 	$('#description_incident').prop('value',val['description']);
					});
				}
			}
		});
	});

	$('#feedback').click(function(event) {
		var business = $(this).attr('value');
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"feedback_business" : true,
				business:business,
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


function user_incident(){
	window.location ="incident";
}

function business_incident(){
	window.location ="incident_business";
}



function incident_load_data(){
	
	$.ajax({
		type: "POST",
		url: "data_incident_business",
		cache: false,
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
					if (val['type_of_report'] == "Incident") {
						$('#incident_data').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+conta+' '+new_date+'</span></td>'+
                                '<td class="text-light">'+val['Incident_type']+'</td>'+
                                '<td class="text-light"><a class="view_data fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_report_id']+'" >'+val['status']+'<span class="d-none report_id">'+val['account_fk']+'</span></td>'+
                            '</tr>'
						);

					}

				});
			}		
		}
	});
}


function load_report_incident(){

	$.ajax({
		url: "report",
		method: "GET",
		dataType: "json",
		success:function(data){
			if (data.unseen_notification > 0) {
				$('.incident_count').html(data.unseen_notification);
			}
			else{
				$('.incident_count').html("");
			}
		}
	});
}

function Close_modal(){
	$('.incident_modal').removeClass('bg-active');
}


function load_report_hazard(){
	$.ajax({
		url: "report_hazard",
		method: "GET",
		dataType: "json",
		success:function(data){
			if (data.hazard_total) {
				$('.hazard_count').html(data.hazard_total);
			}
			else{
				$('.hazard_count').html("");
			}
			
		}
	});
}


setInterval(function(){
	load_report_incident();
},2700);

setInterval(function(){
	load_report_hazard();
},2700);

setInterval(function(){
	incident_load_data();
},2700);