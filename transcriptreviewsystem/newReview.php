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

<h1>New Review - Please ensure correct clip is listened to when reviewing</h1>
<form name="reviewForm" method="post" action=<?php echo("addReview.php?username=".$_GET['username']."&id=".$_GET['id'])?>>
<table>
	 <tr>
	 	<td width="15%"></td>
	 	<td width="60%"></td>
	 	<td width="25%"></td>
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

	 	<?php getTranscript();?>

	 	</td>

	 	<td>
	 	<h3>Review ID: <input type="text" name="idTxt" id="idTxt" value=<?php getId();?> readonly></input></h3><h3 style="color:red;display:none" id="idError"> *ID already exists</h3><br/>
	 		
 		<h3>Reviewer: <input type="text" name="reviewerTxt" id="reviewerTxt" value=<?php echo $_GET['username']?> readonly></input></h3><h3 style="color:red;display:none" id="passwordError"> *Reviewer cannot be empty</h3><br/>

 		<h3>Scores</h3>

 		<table>
 		<tr>
		<td>Translation: </td>
		<td><input type="number" name="translationScore" min="1" max="5"></td>
		</tr>
		<tr>
		<td>Grammar: </td>
		<td><input type="number" name="grammarScore" min="1" max="5"></td>
		</tr>
		<tr>
		<td>Language: </td>
		<td><input type="number" name="languageScore" min="1" max="5"></td>
		</tr>
		<tr>
		<td>Loss of meaning: </td>
		<td><input type="number" name="loss_of_meaningScore" min="1" max="5"></td>
		</tr>
		<tr>
		<td>Punctuation: </td>
		<td><input type="number" name="punctuationScore" min="1" max="5"></td>
		</tr>
		</table>

 		<input type="submit" name="addReviewBtn" value="Create review"></input>

	 	</td>
	 </tr>
</table>
</form>

</body>
</html>

<?php

function getTranscript()
{
	echo ("<hidden name='transcript_id' value=".$_GET['id']."></hidden>");

	$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
	$sql = "SELECT t.transcriber_id, a.clip_name, t.text FROM transcript t LEFT JOIN audio_clip a ON a.audio_id = t.clip WHERE t.transcript_id=".$_GET['id'];
	$result1 = $DBConnect->query($sql);
	//while($row1 = $result1->fetch_array())
	//{
		
	$row1 = $result1->fetch_array();

		echo ("<input type='text' style='display:none' name='transcriber' value=".$row1['transcriber_id']."></input>");
		echo ("<input type='text' style='display:none' name='clip_name' value=".$row1['clip_name']."></input>");
		

		//echo("<script>alert('".$_POST['transcriber']."')</script>");
		//$_POST['transcriber'] = $row1['transcriber_id'];
		//$_POST['clip_name'] = $row1['clip_name'];

		echo ("<h3>Transcript:</h3>");

		echo ("<b>Audio clip:</b><br/> ".$row1['clip_name']);
		echo("<br/><br/><br/><br/>");
		echo("<b>Transcript body:</b><br/>".$row1['text']);
	//}
}

function getId()
{
	$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
	$sql = "SELECT review_id FROM review";
	$result1 = $DBConnect->query($sql);
	while($row1 = $result1->fetch_array())
	{
		$id = $row1['review_id'];
	}
	$id += 1;
	echo($id);
}

?>