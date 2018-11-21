

<!DOCTYPE HTML>
<html>
<head><link rel="stylesheet" type="text/css" href="formstyle.css">
<!--	<script src='https://www.google.com/recaptcha/api.js'></script>-->


</head>
<body>
	
<!--<?php include ('header.php'); ?>-->
	<?php 
	
	$getblog = "UPDATE `BlogPosts` SET `Naam` = 'ee', `Title` = 'oooo', `Blogtext` = 'eee', `tijd` = CURRENT_DATE() WHERE `BlogPosts`.`id` = $id";
	$edit = $conn->query($getblog);
 
if($edit->num_rows > 0){
    while($row = $edit->fetch_assoc()){
	
	echo "<form action='editblog.php'  method='post'>";
	echo "Auteurs Naam:";
	echo "<br>" ;
	echo "<input type='text' name='naam' value=''>";
	echo "<br>";
	echo "<br>";
	echo "Title:" ;
	echo "<br>"; 
	echo "<input type='text' name='title' value=''>";
	echo "<br>";
	echo "<br>";
	echo "Blogtext:" ;
	echo "<br>" ;
	echo "<textarea name='blogtext' cols='32' rows='4' value=''></textarea>";
	echo "<br>";
	echo "<br>";
	
	echo "<input type='submit' name='submit' value='Send'>";
	echo "<br>";
	echo "<br>";
//<!--		<div class="g-recaptcha" data-sitekey="6Ld8_3oUAAAAAL_PjvSkECDnAYpKThxOxHAT0DP-"></div>-->
	echo "</form>";
	}
?>
</body>

</html>


<?php
error_reporting(0);

$server = "localhost";
$user	= "root";
$pass	= "";
$dbnaam = "blog";

$conn = new mysqli($server, $user, $pass, $dbnaam);
	
if ($conn->connect_error){
	die("Geen verbinding: " . $conn->connect_error);
}

$naam = $_POST["naam"];
$title = $_POST["title"];
$text = $_POST["blogtext"];

$mkblog = "INSERT INTO `BlogPosts` (`id`, `Naam`, `Title`, `Blogtext`, `tijd`) VALUES (NULL, '$naam', '$title', '$text', CURRENT_TIMESTAMP)";



if(isset($_POST['submit'])){
	if(!empty($_POST['naam']) && $_POST['title'] && $_POST['blogtext'])
	{
	mysqli_query($conn, $mkblog);
	header("location:viewblog.php");
	}
	else{
		echo "er ging wat fout";
		die;
		}
}
$conn->close();
?>

