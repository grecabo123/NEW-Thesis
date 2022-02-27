$(document).ready(function(){
	load_business();


	setInterval(function(){
		load_business();
	},2800);

	$(document).on('click', '#approve', function(event) {
		event.preventDefault();
		var id = $(this).attr('value');

		$.ajax({
			url: "account/all_account",
			type: "POST",
			data: {
				"search" : true,
				id:id,
			},
			success:function(response){
				
				$.each(response, function(index, val) {
					var url = "../upload/"+val['business_attach'];
					$('#account_approve').attr('value',val['tbl_business_id']);
					$('#type').prop('value',val['business_type']);
					$('#name_person').prop('value',val['business_name']);
					$('#email').prop('value', val['business_email']);
					$('#img_docu').attr('src',url);
					$('.personal').addClass('bg-active');
				});
			}
		});
	});

	$('#account_approve').click(function(event) {
		var id = $(this).attr('value');
		var name = $('#name_person').prop('value');
		var email = $('#email').prop('value');
		var type = $('#type').prop('value');
		$('.personal').removeClass('bg-active');
		$('.center_sp').addClass('bg-spin');
		$.ajax({
			url: "account/verify",
			type: "POST",
			data: {
				"send" : true,
				id:id,
				name:name,
				email:email,
				type:type,
			},
			success:function(response){
				if (response == 1) {
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						alertify.success(email+' '+'Sent Notification');
					},2000);
				}
				else{
					setTimeout(function(){
						$('.center_sp').removeClass('bg-spin');
						alertify.error("Failed to Send");
					},2000);
				}
			}
		});
	});
});


function load_business(){
	$.ajax({
		url: "account/business",
		success:function(response){
			$.each(response, function(index, val) {
				$('td').remove();
				if (response == 2) {

				}
				else{
					$.each(response, function(index, val) {
						if (val['status'] == "0") {
							$('#table_data').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['tbl_business_id']+'</span></td>'+
	                                '<td class="text-light">'+val['business_email']+'</td>'+
	                                '<td class="text-light">'+val['business_name']+'</td>'+
	                                '<td class="text-light"><a id="approve" class="text-danger" style="cursor: pointer;" value="'+val['tbl_business_id']+'">Pending</a></td>'+
	                            '</tr>'
							);
						}
						else if (val['status'] == "1") {
							$('#table_data').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['tbl_business_id']+'</span></td>'+
	                                '<td class="text-light">'+val['business_email']+'</td>'+
	                                '<td class="text-light">'+val['business_name']+'</td>'+
	                                '<td class="text-light"><a class="text-success fw-bold fs-6" style="cursor: pointer;" value="'+val['tbl_business_id']+'">Approved</a></td>'+
	                            '</tr>'
							);
						}
					});
				}
			});
		}
	});
}