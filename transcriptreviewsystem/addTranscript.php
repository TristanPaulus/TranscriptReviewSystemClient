<?php

function addClip($id, $transcriber, $clip, $transcript)
{
	$con = @new mysqli("localhost", "root", "", "transcriptreviewsystem");

	if(!$con)
	{
		die('Cannot establish connection to the database'.mysqli_error());
	}

	$sql = "INSERT INTO transcript (transcript_id, clip, date, text, transcriber_id) VALUES ('$id','$clip','".date('Y-m-d h:i:s')."', '$transcript', '$transcriber')";

	$result = @$con->query($sql);

}

if(isset($_POST['submitTranscriptBtn']))
{
	addClip($_POST['idTxt'], $_POST['transcriberTxt'], $_POST['clipTxt'], $_POST['Txt']);
	echo("<script type='text/javascript'>location.href = 'homepage.php?username=".$_GET['username']."';</script>");
}

?>