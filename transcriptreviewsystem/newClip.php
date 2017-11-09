<!DOCTYPE html>
<html>
<head>
<?php
	include("header/trs_header.html");
?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type='text/javascript'> var username ="<?php echo $_GET['username']?>" </script>
</head>
<body>
<form name="newClipForm" method="post" action=<?php echo("addClip.php?username=".$_GET['username'])?>>
<h1>New Audio Clip</h1>
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
	 		<h3>Clip ID: <input type="text" name="idTxt" id="idTxt" readonly></input></h3><h3 style="color:red;display:none" id="idError"> *Clip ID exists</h3><br/>
	 		
	 		<h3>Clip name: <input type="text" name="clipNameTxt" id="clipNameTxt"></input></h3><h3 style="color:red;display:none" id="clipNameError"> *Clip name cannot be empty</h3><br/>

			<h3>Duration (minutes): <input type="text" name="durationTxt" id="durationTxt"></input></h3><h3 style="color:red;display:none" id="durationError"> *Duration must be numeric</h3><br/> 

	 		<input type="submit" name="logClipBtn" value="Submit Clip"></input>
	 	</td>
	 </tr>
</table>
</form>
<script type="text/javascript" src="js/newClip.js"></script>

</body>
</html>
