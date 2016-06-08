function check_sign_up() {
	var check_u_n=0;
	var check_ps=0;
	var check_ps_1=0;
	var regular_expression="^[A-Z].*[0-9]{2}$"; //Password must start with an uppercase letter and end with two digits
	var user_name=document.getElementById("u_n_s").value;
	var user_password=document.getElementById("u_n_p").value;
	var user_password_1=document.getElementById("u_n_p_1").value;
	var check=new RegExp(regular_expression);
	var msg=check.test(user_password);	
	if (user_name == ""){
		document.getElementById("check_user_name_sign").innerHTML="Username cannot be empty";
		document.getElementById("check_user_name_sign").style.color="red";
		check_u_n=1;
	}
	else { 
		var xhtml = new XMLHttpRequest();
		xhtml.onreadystatechange = function () {
			if (xhtml.readyState == 4 && xhtml.status == 200) {
				var return_result = xhtml.responseText; 
				if (return_result==1){
					document.getElementById("check_user_name_sign").innerHTML="Username exists";
					document.getElementById("check_user_name_sign").style.color="red";
					check_u_n=1;
					if (check_u_n==0 && check_ps==0 && check_ps_1==0){
						document.getElementById("sign_up").submit();
					}
				}
				else {
					document.getElementById("check_user_name_sign").innerHTML="Valid";
					document.getElementById("check_user_name_sign").style.color="green";
					check_u_n=0;
					if (check_u_n==0 && check_ps==0 && check_ps_1==0){
						document.getElementById("sign_up").submit();
					}
				}
			}
		}
		xhtml.open("GET", "check_sign_up.php?username=" + user_name, true);
		xhtml.send(null);
	}
	if (user_password == ""){
		document.getElementById("check_password_sign").innerHTML="Password cannot be empty";
		document.getElementById("check_password_sign").style.color="red";
		check_ps=1;
	}
	else if (msg==false){
		document.getElementById("check_password_sign").innerHTML="Password must start with an uppercase letter and end with two digits";
		document.getElementById("check_password_sign").style.color="red";
		check_ps=1;
	}
	else {
		document.getElementById("check_password_sign").innerHTML="Valid";
		document.getElementById("check_password_sign").style.color="green";
		check_ps=0;
	}
	if (user_password!=user_password_1){
		document.getElementById("check_password_1_sign").innerHTML="Passwords are not consistent";
		document.getElementById("check_password_1_sign").style.color="red";
		check_ps_1=1;
	}
	else if ( user_password_1!="" ){
		document.getElementById("check_password_1_sign").innerHTML="Valid";
		document.getElementById("check_password_1_sign").style.color="green";
		check_ps_1=0;
	}
}



function check_log_in (){
	var check_u_n=0;
	var check_ps=0;
	var user_name=document.getElementById("u_n_l").value;
	var user_password=document.getElementById("u_p_l").value;
	if (user_name == ""){
		document.getElementById("check_user_name_log").innerHTML="Username cannot be empty";
		document.getElementById("check_user_name_log").style.color="red";
		check_u_n=1;
	}
	if (user_password == ""){
		document.getElementById("check_password_log").innerHTML="Password cannot be empty";
		document.getElementById("check_password_log").style.color="red";
		check_ps=1;
	}
	if (check_u_n==0 && check_ps==0){
		var xhtml = new XMLHttpRequest();
		xhtml.onreadystatechange = function () {
			if (xhtml.readyState == 4 && xhtml.status == 200) {
				var return_result = xhtml.responseText;
				if (return_result==1){
					document.getElementById("log_in").submit();
				}
				else {
					document.getElementById("check_user_name_log").innerHTML="Invalid username or password";
					document.getElementById("check_password_log").innerHTML="Invalid username or password";
					document.getElementById("check_user_name_log").style.color="red";
					document.getElementById("check_password_log").style.color="red";
				}
			}
		}
		xhtml.open("GET", "check_log_in.php?username=" + user_name + "&password=" +user_password, true);
		xhtml.send(null);
	}
}


















