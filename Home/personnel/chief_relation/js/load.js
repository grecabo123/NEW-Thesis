$(document).ready(function(){


	// approve

	// fsic business
	$('#approve').click(function(event) {
		var num = $(this).attr('value');
		var queue = $('#number_q').text();
		
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"send" : true,
				num:num,
			},
			success:function(data){
				if (data == 1) {
					$('.center_sp').addClass('bg-spin');
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.success(queue+' '+'has been approved');
					},2800);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.error("Something went wrong");
					},2800);
				}
			}
		});
	});

	// fsec
	$('#fsec_approve').click(function(event) {
		var num = $(this).attr('value');
		var queue = $('#fsec_num').text();
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"send" : true,
				num:num,
			},
			success:function(data){
				if (data == 1) {
					$('.center_sp').addClass('bg-spin');
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.success(queue+' '+'has been approved');
					},2800);
					// alert("ok");
				}
				else{
					$('.center_sp').addClass('bg-spin');
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.error("Something went wrong");
					},2800);
				}
			}
		});
	});

	// occupancy
	$('#occupancy_btn').click(function(event) {
		var num = $(this).attr('value');
		var queue = $('#occupancy_ticket').text();
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"send" : true,
				num:num,
			},
			success:function(data){
				if (data == 1) {
					$('.center_sp').addClass('bg-spin');
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.success(queue+' '+'has been approved');
					},2800);
					
				}
				else{
					$('.center_sp').addClass('bg-spin');
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.error("Something went wrong");
					},2800);
				}
			}
		});
	});


	$('#form').click(function(event) {
		$('#caret').toggleClass('rotate');
		$('.dropdown').toggleClass('view');
	});



	// Return

	// fsic
	$('#lack').click(function(event) {
		var num = $(this).attr('value');
		
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"fsic_lack" : true,
				num:num,
			},
			success:function(response){
				$('.center_sp').addClass('bg-spin');
				if (response == 1) {
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.success("Forwarded Message");
					},2800);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.error("Something went wrong");
					},2800);
				}
			}
		});

	});


	// fsec

	$('#fsec_lack').click(function(event) {
		var num = $(this).attr('value');
		
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"fsec_lack" : true,
				num:num,
			},
			success:function(response){
				$('.center_sp').addClass('bg-spin');
				if (response == 1) {
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.success("Forwarded Message");
					},2800);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.error("Something went wrong");
					},2800);
				}
			}
		});

	});

	// occupancy
	$('#occupancy_lack').click(function(event) {
		var num = $(this).attr('value');
		
		$.ajax({
			url: "update",
			type: "POST",
			data: {
				"occu_lack" : true,
				num:num,
			},
			success:function(response){
				$('.center_sp').addClass('bg-spin');
				if (response == 1) {
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.success("Forwarded Message");
					},2800);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						$('.data').css('display', 'none');
						$('.search').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.occupancy').css('display', 'none');
						$('.fsec').css('display', 'none');
						alertify.error("Something went wrong");
					},2800);
				}
			}
		});

	});


});


function Queue(){
	
	$.ajax({
		type: "POST",
		url: "Queue",
		success:function(response){
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
Queue();
setInterval(function(){
	Queue();
},3000);



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
		success:function(data){
			if (data == 1) {
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
					$('.data-table').css('display', 'none');
					$('.data').css('display', 'block');
					$.each(data,function(key,val) {

						if (val['service_type'] == "FSEC-Permit") {
							
							$('.data').css('display', 'none');
							$('.data-table').css('display', 'none');
							$('.search').css('display', 'none');
							$('.fsec').css('display', 'block');
							$('.occupancy').css('display', 'none');
							var business_speci = "../../commerce/Files/"+''+val['building_specification'];
							var bill =  "../../commerce/Files/"+''+val['building_specification'];
							var bfp_or =  "../../commerce/Files/"+''+val['bfp_or'];
							var voltage =  "../../commerce/Files/"+''+val['voltage_circuit'];

							$('#fsec_num').text(val['queue']);
							$('#img4').attr('src',business_speci);
							$('#img5').attr('src',bill);
							$('#img6').attr('src', bfp_or);
							$('#img7').attr('src', voltage);
							$('#fs_type').text(val['service_type']);
							$('#fsec_approve').attr('value',val['tbl_service_id']);
							$('#fsec_lack').attr('value',val['tbl_service_id']);

							$('#fsec_business').text(val['business_name']);
							$('#fsec_owner').text(val['business_owner']);
							$('#fsec_email').text(val['email']);
							$('#fsec_contact').text(val['contact_number']);

						}
						else if (val['service_type'] == "FSIC-Business Permit") {
							$('.data').css('display', 'block');
							$('.search').css('display', 'none');
							$('.data-table').css('display', 'none');
							$('.fsec').css('display', 'none');
							$('.occupancy').css('display', 'none');
							var img = "../../commerce/Files/"+''+val['business_permit'];
							var img1 = "../../commerce/Files/"+''+val['insurance_policy'];
							var img2 = "../../commerce/Files/"+''+val['bfp_or'];
							$('#number_q').text(val['queue']);
							$('#business').text(val['business_name']);
							$('#type').text(val['service_type']);
							$('#owner').text(val['business_owner']);
							$('#email').text(val['email']);
							$('#contact').text(val['contact_number']);
							$('#img1').attr('src',img);
							$('#img2').attr('src',img1);
							$('#img3').attr('src', img2);
							$('#fk_id').text(val['tbl_info_fk']);
							$('#approve').attr('value',val['tbl_service_id']);
							$('#lack').attr('value',val['tbl_service_id']);
						}
						else if (val['service_type'] == "FSIC-Occupancy Permit") {
							$('.data').css('display', 'none');
							$('.search').css('display', 'none');
							$('.data-table').css('display', 'none');
							$('.fsec').css('display', 'none');
							$('.occupancy').css('display', 'block');

							// files
							var img1 = "../../commerce/Files/"+''+val['endorsement'];
							var img2 = "../../commerce/Files/"+''+val['building_completion'];
							var img3 = "../../commerce/Files/"+''+val['electrical_completion'];
							var img4 = "../../commerce/Files/"+''+val['fsec_certificate'];
							var img5 = "../../commerce/Files/"+''+val['bfp_or'];


							// data

							$('#occupancy_ticket').text(val['queue']);
							$('#occupancy_name').text(val['business_name']);
							$('#occupancy_type').text(val['service_type']);
							$('#occupancy_owner').text(val['business_owner']);
							$('#occupancy_email').text(val['email']);
							$('#occupancy_contact').text(val['contact_number']);
							$('#endorse').attr('src',img1);
							$('#building').attr('src',img2);
							$('#electrical').attr('src', img3);
							$('#fsec').attr('src', img4);
							$('#or').attr('src', img5);
							$('#fk_id').text(val['tbl_info_fk']);
							$('#occupancy_btn').attr('value',val['tbl_service_id']);
							$('#occupancy_lack').attr('value',val['tbl_service_id']);

						}
					});
				},2000);
			}
		}
	});
}

