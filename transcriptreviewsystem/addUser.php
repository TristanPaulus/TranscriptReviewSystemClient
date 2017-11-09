<?php

function addUser($id, $email, $firstname, $surname, $passwordkey)
{
	$con = @new mysqli("localhost", "root", "", "transcriptreviewsystem");

	if(!$con)
	{
		die('Cannot establish connection to the database'.mysqli_error());
	}

	$sql = "INSERT INTO user (user_id, email, firstname, surname, passwordkey) VALUES ('$id','$email','$firstname', '$surname', '$passwordkey')";

	$result = @$con->query($sql);

}

if(isset($_POST['addUserBtn']))
{
	addUser($_POST['usernameTxt'], $_POST['emailTxt'], $_POST['firstnameTxt'], $_POST['surnameTxt'], $_POST['passwordTxt']);
	echo("<script type='text/javascript'>location.href = 'homepage.php?username=".$_GET['username']."';</script>");
}

?>