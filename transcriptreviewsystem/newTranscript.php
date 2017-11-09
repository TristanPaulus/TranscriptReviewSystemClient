<!DOCTYPE html>
<html>
<head>
<?php
	include("header/trs_header.html");
	header('Access-Control-Allow-Origin: *');
?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type='text/javascript'> var username ="<?php echo $_GET['username']?>" </script>
</head>
<body>

<h1>Please ensure that the CORRECT audio clip is playing while transcribing</h1>

<form name="transcriptForm" method="post" action=<?php echo("addTranscript.php?username=".$_GET['username'])?>>
<table>
	 <tr>
	 	<td width="15%"></td>
	 	<td width="85%"></td>
	 </tr>
	 <tr>
	 	<td>
	 		<?php
	 		echo "<a href='newUser.php?username=".$_GET['username']."'>Add new User</a><br/><br/>";
	 		echo "<a href='newClip.php?username=".$_GET['username']."'>Log Audio Clip</a><br/><br/>";
	 		echo "<a href='newTranscript.php?username=".$_GET['username']."'>Write new Transcript</a><br/><br/>";
	 		echo "<a href='viewTranscripts.php?username=".$_GET['username']."'>View Transcripts</a><br/><br/>";
	 		echo "<a href='viewUsers.php?username=".$_GET['username']."'>View User scores</a><br/><br/>";
	 		?>
	 	</td>
	 	<td>
	 		<h3>Transcript ID: <input type="text" name="idTxt" id="idTxt" readonly value=<?php getId()?>></input></h3><br/>
	 		
	 		<h3>Transcriber: <input type="text" name="transcriberTxt" id="transcriberTxt" value=<?php echo $_GET['username']?> readonly></input></h3><br/>

	 		<h3>Audio Clip: <select name="clipTxt" id="clipTxt"><?php getClips()?></select></h3><h3 style="color:red;display:none" id="clipError"> *Audio clip cannot be empty</h3><br/>

	 		<h3>Transcript: <textarea name="Txt" id="Txt"></textarea></h3><h3 style="color:red;display:none" id="lastnameError"> *Transcript cannot be empty</h3><br/>

	 		<input type="submit" name="submitTranscriptBtn" value="Submit Transcript"></button>
	 	</td>
	 </tr>
</table>
</form>

<script type="text/javascript" src="js/newTranscript.js"></script>

</body>
</html>
 

 <?php

function getId()
{
	$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
	$sql = "SELECT transcript_id FROM transcript";
	$result1 = $DBConnect->query($sql);
	while($row1 = $result1->fetch_array())
	{
		$id = $row1['transcript_id'];
	}
	$id += 1;
	echo($id);
}

function getClips()
{
	echo "<option value='0'>--Select an audio clip--</option>";
	$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
	$sql = "SELECT clip_name, audio_id FROM audio_clip ORDER BY clip_name";
	$result1 = $DBConnect->query($sql);
	while($row1 = $result1->fetch_array())
	{
		echo ("<option value=".$row1['audio_id'].">".$row1['clip_name']."</option>");
	}
}

 ?>