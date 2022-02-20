var el = document.getElementById("wrapper");
	var toggleButton = document.getElementById("menu-toggle");

	toggleButton.onclick = function () {
	    el.classList.toggle("toggled");
};

$(document).ready(function() {
	// Application form modal message
	
	$(document).on('click', '#close_msg', function(event) {
		event.preventDefault();
		$('.chat').removeClass('bg-active');
		/* Act on the event */
	});

	// create account modal
	$(document).on('click', '#account', function(event) {
		event.preventDefault();
		$('.account-form').addClass('bg-active');
		/* Act on the event */
	});
	$(document).on('click', '#close_modal', function(event) {
		event.preventDefault();
		// console.log("!23");
		$('.account-form').removeClass('bg-active');
		/* Act on the event */
	});
	$(document).on('click', '#data-table', function(event) {
		event.preventDefault();
		// $('.table-data').toggleClass('show');
		$('#caret').toggleClass('rotate');
		$('.dropdown_list	').toggleClass('show');
		// $('.input-sm').val("");
		/* Act on the event */
	});
	$(document).on('click', '#menu-toggle', function(event) {
		event.preventDefault();
		// alert("wd");
		$('#wrapper').toggleClass('toggled');
		/* Act on the event */
	});
	$(document).on('click', '.personnel-data', function(event) {
		event.preventDefault();
		$('.table-data').removeClass('show');
		$('.table-data-personnel').toggleClass('show');
		/* Act on the event */
	});
	$(document).on('click', '.non-personnel', function(event) {
		event.preventDefault();
		$('.table-data').toggleClass('show');
		$('.table-data-personnel').removeClass('show');
		/* Act on the event */
	});
	
	$(document).on('click', '#incident', function(event) {
		event.preventDefault();
		$('.bar-chart').css('display', 'none');
		$('.line').css('display', 'block');
   
		/* Act on the event */
	});
	$(document).on('click', '#forms', function(event) {
		event.preventDefault();
		$('.bar-chart').css('display', 'block');
		$('.line').css('display', 'none');
   
		/* Act on the event */
	});

	


	$(document).on('click', '#delete', function(event) {
		event.preventDefault();
		var id = $(this).attr('value');
		
		var dlgContentHTML = $('#dlgContent').html();
		alertify.confirm(dlgContentHTML).set('onok', function(closeevent, value) {	
		
      if (id == id) {
        alertify.success('Successful');
        console.log(id);
        $.ajax({
			type: "POST",
			url: "delete",
			data: {
				"delete" : true,
				id:id
			},
			success:function(response){
				
			}
		});
      } else {
        alertify.error('Wrong')

      }
    }).set({title:"Update"}).set({labels:{ok:'Yes', cancel: 'No'}});
     
		/* Act on the event */
	});
	$(document).on('click', '#view', function(event) {
		event.preventDefault();
		$('.personal').addClass('bg-active');
		var id = $(this).attr('value');
		$.ajax({
			type: "POST",
			url: "view",
			data: {
				"search" : true,
				id:id
			},
			success:function(response){
				$.each(response, function(index, val) {
					var fullname = val['fname']+' '+val['lname'];
					var adr = val['brgy']+' '+val['city'];
					$('.uniq_id').text(val['tbl_user_id']);
					$('#name_person').prop('value',fullname);
					$('#email').prop('value', val['email']);
					$('#contact').prop('value', val['contact']);
					$('#adr').prop('value',adr);
					$('#history_incident').prop('value',val['tbl_user_id']);
					console.log(val['fname']);
					 /* iterate through array or object */
				});
			}
		});
	});



	$(document).on('click', '#close_modal', function(event) {
		event.preventDefault();
		$('.personal').removeClass('bg-active');
		// $('li').remove();
		$('.total').text("");

		/* Act on the event */
	});

	$(document).on('click', '#history_incident', function(event) {
		event.preventDefault();
		var pk = $(this).prop('value');
		console.log(pk);
		$('.information').toggleClass('hide');
		$('.report_incident').toggleClass('show');
		$.ajax({
			type: "POST",
			url: "../user_form",
			data: {
				"view" : true,
				pk:pk,
			},
			dataType: "json",
			success:function(response){
				$('#status_form').html(response.notification_pop);
				$('.total').html(response.total);
			}
		});
	});

	
});