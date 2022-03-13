$(document).ready(function(){

	status();


	setInterval(function(){
		status();
	},2000);

	$(document).on('click', '.compile', function(event) {
		event.preventDefault();
		var num = $(this).attr('value');
    	$.ajax({
    		url: "Compilation/search",
    		type: "POST",
    		data: {
    			"search_fsic" : true,
    			num:num,
    		},
    		success:function(response){
    			console.log(response);
    			if (response == 1) {
    				window.location = "compilation_fsic";
    			}
    		}
    	});
	});

	// fsec
	$(document).on('click', '.compile_fsec', function(event) {
		event.preventDefault();
		var num_fsec = $(this).attr('value');
    	$.ajax({
    		url: "Compilation/search",
    		type: "POST",
    		data: {
    			"search_fsec" : true,
    			num_fsec:num_fsec,
    		},
    		success:function(response){
    			console.log(response);
    			if (response == 1) {
    				window.location = "compilation_fsec";
    			}
    		}
    	});
	});

	// occupancy
	$(document).on('click', '.compile_occupancy', function(event) {
		event.preventDefault();
		var num_occu = $(this).attr('value');
		
    	$.ajax({
    		url: "Compilation/search",
    		type: "POST",
    		data: {
    			"search_occu" : true,
    			num_occu:num_occu,
    		},
    		success:function(response){
    			console.log(response);
    			if (response == 1) {
    				window.location = "compilation_occupancy";
    			}
    		}
    	});
	});


	// re upload for payment

	// FSIC-Occupancy Permit
	$(document).on('click', '.occupancy_payment', function(event) {
		event.preventDefault();
		var id = $(this).attr('value');
		$.ajax({
    		url: "Compilation/search",
    		type: "POST",
    		data: {
    			"occupancy_pay" : true,
    			id:id,
    		},
    		success:function(response){
    			console.log(response);
    			if (response == 1) {
    				window.location = "Resubmit/occupancy";
    			}
    		}
    	});
	});

	// FSEC-Permit
	$(document).on('click', '.fsec_payment', function(event) {
		event.preventDefault();
		var id = $(this).attr('value');
		$.ajax({
    		url: "Compilation/search",
    		type: "POST",
    		data: {
    			"fsec_pay" : true,
    			id:id,
    		},
    		success:function(response){
    			console.log(response);
    			if (response == 1) {
    				window.location = "Resubmit/fsec";
    			}
    		}
    	});
	});

    // FSIC-Business Permit
    $(document).on('click', '.business_payment', function(event) {
        event.preventDefault();
        var id = $(this).attr('value');
        $.ajax({
            url: "Compilation/search",
            type: "POST",
            data: {
                "business_pay" : true,
                id:id,
            },
            success:function(response){
                console.log(response);
                if (response == 1) {
                    window.location = "Resubmit/business";
                }
            }
        });
    });


    // FSIC business permit
    $(document).on('click', '.fsic_inspection', function(event) {
        event.preventDefault();
        /* Act on the event */

        var id = $(this).attr('value');
        var text = $('.fsic_inspection').closest('tr').find('.fsic_inspection').text();
        var type = $('.type_business').closest('tr').find('.type_business').text();

        // console.log(type);

        if (text == "Comply") {
            $.ajax({
                url: "notice/search",
                type: "POST",
                data:{
                    "search" : true,
                    id:id,
                },
                success:function(response){
                    console.log(response);
                    if (response == 1) {
                        window.location= "notice/Comply";
                    }
                }
            });
        }
        else if (text == "Correction") {
            $.ajax({
                url: "notice/search",
                type: "POST",
                data:{
                    "search_c" : true,
                    id:id,
                },
                success:function(response){
                    console.log(response);
                    if (response == 1) {
                        window.location= "notice/Correction";
                    }
                }
            });
        }
        else{
            return false;
        }
    });


    // FSIC Occupancy Permit
     $(document).on('click', '.fsic_occupancy', function(event) {
        event.preventDefault();
        /* Act on the event */

        var id = $(this).attr('value');
        var text = $('.fsic_occupancy').closest('tr').find('.fsic_occupancy').text();
        var type = $('.type_s').closest('tr').find('.type_s').text();

        console.log(type);

        if (text == "Comply") {
            $.ajax({
                url: "notice/search",
                type: "POST",
                data:{
                    "search" : true,
                    id:id,
                },
                success:function(response){
                    console.log(response);
                    if (response == 1) {
                        window.location= "notice/Comply";
                    }
                }
            });
        }
        else if (text == "Correction") {
            $.ajax({
                url: "notice/search",
                type: "POST",
                data:{
                    "search_c" : true,
                    id:id,
                },
                success:function(response){
                    console.log(response);
                    if (response == 1) {
                        window.location= "notice/Correction";
                    }
                }
            });
        }
        else{
            return false;
        }
    });


});


