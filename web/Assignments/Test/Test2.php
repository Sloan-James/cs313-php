<?php
session_start();
// First let's process all the input
// using constants for the names of the elements in the form would be better...
// It would also be better to use an ID of some sort for the
// value that is submitted such as "cs" as opposed to "Computer Science",
// then in PHP we could process that value and determine the exact
// presentation text to render.
$_SESSION["name"] = htmlspecialchars($_POST["name"]);
$_SESSION["email"] = htmlspecialchars($_POST["email"]);
$_SESSION["major"] = htmlspecialchars($_POST["major"]);
$_SESSION["places"] = $_POST["places"];
$_SESSION["comments"] = htmlspecialchars($_POST["comments"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Submission Results</title>
</head>

<body>
	<h1>Submission Results</h1>

	<p>Your name is: <?=$_SESSION["name"] ?></p>
	<p>Your email is: <a href="mailto:<?=$_SESSION["email"] ?>"><?=$_SESSION["email"] ?></a></p>
	<p>Your major is: <?=$_SESSION["major"] ?></p>
	<p>You have been to the following places:</p>
	<ul>

<?
foreach ($_SESSION["places"] as $place)
{
	$place_clean = htmlspecialchars($place);
	echo "<li><p>$place_clean</p></li>";
}
?>		

	</ul>

	<p>Comments: <?=$_SESSION["comments"]?></p>

</body>


</html>