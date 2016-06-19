<?php
if (isset($_POST['answer'])) {
	include('captcha/captchaClass.php');

	echo Captcha::check($_POST['answer']) ? 'Success' : 'Fail';
}
?>
<br>
<form action="example.php" method="POST">
	<img src="captcha/show.php">
	<input type="text" name="answer" placeholder="Enter answer"><br>
	<input type="submit">
</form>