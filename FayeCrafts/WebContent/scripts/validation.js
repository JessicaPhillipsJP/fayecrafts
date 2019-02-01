function validateContactform() {
	if(!validateRequiredInput()){
		$('#message').text("Please Complete All Fields");
		event.preventDefault();
	}else if(!validateComment()) {
		$('#message').text("Please Remove All External Links");
		event.preventDefault();
	}
}
function validateComment() {
	var x = document.forms["contactForm"]["comment"].value.toLowerCase();
	var url_array = ["http:\/\/", "https:\/\/"];
	var i;
	for(i=0; i<url_array.length; i++) {
		if (x.includes(url_array[i])) {
			return false;
		}
	}
	return true;
}

function validateRequiredInput() {
	var bool = true;
	
	// check name input
	if($('input[name=name]').val() == ""){
		bool = false;
	}
	
	// check email input
	if($('input[name=email]').val() == ""){
		bool = false;
	}
	
	// check subject input
	if($('input[name=subject]').val() == ""){
		bool = false;
	}
	
	// check message input
	if($('textarea[name=comment]').val() == ""){
		bool = false;
	}
	return bool;
}