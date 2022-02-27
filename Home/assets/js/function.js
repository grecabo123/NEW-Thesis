$(document).ready(function() {
	$(document).on('click', '#application', function(event) {
		$('#caret').toggleClass('rotate');
		$('.dropdown').toggleClass('show');
		/* Act on the event */
	});

	$(document).on('click', '#menu-toggle', function(event) {
		event.preventDefault();
		$('#wrapper').toggleClass('toggled');
		$('#caret-report').toggleClass('rotate');
		$('.dropdown-report').toggleClass('show');
		/* Act on the event */
	});
});