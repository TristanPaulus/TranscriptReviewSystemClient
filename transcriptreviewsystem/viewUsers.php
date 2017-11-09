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
<h1>User scores</h1>
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
	 		<?php loadUsers();?>
	 	</td>
	 </tr>
</table>
</form>

</body>
</html>

<?php

function loadUsers()
{
	$translation = 0;
	$grammar = 0;
	$language = 0;
	$loss_of_meaning = 0;
	$punctuation = 0;
	$count = 0;
	$total = 0;

	$DBConnect = @new mysqli("localhost","root","","transcriptreviewsystem");
		$sql = "SELECT user_id FROM user";
		$result1 = $DBConnect->query($sql);

		echo("<h3>All users scores</h3>");

		echo("<table>");
		echo("<th>Name</th>");
		echo("<th>Translation</th>");
		echo("<th>Grammar</th>");
		echo("<th>Language</th>");
		echo("<th>Loss of meaning</th>");
		echo("<th>Punctuation</th>");
		echo("<th>Average</th>");
		while($row1 = $result1->fetch_array())
		{
			$username = $row1['user_id'];
			$sql = "SELECT u.firstname, u.surname, r.translation, r.grammar, r.language, r.loss_of_meaning, r.punctuation FROM review r LEFT JOIN user u ON r.transcriber = u.user_id where transcriber = '$username'";
			$result2 = $DBConnect->query($sql);

			while($row2 = $result2->fetch_array())
			{
				$user = $row2['firstname'].' '.$row2['surname'];;
				$translation += $row2['translation'];
				$grammar += $row2['grammar'];
				$language += $row2['language'];
				$loss_of_meaning += $row2['loss_of_meaning'];
				$punctuation += $row2['punctuation'];
				$count +=1;
			}
			$translation = $translation/$count;
			$grammar = $grammar/$count;
			$language = $language/$count;
			$loss_of_meaning = $loss_of_meaning/$count;
			$punctuation = $punctuation/$count;
			$total = ($translation + $grammar + $language + $loss_of_meaning + $punctuation)/5;

			echo("<tr>");
			echo("<td>".$user."</td>");
			echo("<td>".$translation."</td>");
			echo("<td>".$grammar."</td>");
			echo("<td>".$language."</td>");
			echo("<td>".$loss_of_meaning."</td>");
			echo("<td>".$punctuation."</td>");
			echo("<td>".$total."</td>");
			echo("</tr>");

			$translation = 0;
			$grammar = 0;
			$language = 0;
			$loss_of_meaning = 0;
			$punctuation = 0;
			$count = 0;
			$total = 0;
		}

		echo("</table>");
}

?>
