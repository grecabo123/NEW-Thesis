$(document).ready(function(){

	load_data();


	$('#select').on('change',function(){
		var data = $(this).val();
		if (data == "Upload File") {
			$('.upload_file').css('display', 'block');
			console.log("hei");
		}
		else if(data == "On Site"){
			$('.upload_file').css('display', 'none');
		}
	});
	

	function load_payment(view=""){
		$.ajax({
			url: "fetch",
			method: "POST",
			data:{
				view:view,
				
			},
			dataType: "json",
			success:function(data){
				
				$('.result').html(data.notification);
				if (data.unseen_notification > 0) {
					$('.notification').html(data.unseen_notification);
				}
				else{
					$('.notification').html("");
				}
			}
		});
	}

	$(document).on('click', '.view_data', function(event) {
		event.preventDefault();
		var num = $(this).attr('value');
		console.log(num)
		
		$.ajax({
			url: "update",
			type: "POST",
			data:{
				"update" : true,
				num:num,
			},
			success:function(response){
				if (response == 0) {
					// $('.payment').addClass('bg-active');
				}
				else{
					var today = new Date();
					var dd = String(today.getDate()).padStart(2, '0');
					var mm = String(today.getMonth() + 1).padStart(2, '0');
					var yyyy = today.getFullYear();

					today = mm + '/' + dd + '/' + yyyy;
					$.each(response, function(index, val) {
						var img = "../../personnel/fca/attachments/"+''+val['File_payment'];
						// console.log(val['ref_id']);
						$('.payment').addClass('bg-active');
						$('#receipt').text(val['queue']);
						$('#current_date').text(today);
						$('#name').text(val['business_owner']);
						$('#type').text(val['service_type']);
						$('#full_name').attr('value',val['business_owner']);
						$('#submit').prop('value',val['tbl_business_fk']);
						$('#pk_id').prop('value', val['tbl_service_id']);
						
					});
				}
			}
		});
	});

	$(document).on('click', '#cancel', function(event) {
		event.preventDefault();
		$('.payment').removeClass('bg-active');
		
		$('#upload_file').val("");
		$('#owner-fsic').val("");
		$('#business_name').val("");
		/* Act on the event */
	});


	$('#upload_file').change(function(event) {
		var file_payment = $('#upload_file').val().split('.').pop().toLowerCase();

		if ($('#upload_file')[0].files.length === 1 && $.inArray(file_payment, ['png','jpeg','jpg','pdf']) == 0) {
			$('#submit').attr('disabled', false);
			$('.error').html("");
		}
		else{
			$('#submit').attr('disabled', true);
			$('.error').html("Please Input a correct file");
		}
	});




	load_payment();

	setInterval(function(){
		load_payment();
	},2000);

	setInterval(function(){
		load_data();
	},2000);

	
	// $('#submit').click(function(event) {
	// 	/* Act on the event */
	// });


});


function Payment(){
	var payment_file = $('#upload_file')[0].files[0];
		var transaction_code = $('#tranaction_code').val();
		var name = $('#name').val();
		var amt = $('#amount').val();
		var id_fk = $('#pk_id').val();

		var form_data = new FormData();

		if ($('#upload_file')[0].files.length === 1) {

			// file for payment
			form_data.append('payment',payment_file);

			// data for fields
			form_data.append('transaction_code',transaction_code);
			form_data.append('amt',amt);
			form_data.append('name',name);
			form_data.append('id_fk',id_fk);

			$.ajax({
				url: "transaction",
				type: "POST",
				datatype: "script",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,


				success:function(response){
					// console.log(response);
					if (response == 2) {
						
						$('#tranaction_code').val('');
						$('#name').val('');
						$('#amount').val('');
						$('#pk_id').val('');
						$('.payment').removeClass('bg-active')
						$('.center_sp').addClass('bg-spin');
						setTimeout(function(){
							$('.center_sp').removeClass('bg-spin');
							alertify.success('Your payment has been sent');
						},3000);

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


function load_data(){
	// console.log("12");
	$.ajax({
		type: "POST",
		url: "data_load",
		success:function(response){
			// console.log(response)
			$('td').remove();
			if (response == 2) {
				
			}
			else{

				$.each(response, function(index, val) {
					$('#table_data').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >View</a></td>'+
                            '</tr>'
					);
				});
			}		
		}
	});
}


