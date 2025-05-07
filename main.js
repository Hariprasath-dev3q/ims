let passvisible = document.getElementById('eye-btn');
let passvalue = document.getElementById('ip-box');	

passvisible.onclick = function(){
	if(passvalue.type == "password"){
		passvalue.type = "text";

	}
	else{
		passvalue.type = "password";
	}
}

// login register validation
v1 = document.getElementById('un-box');
v2 = document.getElementById('email-box');
v3 = document.getElementById('ip-box');

e1 = document.getElementById('er1');
e2 = document.getElementById('er2');
e3 = document.getElementById('er3');


function validate(){
	if(v1.value==""){
		v1.style.border="1px solid red";
		e1.innerHTML="Enter the valid username";
		e1.style.color="red";
		 // v1.focus();	
		return false;
	}
	else{
		e1.innerHTML="";
		v1.style.border="1px solid black";
	}
	if(v2.value==""){
		v2.style.border="1px solid red";
		e2.innerHTML="Enter the valid email";
		e2.style.color="red";
		// v2.focus();	
		return false;

	}
	else{
		e2.innerHTML="";
		v2.style.border="1px solid black";
	}
	if(v3.value=="" || v3.value.length < 8){
		v3.style.border="1px solid red";
		e3.innerHTML="Enter the password atleast 8 character";
		e3.style.color="red";
		// v3.focus();	
		return false;

	}
	else{
		e.innerHTML="";
		v3.style.border="1px solid black";
	}
	
	
}
