var welcome = document.getElementById("Welcome");

function displayWelcome(username, welcome)
{
	var url = "http://localhost:8080/user/find"+username;

	console.log(url);

	var myRequest = new XMLHttpRequest();
	myRequest.open("GET", url);
	myRequest.onload = function(){

		var user = JSON.parse(myRequest.responseText);
		var welcomeMsg = user.firstname + " " + user.surname;
		//console.log(welcomeMsg);
		welcome.insertAdjacentHTML('beforeend', welcomeMsg);
	}
	myRequest.send();
}

displayWelcome(username, welcome);