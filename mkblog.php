<?php
include ('dbconn.php');
error_reporting(0);

empty ($_POST["naam"]) ? $naam = "" : $naam = $_POST["naam"];

empty ($_POST["title"]) ? $title = "" : $title = $_POST["title"];
empty ($_POST["blogtext"]) ? $text = "" : $text = $_POST["blogtext"];

$taged = $_POST['taged'];
$mkblog = "INSERT INTO `BlogPosts` (id, Naam, Title, Blogtext, tijd, Tag_id) VALUES (NULL, '$naam', '$title', '$text', CURRENT_TIMESTAMP, '$taged')";



if (isset($_POST['submit'])){
	if (!empty($_POST['naam']) && $_POST['title'] && $_POST['blogtext'] && $_POST['taged']){
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