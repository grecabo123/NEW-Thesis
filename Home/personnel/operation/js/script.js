$(document).ready(function(){

	load_report_incident();
	load_report_hazard();

	$('#report').click(function(event) {
		$('.dropdown-report').toggleClass('show');
		$('#caret-report').toggleClass('rotate');
	});

	$('#select').on('change',function(){
		var data = $(this).val();
		if (data == "User") {
			user_hazard();
		}
		else if(data == "Business"){
			business_data();
		}
	});

});


function user_hazard(){
	window.location = "hazard";
}

function business_data(){
	window.location="hazard_business";
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