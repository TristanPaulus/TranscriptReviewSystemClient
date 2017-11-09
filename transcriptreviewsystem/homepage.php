<!DOCTYPE html>
<html>
<head>
<?php
	include("header/trs_header.html");
?>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type='text/javascript'> var username ="<?php echo $_GET['username']?>" </script>
</head>
<body>

<h1 id="Welcome">Welcome back, </h1>
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
	 		<div id="Body">
	 			<h3>Your aggregated scores</h3>
	 			<?php showReviews();?>
	 		</div>
	 	</td>
	 </tr>
</table>

<script type="text/javascript" src="js/homepage.js"></script>

</body>
</html>

<?php
	function showReviews()
	{
		$translation = 0;
		$grammar = 0;
		$language = 0;
		$loss_of_meaning = 0;
		$punctuation = 0;
		$count = 0;

		$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
		$sql = "SELECT * FROM review WHERE transcriber = '".$_GET['username']."' ";
		$result = $DBConnect->query($sql);

		while($row = $result->fetch_array())
		{
			$translation += $row['translation'];
			$grammar += $row['grammar'];
			$language += $row['language'];
			$loss_of_meaning += $row['loss_of_meaning'];
			$punctuation += $row['punctuation'];

			$count+=1;
		}

		echo("<table width='50%'>");
		echo("<th>Skill</th>");
		echo("<th>Score</th>");
		

		$translation = $translation/$count;
		$grammar = $grammar/$count;
		$language = $language/$count;
		$loss_of_meaning = $loss_of_meaning/$count;
		$punctuation = $punctuation/$count;

		$total = ($translation + $grammar + $language + $loss_of_meaning + $punctuation)/5.0;

		echo("<tr><td>Translation</td><td>".$translation."</td></tr>");
		echo("<tr><td>Grammar</td><td>".$grammar."</td></tr>");
		echo("<tr><td>Language</td><td>".$language."</td></tr>");
		echo("<tr><td>Loss of meaning</td><td>".$loss_of_meaning."</td></tr>");
		echo("<tr><td>Punctuation</td><td>".$punctuation."</td></tr>");
		echo("<tr><td><b>Average</b></td><td><b>".$total."</b></td></tr>");

		echo("</table");
	}
?>
