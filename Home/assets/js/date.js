function timedisplay() {
	var input;
	var pass = "12345";
	var today = new Date();
	var month = today.getMonth() + 1;
	var day = today.getDate();
	var year = today.getFullYear();
	var current = `${day}-${year}`;
	var name =["January", "February", "March","April","May","June","July","August","September","October","November","December"];
	var mntname = "";


		// Idetify the month
		if(month == 1){
			mntname = "Jan";
		}
		else if(month == 2){
			mntname = "Feb";
		}
		else if(month == 3){
			mntname = "Mar";
		}
		else if(month == 4){
			mntname = "April";
		}
		else if(month == 5){
			mntname = "May";
		}
		else if(month == 6){
			mntname = "Jun";
		}
		else if(month == 7){
			mntname = "Jul";
		}
		else if(month == 8){
			mntname = "Aug";
		}
		else if(month == 9){
			mntname = "Sep";
		}
		else if(month == 10){
			mntname = "Oct";
		}
		else if(month == 11){
			mntname = "Nov";
		}
		else if(month == 12){
			mntname = "Dec";
		}

			var am_pm = "";
			var mi = ""
			var current_hour = today.getHours();
			var min = today.getMinutes();
			var sec = today.getSeconds();

			// Hour
			if (current_hour < 12) {
				am_pm = "AM";
			}
			else{
				am_pm = "PM";
			}

			if(current_hour == 0){
				current_hour = 12;
			}
			else if( current_hour > 12){
				current_hour = current_hour - 12;
			}

			if (current_hour.toString().length == 1) {
				current_hour = "0"+current_hour;
			}
					// mins
					if (min < 10 ){
						min = "0"+min;
					}

					// Seconds
					 if(sec < 10){
						sec = "0" +sec;
					}

					// var time = today.getHours()+ ":" +today.getMinutes()+ ":" +today.getSeconds();
					var clock = document.getElementById('date');					
					document.getElementById('date').innerHTML = mntname+" "+current+"  "+current_hour+":"+min+":"+sec+" "+am_pm;
				
			setTimeout("timedisplay();",1000);
	}

	timedisplay();
