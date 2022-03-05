$(document).ready(function(){

	// FSIC
	$('#file_name, #file_build, #file_bfp').change(function(event) {

		var t = $('#file_name').val().split('.').pop().toLowerCase();
		var t_f = $('#file_build').val().split('.').pop().toLowerCase();
		var t_p = $('#file_bfp').val().split('.').pop().toLowerCase();
		if($('#file_name')[0].files.length === 1 && $('#file_build')[0].files.length === 1 && $('#file_bfp')[0].files.length === 1 && $.inArray(t,['png','jpeg','jpg','pdf']) == 0 && $.inArray(t_f,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0 && $.inArray(t_p,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('#submit').attr('disabled', false);
		}
		else{
			$('#submit').attr('disabled', true);
		}
	});

	// fsic
	$('#file_name').change(function(event) {
		var assessment = $('#file_name')[0].files[0];
		var size = assessment.size;
		var type = $('#file_name').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error').html("");
			$('.bor').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf']) == 0) {
				$('.error').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error').html(msg);
				$('#submit').attr('disabled', true);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error').html(msg);
			$('.bor').addClass('red');
			$('#submit').attr('disabled', true);
		}
	});



	$('#file_build').change(function(event) {
		var assessment = $('#file_build')[0].files[0];
		
		var size = assessment.size;
		var type = $('#file_build').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_i').html("");
			$('.bor_i').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf']) == 0) {
				$('.error_i').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_i').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_i').html(msg);
			$('.bor_i').addClass('red');
			$('#submit').attr('disabled', true);

		}
	});
	$('#file_bfp').change(function(event) {
		var assessment = $('#file_bfp')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#file_bfp').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_o').html("");
			$('.bor_o').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf']) == 0) {
				$('.error_o').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_o').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_o').html(msg);
			$('.bor_o').addClass('red');
			$('#submit').attr('disabled', true);

		}
	});



	// FSEC
	$('#building_speficification, #file_building, #file_bfp_or, #voltage').change(function(event) {

		var building = $('#building_speficification').val().split('.').pop().toLowerCase();
		var file_building = $('#file_building').val().split('.').pop().toLowerCase();
		var file_bfp_or = $('#file_bfp_or').val().split('.').pop().toLowerCase();
		var voltage = $('#voltage').val().split('.').pop().toLowerCase();
		if($('#building_speficification')[0].files.length === 1 && $('#file_building')[0].files.length === 1 && $('#file_bfp_or')[0].files.length === 1 && $('#voltage')[0].files.length === 1 && $.inArray(building,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0 && $.inArray(file_building,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0 && $.inArray(file_bfp_or,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0 && $.inArray(voltage,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('#submit').attr('disabled', false);
		}
		else{
			$('#submit').attr('disabled', true);
		}
	});

	$('#building_speficification').change(function(event) {
		var assessment = $('#building_speficification')[0].files[0];
		var size = assessment.size;
		var type = $('#building_speficification').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error').html("");
			$('.bor').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error').html(msg);
				$('#submit').attr('disabled', true);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error').html(msg);
			$('.bor').addClass('red');
			$('#submit').attr('disabled', true);
		}
	});
	$('#file_building').change(function(event) {
		var assessment = $('#file_building')[0].files[0];
		
		var size = assessment.size;
		var type = $('#file_building').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_i').html("");
			$('.bor_i').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_i').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_i').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_i').html(msg);
			$('.bor_i').addClass('red');
			$('#submit').attr('disabled', true);

		}
	});
	$('#file_bfp_or').change(function(event) {
		var assessment = $('#file_bfp_or')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#file_bfp_or').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_o').html("");
			$('.bor_o').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_o').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_o').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_o').html(msg);
			$('.bor_o').addClass('red');
			$('#submit').attr('disabled', true);

		}
	});

	$('#voltage').change(function(event) {
		var assessment = $('#voltage')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#voltage').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_v').html("");
			$('.bor_o').removeClass('red');
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_v').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_v').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_v').html(msg);
			$('.bor_o').addClass('red');
			$('#submit').attr('disabled', true);

		}
	});

	// occupanccy permit
	$('#endorse,#building_certificate,#electrical,#bfp_or,#fsec_clearance').change(function(event) {
		var endorse = $('#endorse').val().split('.').pop().toLowerCase();
		var building_certificate = $('#building_certificate').val().split('.').pop().toLowerCase();
		var electrical = $('#electrical').val().split('.').pop().toLowerCase();
		var bfp_or = $('#bfp_or').val().split('.').pop().toLowerCase();
		var fsec_clearance = $('#fsec_clearance').val().split('.').pop().toLowerCase();

		if ($('#endorse')[0].files.length === 1 && $('#building_certificate')[0].files.length === 1 && $('#fsec_clearance')[0].files.length === 1 && $('#electrical')[0].files.length === 1 && $('#bfp_or')[0].files.length === 1 && $.inArray(endorse,['png','jpeg','jpg','pdf','docs','xls','xlsx','doc','docx','bmp']) == 0 && $.inArray(building_certificate,['png','jpeg','jpg','pdf','docs','xls','xlsx','doc','docx','bmp']) == 0 && $.inArray(electrical,['png','jpeg','jpg','pdf','docs','xls','xlsx','doc','docx','bmp']) == 0 && $.inArray(bfp_or,['png','jpeg','jpg','pdf','docs','xls','xlsx','doc','docx','bmp']) == 0 && $.inArray(fsec_clearance,['png','jpeg','jpg','pdf','docs','xls','xlsx','doc','docx','bmp']) == 0) {
			$('#occupancy').attr('disabled', false);
		
		}
		else{
			$('#occupancy').attr('disabled', true);
			
		}
	});


	$('#endorse').change(function(event) {
		var assessment = $('#endorse')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#endorse').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.endorse_error').html("");
			
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.endorse_error').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.endorse_error').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.endorse_error').html(msg);
			
			$('#occupancy').attr('disabled', true);

		}
	});

	$('#building_certificate').change(function(event) {
		var assessment = $('#building_certificate')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#building_certificate').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_building').html("");
			
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_building').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_building').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_building').html(msg);
			
			$('#occupancy').attr('disabled', true);

		}
	});
	$('#electrical').change(function(event) {
		var assessment = $('#electrical')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#electrical').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_electrical').html("");
			
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_electrical').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_electrical').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_electrical').html(msg);
			
			$('#occupancy').attr('disabled', true);

		}
	});
	$('#bfp_or').change(function(event) {
		var assessment = $('#bfp_or')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#bfp_or').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_occu').html("");
			
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_occu').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_occu').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_occu').html(msg);
			
			$('#occupancy').attr('disabled', true);

		}
	});
	$('#fsec_clearance').change(function(event) {
		var assessment = $('#fsec_clearance')[0].files[0];
		
		

		var size = assessment.size;
		var type = $('#fsec_clearance').val().split('.').pop().toLowerCase();

		if (size > 23000 && $.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
			$('.error_clearance').html("");
			
			if ($.inArray(type,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0) {
				$('.error_clearance').html("");
				
			}
			else{
				var msg = "This file is not valid";
				$('.error_clearance').html(msg);
			}
		}
		else{
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_clearance').html(msg);
			
			$('#occupancy').attr('disabled', true);

		}
	});



	// resubmit for patyment
	$('#upload_file').change(function(event) {

		var occu_pay = $('#upload_file').val().split('.').pop().toLowerCase();
		console.log(occu_pay);
		if($('#upload_file')[0].files.length === 1 && $.inArray(occu_pay,['png','jpeg','jpg','pdf','xlsx','doc','docx','bmp']) == 0 ) {
			$('#submit').attr('disabled', false);
		}
		else{
			$('#submit').attr('disabled', true);
		}
	});



	
});



