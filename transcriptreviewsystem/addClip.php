<?php

function addClip($id, $name, $duration)
{
	$con = @new mysqli("localhost", "root", "", "transcriptreviewsystem");

	if(!$con)
	{
		die('Cannot establish connection to the database'.mysqli_error());
	}

	$sql = "INSERT INTO audio_clip (audio_id, clip_name, duration) VALUES ('$id','$name','$duration')";

	$result = @$con->query($sql);

}

if(isset($_POST['logClipBtn']))
{
	addClip($_POST['idTxt'], $_POST['clipNameTxt'], $_POST['durationTxt']);
	echo("<script type='text/javascript'>location.href = 'homepage.php?username=".$_GET['username']."';</script>");
}

?>