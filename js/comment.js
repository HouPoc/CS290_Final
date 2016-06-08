function check_comment(){
	var comment=document.getElementById("comment").value;
	var length=comment.length;
	if (length == 0){
		document.getElementById("check_error").innerHTML="Comment cannot be empty";
	}
	else {
		document.getElementById("upload_comment").submit();
	}
}