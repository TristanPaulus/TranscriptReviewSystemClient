<!DOCTYPE html>
<html>
<head>
<?php
	include("header/trs_header.html");
?>

	<title>Transcript Review System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<table width="100%">
<tr>
	<td width="15%"></td>
	<td width="85%">
		<header>
			<h1>Please enter login credentials below</h1>
		</header>
	</td>
<tr>

<tr>
<td></td>
<td>
	<div id="usernameDiv">
		<h3>Username:<input type="text" id="usernameTxt"></h3>
	</div>
	<div id="passwordDiv">
		<h3>Password:<input type="password" id="passwordTxt"></h3>
	</div>
	<button id="loginBtn">Login</button>
	<br/>
	<h3 style="color:red;display:none" id="error">Invalid credentials</h3>
</td>
</tr>

</table>

	<script type="text/javascript" src="js/login.js"></script>

</body>
</html>