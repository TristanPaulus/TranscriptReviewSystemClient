var idTxt = document.getElementById("idTxt");
var clipNameTxt = document.getElementById("clipNameTxt");
var durationTxt = document.getElementById("durationTxt");

var idError = document.getElementById("idError");
var clipNameError = document.getElementById("clipNameError");
var durationError = document.getElementById("durationError");


function validateClipName(clipNameTxt)
{
	clipNameError.style.display = "none";
	if(clipNameTxt.value == "")
	{
		clipNameError.style.display = "inline";
		return false;
	}
	else
		return true;
}

function validateDuration(durationTxt)
{
	durationError.style.display = "none";
	if(durationTxt.value == "" || !isNaN(durationTxt))
	{
		durationError.style.display = "inline";
		return false;
	}
	else
		return true;
}

validateClipName(clipNameTxt);
validateDuration(durationTxt);