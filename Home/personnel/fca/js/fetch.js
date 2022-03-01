$(document).ready(function(){

	// fsic
	$('#view').click(function(event) {
		$('.info_body').css('display', 'none');
		$('.fsic_files').css('display', 'block');
	});

	$('#fsic_return').click(function(event) {
		$('.info_body').css('display', 'block');
		$('.fsic_files').css('display', 'none');
	});
	// emd of fsic

	// fsec 
	$('#fsec_view').click(function(event) {
		$('.fsec_info').css('display', 'none');
		$('.fsec_files').css('display', 'block');
	});

	$('#fsec_cancel').click(function(event) {
		$('.search').css('display', 'block');
		$('.loading').css('display', 'none');
		$('.normal').css('display', 'block');
		$('.payment_fsec').css('display', 'none');
		$('.data-table').css('display', 'block');
	});

	$('#fsec_return').click(function(event) {
		$('.fsec_info').css('display', 'block');
		$('.fsec_files').css('display', 'none');
	});
	// end of fsec

	// occu
	$('#occu_view').click(function(event) {
		$('.occu_info').css('display', 'none');
		$('.occu_files').css('display', 'block');
	});

	$('#occu_cancel').click(function(event) {
		$('.search').css('display', 'block');
		$('.loading').css('display', 'none');
		$('.normal').css('display', 'block');
		$('.payment_occu').css('display', 'none');
		$('.data-table').css('display', 'block');
	});

	$('#occu_return').click(function(event) {
		$('.occu_info').css('display', 'block');
		$('.occu_files').css('display', 'none');
	});

	$('#amount').keyup(function(event) {
		var number = $(this).val();
		var a = number.toFixed(2);
	});

	$('#cancel').click(function(event) {
		$('.search').css('display', 'block');
		$('.loading').css('display', 'none');
		$('.normal').css('display', 'block');
		$('.payment_fsic').css('display', 'none');
		$('.data-table').css('display', 'block');
	});

	// fsic business
	$('#file_payment').change(function(event) {
		var file = $('#file_payment').val().split('.').pop().toLowerCase();
		var amount_fee = $('#amount').val();

		if ($('#file_payment')[0].files.length === 1 && $.inArray(file,['png','jpeg','jpg','pdf']) === 0) {
			$('#send').attr('disabled',false);
			$('.error').html("");
		}
		else{
			$('#send').attr('disabled',true);
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error').html(msg);
		}
	});


	// fsec
	$('#fsec_payment').change(function(event) {
		var file = $('#fsec_payment').val().split('.').pop().toLowerCase();
		var amount_fee = $('#fsec_payment').val();

		if ($('#fsec_payment')[0].files.length === 1 && $.inArray(file,['png','jpeg','jpg','pdf']) === 0) {
			$('#fsec_send').attr('disabled',false);
			$('.error_fsec').html("");
		}
		else{
			$('#fsec_send').attr('disabled',true);
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_fsec').html(msg);
		}
	});

	// occu
	$('#occu_payment').change(function(event) {
		var file = $('#occu_payment').val().split('.').pop().toLowerCase();
		var amount_fee = $('#occu_amt').val();

		if ($('#occu_payment')[0].files.length === 1 && $.inArray(file,['png','jpeg','jpg','pdf']) === 0) {
			$('#occu_send').attr('disabled',false);
			$('.error_occu').html("");
		}
		else{
			$('#occu_send').attr('disabled',true);
			var msg = "The limit size of file is 23mb and must be correct file format";
			$('.error_occu').html(msg);
		}
	});

function Queue(){
	$.ajax({
		type: "POST",
		url: "que",
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
		url: "current",
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

// fsic business
$('#send').click(function(event) {
		var id = $(this).attr('value');
		var amt = $('#amount').val();
		var file_p = $('#file_payment')[0].files[0];

		console.log(id);
		
		var form_data = new FormData();

		form_data.append('file',file_p);
		form_data.append('amount',amt);
		form_data.append('fk',id);

		$.ajax({
			url: "payment",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success:function(response){
				if (response == 1) {
					setTimeout(function(){
						$('#data_number').val("");
						alertify.success('Payment Has been sent');
						$('.payment_fsic').css('display', 'none');
						$('.search').css('display', 'block');
						$('.normal').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.payment_occu').css('display', 'none');
						$('.payment_fsec').css('display', 'none');
						$('#amount').val('');
						$('#file_payment').val('');
					},2000);
				}
				else{
					setTimeout(function(){
						$('#data_number').val("");
						alertify.error('Failed to send');
						$('.search').css('display', 'block');
						$('.payment_fsic').css('display', 'none');
						$('.normal').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.payment_occu').css('display', 'none');
						$('.payment_fsec').css('display', 'none');
						$('#amount').val('');
						$('#file_payment').val('');
					},2000);
				}
			}
		});	
	});
	// fsec
$('#fsec_send').click(function(event) {
		var id = $(this).attr('value');
		var amt = $('#fsec_amt').val();
		var file_p = $('#fsec_payment')[0].files[0];

		console.log(id);
		
		var form_data = new FormData();

		form_data.append('file',file_p);
		form_data.append('amount',amt);
		form_data.append('fk',id);

		$.ajax({
			url: "payment",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success:function(response){
				if (response == 1) {
					setTimeout(function(){
						$('#data_number').val("");
						alertify.success('Payment Has been sent');
						$('.payment_fsic').css('display', 'none');
						$('.search').css('display', 'block');
						$('.normal').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.payment_occu').css('display', 'none');
						$('.payment_fsec').css('display', 'none');
						$('#fsec_payment').val('');
						$('#fsec_amt').val('');
					},2000);
				}
				else{
					setTimeout(function(){
						$('#data_number').val("");
						alertify.error('Failed to send');
						$('.search').css('display', 'block');
						$('.payment_fsic').css('display', 'none');
						$('.normal').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.payment_occu').css('display', 'none');
						$('.payment_fsec').css('display', 'none');
					},2000);
				}
			}
		});	
	});

// fsic occupancy
$('#occu_send').click(function(event) {
		var id = $(this).attr('value');
		var amt = $('#occu_amt').val();
		var file_p = $('#occu_payment')[0].files[0];

		console.log(id);
		
		var form_data = new FormData();

		form_data.append('file',file_p);
		form_data.append('amount',amt);
		form_data.append('fk',id);

		$.ajax({
			url: "payment",
			type: "POST",
			datatype: "script",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success:function(response){
				if (response == 1) {
					setTimeout(function(){
						$('#data_number').val("");
						alertify.success('Payment Has been sent');
						$('.payment_fsic').css('display', 'none');
						$('.search').css('display', 'block');
						$('.normal').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.payment_occu').css('display', 'none');
						$('.payment_fsec').css('display', 'none');
						$('#occu_payment').val('');
					},2000);
				}
				else{
					setTimeout(function(){
						$('#data_number').val("");
						alertify.error('Failed to send');
						$('.search').css('display', 'block');
						$('.payment_fsic').css('display', 'none');
						$('.normal').css('display', 'block');
						$('.data-table').css('display', 'block');
						$('.payment_occu').css('display', 'none');
						$('.payment_fsec').css('display', 'none');
						$('#occu_amt').val('');
					},2000);	
				}
			}
		});	
	});

});


function Search(){
	var num = $('#data_number').val();

	if (num == "") {
		alert("Please inout number")
	}
	else{
		$('.normal').css('display', 'none');
		$('.error_hide').text("");
		$('.loading').css('display', 'block');

		$.ajax({
			url: "data",
			type: "POST",
			data:{
				"search" : true,
				num:num,
			},
			success:function(data){
				if(data == 1){
					setTimeout(function(){
						var msg = "Ticket number does not exist"+' '+num;
						$('.error_hide').text(msg);
						$('#data_number').val("");
						$('.normal').css('display', 'block');
						$('.loading').css('display', 'none');
					},2000);
				}
				else{
					setTimeout(function(){
						$.each(data, function(index,val) {
							if (val['service_type'] == "FSIC-Business Permit") {
								$('.search').css('display', 'none');
								$('.loading').css('display', 'none');
								$('.payment_fsic').css('display', 'block');
								$('.data-table').css('display', 'none');
								$('.payment_fsec').css('display', 'none');
								$('.payment_occu').css('display', 'none');
								$('#data_number').val("");
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
								$('#approve').attr('value',val['tbl_info_fk']);
								$('#lack').attr('value',val['tbl_info_fk']);
								$('#send').attr('value',val['tbl_info_fk']);
							}
							else if (val['service_type'] == "FSEC-Permit") {
								$('.search').css('display', 'none');
								$('.loading').css('display', 'none');
								$('.payment_fsic').css('display', 'none');
								$('.payment_fsec').css('display', 'block');
								$('.data-table').css('display', 'none');
								$('.payment_occu').css('display', 'none');
								$('#data_number').val("");

								var business_speci = "../../commerce/Files/"+''+val['building_specification'];
								var bill =  "../../commerce/Files/"+''+val['building_specification'];
								var bfp_or =  "../../commerce/Files/"+''+val['bfp_or'];
								var voltage =  "../../commerce/Files/"+''+val['voltage_circuit'];

								$('#fsec_q').text(val['queue']);
								$('#fsec_business').text(val['business_name']);
								$('#fsec_type').text(val['service_type']);
								$('#fsec_owner').text(val['business_owner']);
								$('#fsec_email').text(val['email']);
								$('#fsec_contact').text(val['contact_number']);

								$('#img4').attr('src',business_speci);
								$('#img5').attr('src',bill);
								$('#img6').attr('src',bfp_or);
								$('#img7').attr('src',voltage);

								$('#fk_id').text(val['tbl_info_fk']);
								$('#approve').attr('value',val['tbl_info_fk']);
								$('#fsec_cancel').attr('value',val['tbl_info_fk']);
								$('#fsec_send').attr('value',val['tbl_info_fk']);
							}
							else if (val['service_type'] == "FSIC-Occupancy Permit") {

								$('.search').css('display', 'none');
								$('.loading').css('display', 'none');
								$('.payment_fsic').css('display', 'none');
								$('.payment_fsec').css('display', 'none');
								$('.data-table').css('display', 'none');
								$('.payment_occu').css('display', 'block');
								$('#data_number').val("");

								var endorse = "../../commerce/Files/"+''+val['endorsement'];
								var building = "../../commerce/Files/"+''+val['building_completion'];
								var electrical = "../../commerce/Files/"+''+val['electrical_completion'];
								var fsec_certificate = "../../commerce/Files/"+''+val['fsec_certificate'];
								var or = "../../commerce/Files/"+''+val['bfp_or'];

								$('#occu_q').text(val['queue']);
								$('#occu_business').text(val['business_name']);
								$('#occu_type').text(val['service_type']);
								$('#occu_owner').text(val['business_owner']);
								$('#occu_email').text(val['email']);
								$('#occu_contact').text(val['contact_number']);

								$('#fk_id').text(val['tbl_info_fk']);
								$('#approve').attr('value',val['tbl_info_fk']);
								$('#occu_cancel').attr('value',val['tbl_info_fk']);
								$('#occu_send').attr('value',val['tbl_info_fk']);

								$('#img8').attr('src',endorse);
								$('#img9').attr('src',building);
								$('#img10').attr('src',electrical);
								$('#img11').attr('src',fsec_certificate);
								$('#img12').attr('src',or);

							}
						});
					},2000);
				}
			}
		});
	}
}