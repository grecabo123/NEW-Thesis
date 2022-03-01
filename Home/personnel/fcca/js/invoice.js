$(document).ready(function(){

	$('#submit').click(function(event) {
		var id = $(this).attr('value');
		console.log(id);

		$('#submit').css('display', 'none');
		$('#loading').css('display', 'block');

		$.ajax({
			url: "update",
			type: "POST",
			data:{
				"update" : true,
				id:id,
			},
			success:function(response){
				// console.log(response)
				if (response == 0) {
					var msg = "Error"
					$('#error').html(msg);
					// window.location = ""
				}
				else{
					setTimeout(function(){
						window.location = "transaction";
					},2500);
				}
			}
		});
	});
	$('#modal_open').click(function(event) {
		$('.modal_color').addClass('bg-modal');
	});

	$("#lack").click(function(event) {
		$('.modal_color').removeClass('bg-modal');
		$('.lack_msg').addClass('bg-modal');
	});

	$('#send_msg').click(function(event) {
		var id = $(this).attr('value');
		var txt = $('#text-msg').val();

		console.log(id+'\n'+txt);

		$.ajax({
			url: "update",
			type: "POST",
			data:{
				"send_msg" : true,
				id:id,
				txt:txt,
			},
			success:function(response){
				if (response == 1) {
					$('.modal_color').removeClass('bg-modal');
					$('#text-msg').val('');
					$('.lack_msg').removeClass('bg-modal');
					alertify.success("Sent a Message");
					setTimeout(function(){
						window.location = "transaction";
					},2500);
				}
				else{
					alertify.success("Something Went wrong");
				}
			}
		});
	});
});



function modal_close(){
	$('.modal_color').removeClass('bg-modal');
}
function close_msg(){
	$('.modal_color').addClass('bg-modal');
	$('.lack_msg').removeClass('bg-modal');
}