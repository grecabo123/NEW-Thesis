$(document).ready(function() {
	$('#report').click(function(event) {
		$('.dropdown-report').toggleClass('show');
		$('#caret-report').toggleClass('rotate');
	});	



		// hazard report
	$('#hazard').click(function(event) {
		var str = $('#street').val();
		var brgy = $('#brgy').val();
		var landmark = $('#landmark').val();
		var des = $('#description_hazard').val();

		var type_hazard = $('#hazard_type').val();

		console.log(type_hazard);

		$.ajax({
			url: "report",
			type: "POST",
			data: {
				"hazard" : true,
				str:str,
				brgy:brgy,
				landmark:landmark,
				des:des,
				type_hazard:type_hazard,
			},
			success:function(response){
				console.log(response);
				if (response == "Done") {
					$('.center_sp').addClass('bg-spin');
					$('.hide').css('display', 'block');
					$('#hazard').css('display', 'none');
					setTimeout(function(){
						alertify.success("Report has been sent");
						window.location = "hazard";	
					},3000);
				}
				else{
					setTimeout(function(){
						alertify.error("Failed To Sent");
						window.location = "hazard";	
					},3000);
				}
			}
		});
	});
	// end of hazard


	$('#incident').click(function(event) {
		var street = $("#street_inci").val();
		var brgy = $('#brgy_inci').val();
		var type = $('#incident_type').val();
		var land = $('#lanmark_incident').val();
		var des = $('#description').val();


		$.ajax({
			url: "report",
			type: "POST",
			data:{
				"sending" : true,
				street:street,
				brgy:brgy,
				type:type,
				land:land,
				des:des,
			},
			success:function(response){
				if (response == 1) {
					$('.center_sp').addClass('bg-spin');
					$('.hide').css('display', 'block');
					$('#incident').css('display', 'none');
					setTimeout(function(){
						
						window.location = "incident";	
					},3000);
				}
				else{

				}
			}
		});
	});
});