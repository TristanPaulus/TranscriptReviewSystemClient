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

<h1>New User</h1>
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
	 		<h3>Username: <input type="text" name="usernameTxt" id="usernameTxt"></input></h3><h3 style="color:red;display:none" id="usernameError"> *Username already exists</h3><br/>
	 		
	 		<h3>Password: <input type="password" name="passwordTxt" id="passwordTxt"></input></h3><h3 style="color:red;display:none" id="passwordError"> *Password cannot be empty</h3><br/>

			<h3>Confirm password: <input type="password" name="confPasswordTxt" id="confPasswordTxt"></input></h3><h3 style="color:red;display:none" id="confPasswordError"> *Passwords do not match</h3><br/>

	 		<h3>First name: <input type="text" name="firstnameTxt" id="firstnameTxt"></input></h3><h3 style="color:red;display:none" id="firstnameError"> *Cannot be empty</h3><br/>

	 		<h3>Last name: <input type="text" name="surnameTxt" id="surnameTxt"></input></h3><h3 style="color:red;display:none" id="lastnameError"> *Cannot be empty</h3><br/>

	 		<h3>Email address: <input type="text" name="emailTxt" id="emailTxt"></input></h3><h3 style="color:red;display:none" id="emailError"> *Invalid email address</h3><br/>

	 		<input type="submit" name="addUserBtn" value="Add User"></input>
	 	</td>
	 </tr>
</table>

</body>
</html>
