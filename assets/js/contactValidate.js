// JavaScript Document 

function valfName(){
	var nameRegex = /[%*!:;$]+/;
	var name = document.getElementById("fname").value;
	if(name.match(nameRegex)){
		invalid("fname", 'Names cannot contain special characters: %*!:;$');
		return false;
	}else{
		document.getElementById("fnameHelp").innerHTML = '';
		return true;
	}
}

function vallName(){
	var nameRegex = /[%*!:;$]+/;
	var name = document.getElementById("lname").value;
	if(name.match(nameRegex)){
		invalid("lname", 'Names cannot contain special characters: %*!:;$');
		return false;
	}else{
		document.getElementById("lnameHelp").innerHTML = '';
		return true;
	}
}

function valEmail(){
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var email = document.getElementById("email").value;
	if(!email.match(emailRegex)){
		invalid("email", 'Invalid email address: john.doe@gmail.com');
		return false;
	}else{
		document.getElementById("emailHelp").innerHTML = '';
		return true;
	}
}

function valPhone(){
	var phoneNumRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
	var phoneNum = document.getElementById("phone").value;
	if(!phoneNum.match(phoneNumRegex)){
		invalid("phone", 'Invalid phone number: 123-123-1234');
		return false;
	}else{
		document.getElementById("phoneHelp").innerHTML = '';
		return true;
	}
}

function valPrefMethod(){
	var prefPhone = document.getElementById("prefPhone").checked;
	var prefEmail = document.getElementById("prefEmail").checked;
	
	if(prefPhone || prefEmail){
		document.getElementById("prefHelp").innerHTML = '';
		return true;
	}else{
		invalid('pref', "Please select a prefered contact methods.");
		return false;
	}
}

function valComment(){
	var commentRegex = /[%*!:;$]+/;
	var comment = document.getElementById("comment").value;
	if(comment.match(commentRegex)){
		invalid("comment", 'Comments cannot contain special characters: %*!:;$');
		return false;
	}else{
		document.getElementById("commentHelp").innerHTML = '';
		return true;
	}
}

function validateAll(){	
	var vFName = valfName();
	var vLName = vallName();
	var vEmail = valEmail();
	var vPhone = valPhone();
	var vPrefMethod = valPrefMethod();
	var vComment = valComment();
	
	if(vFName && vLName && vEmail && vPhone && vPhone && vPrefMethod && vComment){
		printComment();
	}else{
		document.getElementById("result").innerHTML = '<h3>One or more fields is incorrect. Please review and re-submit.<h3>';
	}
}

function invalid(elementId, message){
	var element = document.getElementById(elementId+'Help');
	element.innerHTML = message;
	element.style.color = 'red';
}

function printComment(){
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	var comment = document.getElementById("comment").value;
	var prefPhone = document.getElementById("prefPhone").checked;
	var prefEmail = document.getElementById("prefEmail").checked;
	var result = document.getElementById("result");
	result.innerHTML = '<h4>Name: ' + fname + ' ' + lname + '</h4>';
	result.innerHTML += '<h4>Email: ' + email + '</h4>';
	result.innerHTML += '<h4>Phone Number: ' + phone + '</h4>';
	if(prefPhone){
		result.innerHTML += '<h4>Prefered Method of Contact: Phone</h4>';
	}else if(prefEmail){
		result.innerHTML += '<h4>Prefered Method of Contact: Email</h4>';
	}
	result.innerHTML +='<h4>Comment:</h4><p>' + comment + '</p>';
}