// fsic
function upload_file(){

	var assessment = $('#file_name')[0].files[0];
	var insurance = $('#file_build')[0].files[0];
	var OR = $('#file_bfp')[0].files[0];
	var permit = $('#permit_type').val();
	var email = $('#email').val();
	var owner = $('#owner-fsic').val();
	var bus_name = $('#business_name').val();
	var contact_num = $('#contact_num').val();

	var form_data = new FormData();

	$('#submit').addClass('none');
	$('.hide').css('display', 'block');

	if ($('#file_name')[0].files.length === 1 && $('#file_build')[0].files.length === 1 && $('#file_bfp')[0].files.length === 1 ) {
		form_data.append('file',assessment);
		form_data.append('insurance',insurance);
		form_data.append('OR',OR);
		form_data.append('permit',permit);
		form_data.append('email',email);
		form_data.append('owner_fsic',owner);
		form_data.append('business_name',bus_name);
		form_data.append('contact_num',contact_num);
		
		
		$.ajax({
			url: "send",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,


			success:function(response){
				if (response == "Yes") {
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#file_name').val('');
						$('#file_build').val('');
						$('#file_bfp').val('');
						alertify.success('You Request has been sent');
			        },5000);

				}
				else{
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#file_name').val('');
						$('#file_build').val('');
						$('#file_bfp').val('');
						alertify.error('Failed To Sent');
			        },5000);
				}
			}
		});
	}
	else{
		console.log("awd");
	}
}



