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
	 	<td></td>
	 </tr>
</table>

<script type="text/javascript" src="js/homepage.js"></script>

</body>
</html>

