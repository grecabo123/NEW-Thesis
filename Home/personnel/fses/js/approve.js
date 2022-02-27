$(document).ready(function() {
	
	$('#approve').click(function(event) {
		var num = $(this).attr('value');

		$.ajax({
			url: "update",
			type: "POST",
			data:{
				"update" : true,
				num:num,
			},
			success:function(response){
				if (response == 1) {
					$('#approve').css('display', 'none');
					$('#loading').css('display', 'block');
					setTimeout(function(){
						window.location = "form";
					},2000)
				}
				else{

				}
			}
		})

	});	
});


function Out(){
	window.location = "form";
}
