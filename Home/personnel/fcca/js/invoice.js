$(document).ready(function(){

	load_file();	

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

	$(document).on('click', '.file_id', function(event) {
		event.preventDefault();
		var id = $(this).attr('value');
		console.log(id);
		
		$.ajax({
			url: "search",
			type: "POST",
			data:{
				"search_file" : true,
				id:id,
			},
			success:function(response){
				console.log(response);
				if (response == 2) {

				}
				else{
					$('.modal_img').addClass('bg-active');
					$.each(response, function(index, val) {
						var img = "../../commerce/Payment/"+''+val['file_payment'];
						 $('#file_name').text(val['file_payment']);
						 $('#file_fetch').attr('src',img);
						 $('#transaction').prop('value',val['transaction_code']);
						 $('#proxy').prop('value',val['proxy_name']);
					});
				}
			}
		});
	});

	
});

function modal_img_close(){
	$('.modal_img').removeClass('bg-active');
}
function back_btn(){
	window.location="transaction";
}

function refresh(){
	window.location="invoice";
}


function load_file(){
	

	$.ajax({
		url: "loadfile",
		// cache: false,
		success:function(data){
			// console.log(data);

			if (data == 2) {

			}
			else{
				var file = "File# ";
				$.each(data,function(index,val){
					$('.list_file_load').append('<li class=""><button class="btn btn-sm btn-outline-secondary w-100 p-2 rounded fs-6 file_id" value="'+val['tbl_transaction_id']+'">'+val['file_payment']+'</button></li>');
				});
			}
		}
	});
}



function modal_close(){
	$('.modal_color').removeClass('bg-modal');
}
function close_msg(){
	$('.modal_color').addClass('bg-modal');
	$('.lack_msg').removeClass('bg-modal');
}

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}