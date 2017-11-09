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

<h1>Transcripts</h1>
<form name="transcriptForm" method="post" action=<?php echo("addUser.php?username=".$_GET['username'])?>>
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

	 	<h3>Transcripts</h3>
	 	<?php loadTranscripts()?>

	 	</td>
	 </tr>
</table>

</body>
</html>

<?php 

function loadTranscripts()
{
	echo("<table>");

	$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
	$sql = "SELECT a.clip_name, u.firstname, u.surname, t.transcript_id FROM transcript t JOIN user u ON u.user_id=t.transcriber_id JOIN audio_clip a ON a.audio_id=t.clip";
	$result1 = $DBConnect->query($sql);
	echo("<table>");
	echo("<tr>");
	echo("<th>Clip reviewed</th>");
	echo("<th>Transcriber</th>");
	echo("<th></th>");
	echo("</tr>");
	while($row1 = $result1->fetch_array())
	{
		echo("<tr>");

		echo("<td>".$row1['clip_name']."</td>");
		echo("<td>".$row1['firstname']." ".$row1['surname']."</td>");
		echo("<td><a href='newReview.php?username=".$_GET["username"]."&id=".$row1["transcript_id"]."' >Write a review!</td>");

		echo("</tr>");
	}

	echo("</table>");
}

?>