function status(){
	$.ajax({
		async: true,
		url: "status_load",
		cache: false,
		success:function(response){
			
			$('td').remove();
			if (response == 2) {
				
			}
			else{

				$.each(response, function(index, val) {

					// fsic business
					if (val['status_cro'] == "lacking" && val['service_type'] == "FSIC-Business Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="text-danger compile" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+"<span class'text-danger'>Comply</span>"+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
						);
					}

					else if (val['status_cro'] == "pending" && val['service_type'] == "FSIC-Business Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                 '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
						);
					}

                    else if (val['fcca'] == "lacking" && val['status_cro'] == "OK" && val['fca'] == "On Payment" && val['service_type'] == "FSIC-Business Permit") {
                            $('#data_status').append('<tr>'+
                                '<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="business_payment text-danger" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
                            );
                    }
					
					else if (val['status_cro'] == "OK" && val['service_type'] == "FSIC-Business Permit") {
						if (val['fca'] == 'Payment' || val['fca'] == "On Payment" || val['fca'] == "Done" && val['fcca'] == "Paid"  && val['fses'] == "pending") {
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
						}
                        else if (val['fca'] == "OK" && val['fcca'] == "OK" && val['fses'] == "OK" && val['fire_marshal'] == "OK") {
                            $('#data_status').append('<tr>'+
                                    '<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                    '<td class="text-light">'+val['service_type']+'</td>'+
                                    '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                                '</tr>'
                            );
                        }
                        else if (val['inspection'] == "Comply" && val['service_type'] == "FSIC-Business Permit" || val['inspection'] == "Correction" && val['service_type'] == "FSIC-Business Permit") {
                            $('#data_status').append('<tr>'+
                                '<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light"><span class="type_business">'+val['service_type']+'</span></td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-danger fsic_inspection" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
                            );
                        }

						// else if (val['fca'] == "OK" && val['fcca'] == "OK" && val['fses'] == "OK" && val['fire_marshal'] == "OK") {
						// 	$('#data_status').append('<tr>'+
						// 			'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
	     //                            '<td class="text-light">'+val['service_type']+'</td>'+
	     //                            '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
	     //                            '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
	     //                            '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
	     //                            '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
	     //                            '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
	     //                        '</tr>'
						// 	);
						// }
						
						else{
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
						}
					}


					// fsec permit
					else if (val['status_cro'] == "pending" && val['service_type'] == "FSEC-Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
						);
					}
					else if (val['status_cro'] == "lacking" && val['service_type'] == "FSEC-Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="text-danger compile_fsec" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+"<span class'text-danger'>Comply</span>"+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
						);
					}
					else if (val['fcca'] == "lacking" && val['status_cro'] == "OK" && val['fca'] == "On Payment" && val['service_type'] == "FSEC-Permit") {
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="fsec_payment text-danger" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
					}
					else if (val['status_cro'] == "OK" && val['service_type'] == "FSEC-Permit") {
						if (val['fca'] == 'Payment' || val['fca'] == "On Payment" || val['fca'] == "Done" || val['fca'] =="pending" && val['fcca'] == "Paid" && val['fses'] == "pending") {
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
						}
						else if (val['fca'] == "OK" && val['fcca'] == "OK" && val['fses'] == "OK" && val['fire_marshal'] == "OK") {
							$('#data_status').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
	                                '<td class="text-light">'+val['service_type']+'</td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
	                            '</tr>'
							);
						}
						
						else{
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
						}
					
					}
					


					// fsic occupancy
					else if (val['status_cro'] == "pending" && val['service_type'] == "FSIC-Occupancy Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
						);
					}

					else if (val['status_cro'] == "lacking" && val['service_type'] == "FSIC-Occupancy Permit") {
						$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="text-danger compile_occupancy" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+"<span class'text-danger'>Comply</span>"+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
						);
					}
					else if (val['fcca'] == "lacking" && val['status_cro'] == "OK" && val['fca'] == "On Payment" && val['service_type'] == "FSIC-Occupancy Permit") {
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="occupancy_payment text-danger" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
					}
                    else if (val['inspection'] == "Comply" && val['service_type'] == "FSIC-Occupancy Permit" || val['inspection'] == "Correction" && val['service_type'] == "FSIC-Occupancy Permit") {
                            $('#data_status').append('<tr>'+
                                '<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light"><span class="type_s">'+val['service_type']+'</span></td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-danger fsic_occupancy" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
                            );
                        }

					else if (val['status_cro'] == "OK" && val['service_type'] == "FSIC-Occupancy Permit") {
						if (val['fca'] == 'Payment' || val['fca'] == "On Payment" || val['fca'] == "Done" || val['fca'] =="pending" && val['fcca'] == "Paid" || val['fcca'] == "pending" && val['fses'] == "pending") {
							$('#data_status').append('<tr>'+
								'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
                                '<td class="text-light">'+val['service_type']+'</td>'+
                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
                                '<td class="text-light"><a class="view_data text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
                                '<td class="text-light"><a class="text-info" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
                                '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
                            '</tr>'
							);
						}
						else if (val['fca'] == "OK" && val['fcca'] == "OK" && val['fses'] == "OK" && val['fire_marshal'] == "OK") {
							$('#data_status').append('<tr>'+
									'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
	                                '<td class="text-light">'+val['service_type']+'</td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
                                    '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['inspection']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
	                                '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
	                            '</tr>'
							);
						}



						// else{
						// 	$('#data_status').append('<tr>'+
						// 		'<td class="text-light"> <span id="fk_id">'+val['queue']+'</span></td>'+
      //                           '<td class="text-light">'+val['service_type']+'</td>'+
      //                           '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: default;" value="'+val['tbl_service_id']+'" >'+val['status_cro']+'</a></td>'+
      //                           '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fca']+'</a></td>'+
      //                           '<td class="text-light"><a class="view_data text-success fw-bold" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fcca']+'</a></td>'+
      //                           '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fses']+'</a></td>'+
      //                           '<td class="text-light"><a class="view_data" style="text-decoration: none; cursor: pointer;" value="'+val['tbl_service_id']+'" >'+val['fire_marshal']+'</a></td>'+
      //                       '</tr>'
						// 	);
						// }
					}

				});
			}	
		}
	});
}