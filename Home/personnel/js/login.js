$(document).ready(function(){
	$('#personnel_login').click(function(event) {
		var user = $('#user').val().trim();
		var pass = $('#pass').val().trim();
		var rank = $('#rank').val().trim();
		if (rank == "Chief Operation") {
			if (user != "" && pass != "" && rank != "") {
				$.ajax({
					url: "validate",
					type: "POST",
					data: {
						user:user,
						pass:pass,
						rank:rank
					},
					success:function(response){
						// console.log(response);
						var msg = "";
						if (response == 0) {
							msg = "Invalid Username and Password";
							$('#pass').val("");
							// $(this).closest('form').find('#pass').val("");
						}
						else{
							
							$('#personnel_login').css('display', 'none');
							$('.hide').css('display', 'block');
							setTimeout(function(){
								window.location = "operation/index.php";
							},3000);
							
						}
						$('.message').html(msg);
					}
				});
			}
			
		}
		else if(rank == "Chief Relation Officer"){
			if (user != "" && pass != "" && rank != "") {
				$.ajax({
					url: "validate",
					type: "POST",
					data: {
						user:user,
						pass:pass,
						rank:rank
					},
					success:function(response){
						// console.log(response);
						var msg = "";
						if (response == 0) {
							msg = "Invalid Username and Password";
							$('#pass').val("");
							// $(this).closest('form').find('#pass').val("");
						}
						else{
							$('#personnel_login').css('display', 'none');
							$('.hide').css('display', 'block');
							setTimeout(function(){
								window.location = "chief_relation/index.php";
							},3000);
							
						}
						$('.message').html(msg);
					}
				});
			}
			
		}
		else if(rank == "FCCA"){
			if (user != "" && pass != "" && rank != "") {
				$.ajax({
					url: "validate",
					type: "POST",
					data: {
						user:user,
						pass:pass,
						rank:rank
					},
					success:function(response){
						// console.log(response);
						var msg = "";
						if (response == 0) {
							msg = "Invalid Username and Password";
							$('#pass').val("");
							// $(this).closest('form').find('#pass').val("");
						}
						else{
							$('#personnel_login').css('display', 'none');
							$('.hide').css('display', 'block');
							setTimeout(function(){
								window.location = "fcca/index.php";
							},3000);
							
						}
						$('.message').html(msg);
					}
				});
			}
		}
		else if(rank == "FCA"){
			if (user != "" && pass != "" && rank != "") {
				$.ajax({
					url: "validate",
					type: "POST",
					data: {
						user:user,
						pass:pass,
						rank:rank
					},
					success:function(response){
						// console.log(response);
						var msg = "";
						if (response == 0) {
							msg = "Invalid Username and Password";
							$('#pass').val("");
							// $(this).closest('form').find('#pass').val("");
						}
						else{
							$('#personnel_login').css('display', 'none');
							$('.hide').css('display', 'block');
							setTimeout(function(){
								window.location = "fca/index.php";
							},3000);
							
						}
						$('.message').html(msg);
					}
				});
			}
		}
		else if(rank == "chief fses"){
			if (user != "" && pass != "" && rank != "") {
				$.ajax({
					url: "validate",
					type: "POST",
					data: {
						user:user,
						pass:pass,
						rank:rank
					},
					success:function(response){
						// console.log(response);
						var msg = "";
						if (response == 0) {
							msg = "Invalid Username and Password";
							$('#pass').val("");
							// $(this).closest('form').find('#pass').val("");
						}
						else{
							$('#personnel_login').css('display', 'none');
							$('.hide').css('display', 'block');
							setTimeout(function(){
								window.location = "fses/index.php";
							},3000);
							
						}
						$('.message').html(msg);
					}
				});
			}
		}
		else if(rank == "Inspector"){
			if (user != "" && pass != "" && rank != "") {
				$.ajax({
					url: "validate",
					type: "POST",
					data: {
						user:user,
						pass:pass,
						rank:rank
					},
					success:function(response){
						// console.log(response);
						var msg = "";
						if (response == 0) {
							msg = "Invalid Username and Password";
							$('#pass').val("");
							// $(this).closest('form').find('#pass').val("");
						}
						else{
							$('#personnel_login').css('display', 'none');
							$('.hide').css('display', 'block');
							setTimeout(function(){
								window.location = "inspector/index";
							},3000);
							
						}
						$('.message').html(msg);
					}
				});
			}
		}
		
	});
});