<?php
extract ($_POST);
$name = $_POST['name'];
$newname = $name;
// $newname = preg_replace("/\W/", "", $name);
$email = $_POST['email'];
$newemail = preg_replace('/[[:^print:]]/', '', $email);
$comments = $_POST['comments'];
$comments = trim($comments);
$newcomments = preg_replace('/[[:^print:]]/', '', $comments);

if (isset($newname) && $newname != '')
{
	setcookie("Boba_Tea_Bargainer", $newname, time()+60*60*24*365);
	$fh = fopen('./ContactUs.txt', 'a');
	fwrite($fh, "$newname\n$newemail\n$newcomments\n\n");
	fclose($fh);
}
header('Location: ./ContactUsTrial.php');



?>