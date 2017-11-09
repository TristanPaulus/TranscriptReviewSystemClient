<?php

function addReview($id, $grammar, $language, $loss_of_meaning, $punctuation, $reviewer_id, $total, $translation, $transcriber_id, $transcriber, $audio_clip)
{
	$con = @new mysqli("localhost", "root", "", "transcriptreviewsystem");

	if(!$con)
	{
		die('Cannot establish connection to the database'.mysqli_error());
	}

	$sql = "INSERT INTO review (review_id, grammar, language, loss_of_meaning, punctuation, reviewer_id, total, translation, transcriber_id, transcriber, audio_clip) VALUES ('$id', '$grammar', '$language', '$loss_of_meaning', '$punctuation', '$reviewer_id', '$total', '$translation', '$transcriber_id', '$transcriber', '$audio_clip')";

	$result = @$con->query($sql);

}

if(isset($_POST['addReviewBtn']))
{
	$id = $_POST['idTxt'];
	$grammar = $_POST['grammarScore'];
	$language = $_POST['languageScore'];
	$loss_of_meaning = $_POST['loss_of_meaningScore'];
	$punctuation = $_POST['punctuationScore'];
	$reviewer_id = $_POST['reviewerTxt'];
	$translation = $_POST['translationScore'];
	$transcriber_id = $_GET['id'];
	$transcriber = $_POST['transcriber'];
	$audio_clip = $_POST['clip_name'];
	$total = ($grammar+$language+$loss_of_meaning+$punctuation+$translation)/5;

	addReview($id, $grammar, $language, $loss_of_meaning, $punctuation, $reviewer_id, $total, $translation, $transcriber_id, $transcriber, $audio_clip);
	echo("<script type='text/javascript'>location.href = 'homepage.php?username=".$_GET['username']."';</script>");
}

?>