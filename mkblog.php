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

empty($_POST["naam"]) ? $naam = "" : $naam = $_POST["naam"];

empty($_POST["title"]) ? $title = "" : $title = $_POST["title"];
empty($_POST["blogtext"]) ? $text = "" : $text = $_POST["blogtext"];

$mkblog = "INSERT INTO `BlogPosts` (`id`, `Naam`, `Title`, `Blogtext`, `tijd`) VALUES (NULL, '$naam', '$title', '$text', CURRENT_TIMESTAMP)";



if(isset($_POST['submit'])){
	if(!empty($_POST['naam']) && $_POST['title'] && $_POST['blogtext'])
	{
	mysqli_query($conn, $mkblog);
	header("location:viewblog.php");
	}
	else{
		echo "Niet alle velden zijn ingevoerd";
		echo "<br>";
		echo "<br>";
		}
}
$conn->close();
?>