// fsec permit
function upload(){

	var permit = $('#owner_fsec').val();
	var establisment = $('#establisment').val();
	var email = $('#email').val();
	var purpose_fsec = $('#purpose-fsec').val();
	var name_person = $('#owner-fsec').val();
	var contact = $('#contact-fsec').val();


	var building_speficification = $('#building_speficification')[0].files[0];
	var file_building = $('#file_building')[0].files[0];
	var OR = $('#file_bfp_or')[0].files[0];
	var voltage = $('#voltage')[0].files[0];
	

	var form_data = new FormData();

	$('#submit').addClass('none');
	$('.hide').css('display', 'block');

	if ($('#building_speficification')[0].files.length === 1 && $('#file_building')[0].files.length === 1 && $('#file_bfp_or')[0].files.length === 1 && $('#voltage')[0].files.length === 1 ) {
		
		//file	
		form_data.append('building',building_speficification);
		form_data.append('file_building',file_building);
		form_data.append('OR',OR);
		form_data.append('voltage',voltage);
		
		//text data
		form_data.append('permit',permit);
		form_data.append('establisment',establisment);
		form_data.append('email',email);
		form_data.append('purpose_fsec',purpose_fsec);
		form_data.append('name_person',name_person);
		form_data.append('contact',contact);
		
		
		$.ajax({
			url: "fsec",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,


			success:function(response){
				if (response == "Yes") {
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#building_speficification').val('');
						$('#file_building').val('');
						$('#file_bfp_or').val('');
						$('#voltage').val('');
						alertify.success('You Request has been sent');
			        },5000);

				}
				else{
					alert("failed");
				}
			}
		});
	}
	else{
		console.log("awd");
	}
}


// occupancy permit

