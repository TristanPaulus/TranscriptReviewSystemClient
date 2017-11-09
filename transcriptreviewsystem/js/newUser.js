var usernameTxt = document.getElementById("usernameTxt");
var passwordTxt = document.getElementById("passwordTxt");
var confPasswordTxt = document.getElementById("confPasswordTxt");
var firstnameTxt = document.getElementById("firstnameTxt");
var lastnameTxt = document.getElementById("lastnameTxt");
var emailTxt = document.getElementById("emailTxt");

var usernameError = document.getElementById("usernameError");
var passwordError = document.getElementById("passwordError");
var confPasswordError = document.getElementById("confPasswordError");
var lastnameError = document.getElementById("lastnameError");
var firstnameError = document.getElementById("firstnameError");
var emailError = document.getElementById("emailError");

var btn = document.getElementById("addUserBtn");

btn.addEventListener("click", function(){

	var myRequest = new XMLHttpRequest();
	var url = "http://localhost:8080/user/find"+usernameTxt.value;
	myRequest.open("GET", url);

	myRequest.onload = function(){
		if(myRequest.responseText=="")
		{
			usernameError.style.display = "none";
			var validUserFlag = true;
			validUserFlag = validateUsername(usernameTxt);
			validUserFlag = validatePassword(passwordTxt, confPasswordTxt);
			validUserFlag = validateFirstname(firstnameTxt);
			validUserFlag = validateLastname(lastnameTxt);
			validUserFlag = validateEmail(emailTxt);

		}
		else
		{
			usernameError.innerHtml = "*User already exists";
			usernameError.style.display = "inline";
			var myData = JSON.parse(myRequest.responseText);
			console.log(myData);
		}

		if(validUserFlag)
		{
			addUser();
		}
		else
		{

		}
	}

	myRequest.send();
});

function addUser()
{
	var userRequest = new XMLHttpRequest();
	userRequest.open("POST", "http://localhost:8080/user/add");
	userRequest.setRequestHeader("Content-Type", "application/json");
	userRequest.setRequestHeader("Access-Control-Allow-Origin","*");
	userRequest.setRequestHeader("Access-Control-Allow-Headers","*");
	var obj = JSON.stringify({passwordkey: passwordTxt.value,email: emailTxt.value,id: usernameTxt.value,firstname: firstnameTxt.value,surname: lastnameTxt.value});
	console.log(obj);
	userRequest.send(obj);
	window.history.go(-1);
}

function validateUsername(usernameTxt)
{
	if(usernameTxt == "")
	{
		usernameError.innerHtml = "*Cannot be empty";
		usernameError.style.display = "inline";
		return false;
	}
	else
	{
		return true;
	}
}

function validateFirstname(firstnameTxt)
{
	firstnameError.style.display = "none";
	if(firstnameTxt.value == "")
	{
		firstnameError.style.display = "inline";
		return false;
	}
	else
		return true;
}

function validateLastname(lastnameTxt)
{
	lastnameError.style.display = "none";
	if(lastnameTxt.value == "")
	{
		lastnameError.style.display = "inline";
		return false;
	}
	else
		return true;
}

function validateEmail(emailTxt)   
{  
	emailError.style.display = "none";
 	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailTxt.value))  
  	{  
  	  	return true;  
  	}  
 	else
 	{
 		emailError.style.display = "inline";
 	  	return false;
 	}  
}

function validatePassword(passwordTxt, confPasswordTxt)
{
	passwordError.style.display = "none";
	confPasswordError.style.display = "none";

	if((passwordTxt.value == confPasswordTxt.value))
	{
		if(passwordTxt.value == "")
		{
			passwordError.style.display = "inline";
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		confPasswordError.style.display = "inline";
		return false;
	}
}