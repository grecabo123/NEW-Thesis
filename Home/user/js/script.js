$(document).ready(function(){
	$('#report').click(function(event) {
		$('.dropdown-report').toggleClass('show');
		$('#caret-report').toggleClass('rotate');
	});


	// account update
	$('#update').click(function(event) {
		var name = $('#username').val();
		var mname = $('#user_mname').val();
		var lname = $('#user_lname').val();
		var brgy = $('#brgy').val();
		var adr = $('#street').val();
		var contact = $('#contact_num').val();


		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"update" : true,
				name:name,
				brgy:brgy,
				adr:adr,
				contact:contact,
				mname:mname,
				lname:lname,
			},
			success:function(response){
				if (response == "Update") {
					$('.center_sp').addClass('bg-spin');
					$('.hide').css('display', 'block');
					$('#update').css('display', 'none');
					setTimeout(function(){
						// alertify.success("Report has been sent");
						window.location = "account";	
					},3000);
				}
				else{

				}
			}
		});
	});
	// end of account update


	// hazard report
	$('#hazard').click(function(event) {
		var str = $('#street').val();
		var brgy = $('#brgy').val();
		var landmark = $('#landmark').val();
		var des = $('#descrip').val();
		$.ajax({
			url: "report",
			type: "POST",
			data: {
				"hazard" : true,
				str:str,
				brgy:brgy,
				landmark:landmark,
				des:des,
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

				}
			}
		});
	});
	// end of hazard


	// incident report

	$('#incident').click(function(event) {
		var street = $("#street_inci").val();
		var brgy = $('#brgy_inci').val();
		var type = $('#incident_type').val();
		var land = $('#lanmark_incident').val();
		var des = $('#description_incident').val();

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