function occupancy(){

	// data fields
	var type = $('#permit_type').val();
	var email = $('#user_email').val();
	var name_person = $('#name_p').val();
	var contact = $('#contact_occupancy').val();
	var business = $('#name_business').val();

	// data file
	var endorse = $('#endorse')[0].files[0];
	var building_certificate = $('#building_certificate')[0].files[0];
	var electrical = $('#electrical')[0].files[0];
	var bfp_or = $('#bfp_or')[0].files[0];
	var fsec_clearance = $('#fsec_clearance')[0].files[0];

	var form_data = new FormData();
	$('#occupancy').addClass('none');
	$('.hide').css('display', 'block');


	if ($('#endorse')[0].files.length === 1 && $('#building_certificate')[0].files.length === 1 && $('#fsec_clearance')[0].files.length === 1 && $('#electrical')[0].files.length === 1 && $('#bfp_or')[0].files.length === 1){


		// data fields
		form_data.append('type_of_permit',type);
		form_data.append('email',email);
		form_data.append('name_person',name_person);
		form_data.append('contact',contact);
		form_data.append('business',business);

		// file 
		form_data.append('endorse_file',endorse);
		form_data.append('building_certificate_file',building_certificate);
		form_data.append('electrical_file',electrical);
		form_data.append('bfp_or_file',bfp_or);
		form_data.append('fsec_clearance_file',fsec_clearance);

		$.ajax({
			url: "occupancy",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,


			success:function(response){
				if (response == "Yes") {
					setTimeout(function(){
						$('#occupancy').removeClass('none');
						$('#occupancy').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#endorse').val('');
						$('#building_certificate').val('');
						$('#electrical').val('');
						$('#bfp_or').val('');
						$('#fsec_clearance').val('');
						alertify.success('You Request has been sent');
			        },5000);
				}
				else{
					setTimeout(function(){
						$('#occupancy').removeClass('none');
						$('#occupancy').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#endorse').val('');
						$('#building_certificate').val('');
						$('#electrical').val('');
						$('#bfp_or').val('');
						$('#fsec_clearance').val('');
						alertify.error('Failed To Sent');
			        },5000);
				}
			}

		});
	}

}


// Re submit


function Update_fsic(){
	var num = $("#submit").attr('value');
	var assessment = $('#file_name')[0].files[0];
	var insurance = $('#file_build')[0].files[0];
	var OR = $('#file_bfp')[0].files[0];
	var permit = $('#permit_type').val();
	var email = $('#email').val();
	var owner = $('#owner-fsic').val();
	var bus_name = $('#business_name').val();
	var contact_num = $('#contact_num').val();

	var form_data = new FormData();

	$('#submit').addClass('none');
	$('.hide').css('display', 'block');

	if ($('#file_name')[0].files.length === 1 && $('#file_build')[0].files.length === 1 && $('#file_bfp')[0].files.length === 1 ) {
		form_data.append('file',assessment);
		form_data.append('insurance',insurance);
		form_data.append('OR',OR);
		form_data.append('permit',permit);
		form_data.append('email',email);
		form_data.append('owner_fsic',owner);
		form_data.append('business_name',bus_name);
		form_data.append('contact_num',contact_num);
		form_data.append('num',num);
		
		
		$.ajax({
			url: "Compilation/comply_fsic",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,

			success:function(response){
				if (response == "Yes") {
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#file_name').val('');
						$('#file_build').val('');
						$('#file_bfp').val('');
						alertify.success('Compilation Sent');
			        },3000);
			        setTimeout(function(){
			        	window.location ="status";
			        },5000);

				}
				else{
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#file_name').val('');
						$('#file_build').val('');
						$('#file_bfp').val('');
						alertify.error('Something went wrong');
			        },5000);
				}
			}
		});
	}
}


function update_fsec(){
	var num_fsec = $("#submit").attr('value');
	var permit = $('#owner_fsec').val();
	var establisment = $('#establisment').val();
	var email = $('#email').val();
	var purpose_fsec = $('#purpose-fsec').val();
	var name_person = $('#owner-fsec').val();
	var contact = $('#contact-fsec').val();


	var building_speficification = $('#building_speficification')[0].files[0];
	var file_building = $('#file_building')[0].files[0];
	var OR = $('#file_bfp_or')[0].files[0];
	var voltage = $('#voltage')[0].files[0];
	

	var form_data = new FormData();

	$('#submit').addClass('none');
	$('.hide').css('display', 'block');

	if ($('#building_speficification')[0].files.length === 1 && $('#file_building')[0].files.length === 1 && $('#file_bfp_or')[0].files.length === 1 && $('#voltage')[0].files.length === 1 ) {
		
		//file	
		form_data.append('building',building_speficification);
		form_data.append('file_building',file_building);
		form_data.append('OR',OR);
		form_data.append('voltage',voltage);
		
		//text data
		form_data.append('permit',permit);
		form_data.append('establisment',establisment);
		form_data.append('email',email);
		form_data.append('purpose_fsec',purpose_fsec);
		form_data.append('name_person',name_person);
		form_data.append('contact',contact);
		form_data.append('num_fsec',num_fsec);
		
		
		$.ajax({
			url: "Compilation/comply_fsec",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,


			success:function(response){
				console.log(response);
				if (response == "Yes") {
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#building_speficification').val('');
						$('#file_building').val('');
						$('#file_bfp_or').val('');
						$('#voltage').val('');
						alertify.success('Compilation Sent');
			        },3000);
					setTimeout(function(){
			        	window.location ="status";
			        },5000);
				}
				else{
					setTimeout(function(){
						$('#submit').removeClass('none');
						$('#submit').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#building_speficification').val('');
						$('#file_building').val('');
						$('#file_bfp_or').val('');
						$('#voltage').val('');
						alertify.error('Compilation Sent');
			        },3000);
				}
			}
		});
	}
}

