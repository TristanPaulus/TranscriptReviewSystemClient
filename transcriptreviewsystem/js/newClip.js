var idTxt = document.getElementById("idTxt");
var clipNameTxt = document.getElementById("clipNameTxt");
var durationTxt = document.getElementById("durationTxt");

var idError = document.getElementById("idError");
var clipNameError = document.getElementById("clipNameError");
var durationError = document.getElementById("durationError");

//var btn = document.getElementById("logClipBtn");

/*btn.addEventListener("click", function(){

	var validClip = true;

	validClip = validateClipName(clipNameTxt);
	validClip = validateDuration(durationTxt);

	if(validClip)
	{
		addClip();
		window.history.go(-1); 
	}
	else
	{
		console.log('Invalid clip');
	}

});

function addClip()
{
	var userRequest = new XMLHttpRequest();
	userRequest.open("POST", "http://localhost:8080/audioclip/add");
	userRequest.setRequestHeader("Content-Type", "application/json");
	userRequest.setRequestHeader("Access-Control-Allow-Origin","*");
	userRequest.setRequestHeader("Access-Control-Allow-Headers","*");
	var obj = JSON.stringify({audio_id: idTxt.value,clip_name: clipNameTxt.value,duration: durationTxt.value});
	console.log(obj);
	userRequest.send(obj);
}*/



function fillId()
{
	var myRequest = new XMLHttpRequest();
	var url = "http://localhost:8080/audioclip/all";
	myRequest.open("GET", url);

	var id = "";

	myRequest.onload = function(){
		var myData = JSON.parse(myRequest.responseText);

		for(var i = 0; i<myData.length; i++)
		{
			id = myData[i].audio_id;
		}

		id = parseInt(id) + 1;

		document.getElementById("idTxt").value = id;
		console.log(id);
	}

	myRequest.send();
}

fillId();