 $(document).ready(function(){
 	$('#approve').click(function(event) {
		var num = $(this).attr('value');

		console.log(num);

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
						window.location = "application";
					},2000)
				}
				else{

				}
			}
		})

	});

 }); 


 function Out(){
 	window.location = "application";
 } 



var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('img_docu');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
// var info = document.querySelector('.personal');
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
    
}


// When the user clicks on <span> (x), close the modal
modal.onclick = function() {
    img01.className += " out";
    setTimeout(function() {
       modal.style.display = "none";
       img01.className = "modal-content_img";
     }, 400);
    
 } 