// occupancy re submit

function update_occu(){

	// data fields
	var num = $('#occupancy').attr('value');
	var type = $('#permit_type').val();
	var email = $('#user_email').val();
	var name_person = $('#name_p').val();
	var contact = $('#contact_occupancy').val();
	var business = $('#name_business').val();

	// data file
	var endorse = $('#endorse')[0].files[0];
	var building_certificate = $('#building_certificate')[0].files[0];
	var electrical = $('#electrical')[0].files[0];
	var bfp_or = $('#bfp_or')[0].files[0];
	var fsec_clearance = $('#fsec_clearance')[0].files[0];

	var form_data = new FormData();
	$('#occupancy').addClass('none');
	$('.hide').css('display', 'block');


	if ($('#endorse')[0].files.length === 1 && $('#building_certificate')[0].files.length === 1 && $('#fsec_clearance')[0].files.length === 1 && $('#electrical')[0].files.length === 1 && $('#bfp_or')[0].files.length === 1){


		// data fields
		form_data.append('type_of_permit',type);
		form_data.append('email',email);
		form_data.append('name_person',name_person);
		form_data.append('contact',contact);
		form_data.append('business',business);
		form_data.append('num',num);


		// file 
		form_data.append('endorse_file',endorse);
		form_data.append('building_certificate_file',building_certificate);
		form_data.append('electrical_file',electrical);
		form_data.append('bfp_or_file',bfp_or);
		form_data.append('fsec_clearance_file',fsec_clearance);

		$.ajax({
			url: "Compilation/comply_occu",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,


			success:function(response){
				
				if (response == "Yes") {
					setTimeout(function(){
						$('#occupancy').removeClass('none');
						$('#occupancy').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#endorse').val('');
						$('#building_certificate').val('');
						$('#electrical').val('');
						$('#bfp_or').val('');
						$('#fsec_clearance').val('');
						alertify.success('Compilation Sent');
			        },3000);
			        setTimeout(function(){
			        	window.location ="status";
			        },5000);
				}
				else{
					setTimeout(function(){
						$('#occupancy').removeClass('none');
						$('#occupancy').attr('disabled', true);
						$('.hide').css('display', 'none');
			        	$('#endorse').val('');
						$('#building_certificate').val('');
						$('#electrical').val('');
						$('#bfp_or').val('');
						$('#fsec_clearance').val('');
						alertify.error('Failed To Sent');
			        },3000);
			         setTimeout(function(){
			        	window.location ="status";
			        },5000);
				}
			}

		});
	}
}

