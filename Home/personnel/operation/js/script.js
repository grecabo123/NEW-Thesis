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

	$('.more').click(function(event) {
		/* Act on the event */
		$('.more_modal').addClass('bg-active');
	});

	$('.close_more').click(function(event) {
		/* Act on the event */
		// console.log('dwa');
		$('.more_modal').removeClass('bg-active');
		$('.field_date_report').removeClass('show')
		$('.count_text').removeClass('show');
	});
	$('.calculator').click(function(event) {
		/* Act on the event */
		$('.field_date_report').toggleClass('show');
	});

	$('#count').click(function(event) {
		/* Act on the event */
		var from = $('#from_date').val();
		var to = $('#to_date').val();

		// console.log(from);

		if (from != "" && to != "") {

			$.ajax({
				url: "get/count",
				type: "POST",
				dataType: "json",
				data: {
					"counting" : true,
					from:from,
					to:to,
				},
				
				success:function(data){
					$('.btn_count').css('display', 'block');
					$('#count').css('display', 'none');
					// console.log(data.notification);
					if (data.notification > 0) {
						setTimeout(function(){
							const from_d = new Date(from);
							const to_d = new Date(to);
							$('.count_text').addClass('show');
							$('#from').text(from_d);
							$('#to').text(to_d);
							$('#total_report').text(data.notification);
							$('.btn_count').css('display', 'none');
							$('#count').css('display', 'block');
						},2000)
					}
					else{
						console.log("wad");	
					}
				}
			});
		}
		else{
			alert("You Must Insert a Date");
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



