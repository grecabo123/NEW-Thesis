

window.onload = addEventListener();


function addEventListener(){
	if (window.addEventListener) {
		document.getElementById('incident').addEventListener('click',destroy_chart,false);
	}
}


function destroy_chart(){
	
	// alert("awd1");
}