function occupancy_payment(){
	var num = $('#submit').attr('value');

	var payment_file = $('#upload_file')[0].files[0];
		var transaction_code = $('#tranaction_code').val();
		var name = $('#full_name').val();
		var amt = $('#amount').val();
		var id_fk = $('#pk_id').val();
		var proxy = $('#proxy').val();



		var form_data = new FormData();

		if ($('#upload_file')[0].files.length === 1) {

			// file for payment
			form_data.append('payment',payment_file);

			// data for fields
			form_data.append('transaction_code',transaction_code);
			form_data.append('amt',amt);
			form_data.append('name',name);
			form_data.append('num',num);
			form_data.append('proxy',proxy);

			$.ajax({
				url: "update_lack",
				type: "POST",
				datatype: "script",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,


				success:function(response){
					console.log(response);
					if (response == 2) {
						
						$('#tranaction_code').val('');
						$('#full_name').val('');
						$('#amount').val('');
						$('#pk_id').val('');
						$('.payment').removeClass('bg-active')
						$('.center_sp').addClass('bg-spin');
						setTimeout(function(){
							$('.center_sp').removeClass('bg-spin');
							alertify.success('Your payment has been sent');
						},1500);
						setTimeout(function(){
							window.location="../status";
						},2500);

					}
					else if (response == 1) {
						console.log("1");
					}
					else if (response == 0) {
						console.log("0");
					}
				}

			});
		}
		else{
			console.log("awd");
		}
}


function fsec_payment(){
	var num = $('#submit').attr('value');
		var payment_file = $('#upload_file')[0].files[0];
		var transaction_code = $('#tranaction_code_fsec').val();
		var name = $('#full_name_fsec').val();
		var amt = $('#amount_fsec').val();
		var id_fk = $('#pk_id').val();
		var proxy = $('#proxy_fsec').val();

		console.log(num);



		var form_data = new FormData();

		if ($('#upload_file')[0].files.length === 1) {

			// file for payment
			form_data.append('payment',payment_file);

			// data for fields
			form_data.append('transaction_code',transaction_code);
			form_data.append('amt',amt);
			form_data.append('name',name);
			form_data.append('num',num);
			form_data.append('proxy',proxy);

			$.ajax({
				url: "update_fsec",
				type: "POST",
				datatype: "script",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,


				success:function(response){
					
					if (response == 2) {
						
						$('#tranaction_code_fsec').val('');
						$('#full_name_fsec').val('');
						$('#amount_fsec').val('');
						$('#proxy_fsec').val('');
						
						setTimeout(function(){
							$('.center_sp').removeClass('bg-spin');
							alertify.success('Your payment has been sent');
						},1500);
						setTimeout(function(){
							window.location="../status";
						},2500);

					}
					else if (response == 1) {
						window.location="fsec";
					}
					else if (response == 0) {
						window.location="fsec";
					}
				}

			});
		}
		else{
			console.log("awd");
		}
}

function business_payment(){
	var num = $('#submit').attr('value');
		var payment_file = $('#upload_file')[0].files[0];
		var transaction_code = $('#tranaction_code_fsec').val();
		var name = $('#full_name_fsec').val();
		var amt = $('#amount_fsec').val();
		var id_fk = $('#pk_id').val();
		var proxy = $('#proxy_fsec').val();

		



		var form_data = new FormData();

		if ($('#upload_file')[0].files.length === 1) {

			// file for payment
			form_data.append('payment',payment_file);

			// data for fields
			form_data.append('transaction_code',transaction_code);
			form_data.append('amt',amt);
			form_data.append('name',name);
			form_data.append('num',num);
			form_data.append('proxy',proxy);

			$.ajax({
				url: "update_business",
				type: "POST",
				datatype: "script",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,


				success:function(response){
					console.log(response);
					if (response == 2) {
						
						$('#tranaction_code_fsec').val('');
						$('#full_name_fsec').val('');
						$('#amount_fsec').val('');
						$('#proxy_fsec').val('');
						
						setTimeout(function(){
							$('.center_sp').removeClass('bg-spin');
							alertify.success('Your payment has been sent');
						},1500);
						setTimeout(function(){
							window.location="../status";
						},2500);

					}
					else if (response == 1) {
						window.location="fsec";
					}
					else if (response == 0) {
						window.location="fsec";
					}
				}

			});
		}
		else{
			console.log("awd");
		}
}