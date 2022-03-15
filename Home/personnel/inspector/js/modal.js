$(document).ready(function(){
	
	$(document).on('click', '#form', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).prop('value');
		
		$('.inspection').addClass('bg-active');

		$.ajax({
			url: "search",
			type: "POST",
			data:{
				"find": true,
				id:id,
			},
			success:function(response){
				// console.log(response);
				if (response == 2) {
					
				}
				else{
					$.each(response, function(index, val) {
						 $('#ticket').prop('value',val['queue']);
						 $('#establishmest').prop('value',val['business_name']);
						 $('#send_save').prop('value',val['tbl_inspection_id']);
						 $('#inspection_no').prop('value',val['inspection_no']);
						 // console.log(val['nature_of_ion']);
						 $('input[name="ion"]').val(val['nature_of_ion']);
					});
				}
			}
		});

		/* Act on the event */
	});


	// upload files

	$(document).on('click', '#file', function(event) {
		event.preventDefault();

		var id = $(this).attr('value');
		
		/* Act on the event */


		$.ajax({
			url: "search",
			type: "POST",
			data:{
				"find_data": true,
				id:id,
			},
			success:function(response){
				$('.inspection_upload').addClass('bg-active');
				
				if (response == 2) {

				}
				else{
					$.each(response, function(index, val) {
						$('#file_upload').attr('value',val['tbl_service_id']);
					});
				}	
			}
		});

	});



	$('#send_save').click(function(event) {
		/* Act on the event */
		var data_id = $(this).attr('value');
		// $('input[name="ion"]').not(this).prop('checked', false);
		var ion = $('input[name="ion"]:checked').val();
		var type_building = $('#building').val();

		var date_issue = $('#date_issued').val();
		var date_inspection = $('#date_inspection').val();


		// console.log(date_issue);

		console.log(data_id);

		$.ajax({
			url: "search",
			type: "POST",
			data:{
				"send_business" : true,
				data_id:data_id,
				ion:ion,
				type_building:type_building,
				date_issue:date_issue,
				date_inspection:date_inspection,
			},
			success:function(response){
				// console.log(response);
				$('.center_sp').addClass('bg-spin');
				if (response == 1) {
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.inspection').removeClass('bg-active');
					},2000);
					setTimeout(function(){
						alertify.success('Save And Send');
					},2300);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.inspection').removeClass('bg-active');
					},2000);
					setTimeout(function(){
						alertify.error('Failed to Save And Send');
					},2300);
				}
			}
		});
	});


	// file upload

	$('#file_checklist,#inspection,#file_comply,#file_correction,#inspection_order').change(function(event) {
		var assessment = $('#file_checklist')[0].files[0];
		var size = assessment.size;
		var sta = $('#inspection').val();
		var type = $('#file_checklist').val().split('.').pop().toLowerCase();

		// inspection order
		var inspection_order_type = $('#inspection_order').val().split('.').pop().toLowerCase();

		// 2 other file
		
		var comply = $('#file_comply').val().split('.').pop().toLowerCase();
		var correction = $('#file_correction').val().split('.').pop().toLowerCase();
		


		if ($('#file_checklist')[0].files.length === 1 && $.inArray(type,['pdf']) == 0 && $('#inspection_order')[0].files.length === 1 && $.inArray(inspection_order_type,['pdf']) == 0) {
			// $('#file_upload').attr('disabled',false);
			if (sta != "") {
				if (sta == "Comply") {
					$('.correction').removeClass('show_time');
					$('.comply').addClass('show_time');
					$('#file_upload').attr('disabled',true);
					$('#file_correction').val('');
					if ($.inArray(comply,['pdf']) == 0) {
						$('#file_upload').attr('disabled',false);
					}
				}
				else if (sta == "Correction") {
					$('#file_comply').val('');
					$('.comply').removeClass('show_time');
					$('#file_upload').attr('disabled',true);
					$('.correction').addClass('show_time');
					if ($.inArray(correction,['pdf']) == 0) {
						$('#file_upload').attr('disabled',false);
					}
				}
				else if (sta == "" || sta =="Approved") {
					$('.comply').removeClass('show_time');
					$('.correction').removeClass('show_time');
					$('#file_upload').attr('disabled',false);
				}
				

			}
			else{
				$('#file_upload').attr('disabled',true);
			}

		}
		else{
			$('#file_upload').attr('disabled',true);
			
		}
	});

	// $('#inspection').change(function(event) {
		
	// 	var sta = $(this).val();

	// 	if (sta != "") {
	// 		if (sta == "Comply") {
	// 			$('.correction').removeClass('show_time');
	// 			$('.comply').addClass('show_time');
	// 			$('#file_upload').attr('disabled',true);
	// 		}
	// 		else if (sta == "Correction") {
	// 			$('.comply').removeClass('show_time');
	// 			$('#file_upload').attr('disabled',true);
	// 			$('.correction').addClass('show_time');
	// 		}
	// 		else if (sta == "" || sta =="Approved") {
	// 			$('.comply').removeClass('show_time');
	// 			$('.correction').removeClass('show_time');
	// 		}
	// 		$('#file_upload').attr('disabled',false);

	// 	}
	// 	else{
	// 		$('#file_upload').attr('disabled',true);
	// 	}
	// });

	$('#file_upload').click(function(event) {
		/* Act on the event */
		var id = $(this).attr('value');
		var status = $('#inspection').val();
		var file = $('#file_checklist')[0].files[0];
		var file_ins = $('#inspection_order')[0].files[0];

		var file_inspection = $('#inspection_order').val().split('.').pop().toLowerCase();

		var type = $('#file_checklist').val().split('.').pop().toLowerCase();
    	var form_data = new FormData();


		
		if ($('#file_checklist')[0].files.length === 1 && $.inArray(type,['pdf']) == 0 && $('#inspection_order')[0].files.length === 1 && $.inArray(file_inspection,['pdf']) == 0) {

			// data

			form_data.append('pdf_file',file);
			form_data.append('file_inspection',file_ins);
			form_data.append('id',id);
			form_data.append('status',status);

			$.ajax({
				url: "upload",
				type: "POST",
				datatype: "script",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,

				success:function(response){
					console.log(response);
					$('#file_upload').css('display', 'none');
					$('.dot-btn').addClass('show');
					if (response == 1) {
						setTimeout(function(){
							$('.dot-btn').removeClass('show');
							$('#file_upload').css('display', 'block');
							$('.inspection_upload').removeClass('bg-active');
							$('#inspection').val('');
							$('#file_checklist').val('');
							$('#inspection_order').val('');
						},2000);
						setTimeout(function(){
							alertify.success("Send And Update!");
						},3000);
					}
					else{
						setTimeout(function(){
							// $('.center_sp').removeClass('bg-spin');
							$('.dot-btn').removeClass('show');
							$('#file_upload').css('display', 'block');
							$('#inspection').val('');
							$('#file_checklist').val('');
							$('#inspection_order').val('');
						},2000);
						setTimeout(function(){
							alertify.error("Failed to Send And Update!");
						},3000);
					}
				}
			});
		}
		else{
			$('#file_upload').attr('disabled',true);
			
		}
		
	});


});

function modal_img_close(){
	$('.inspection').removeClass('bg-active');
}

function close_upload(){
	$('.inspection_upload').removeClass('bg-active');
	$('#file_checklist').val('');
	$('#inspection').val('');
	$('#file_comply').val('');
	$('#inspection_order').val('');
	$('#file_correction').val('');
	$('.comply').removeClass('show_time');
	$('.correction').removeClass('show_time');
}