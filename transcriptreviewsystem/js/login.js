var usernameContainer  = document.getElementById("usernameDiv");
var passwordContainer  = document.getElementById("passwordDiv");
var btn = document.getElementById("loginBtn");
var usernameTxt = document.getElementById("usernameTxt");
var passwordTxt = document.getElementById("passwordTxt");
var error = document.getElementById("error");

btn.addEventListener("click", function(){

	var myRequest = new XMLHttpRequest();
	myRequest.open("GET", "http://localhost:8080/user/all");
	myRequest.onload = function(){

		var myData = JSON.parse(myRequest.responseText);
		//console.log(myData);
		login(myData, usernameTxt.value, passwordTxt.value, error);
	}
	myRequest.send();
});

function renderHTML(myData){
	var htmlString = myData;
	passwordContainer.insertAdjacentHTML('beforeend', htmlString);
}

function login(myData, username, password, error)
{
	var loginFlag = false;
	for(var i = 0; i < myData.length; i++)
	{
		if(username == myData[i].id && password == myData[i].passwordkey)
		{
			loginFlag = true;
		}
	}

	if(loginFlag)
	{
		error.style.display = "none";
		location.href = "http://localhost/transcriptreviewsystem/homepage.php?username="+username;
	}
	else
	{
		error.style.display = "inline";
		console.log("Username: " + username + ' password:' +password);
	}
}