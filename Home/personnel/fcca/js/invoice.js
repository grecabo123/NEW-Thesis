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
});

function Out(){
	window.location = "transaction";
}