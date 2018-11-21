<?php 
$server = "localhost";
$user	= "root";
$pass	= "";
$dbnaam = "blog";

$conn = new mysqli($server, $user, $pass, $dbnaam);
	
if ($conn->connect_error){
	die("Geen verbinding: " . $conn->connect_error);
}




	$id = $_GET['id'];
	$naam = '$_POST["naam"]';
	$title = '$_POST["title"]';
	$text = '$_POST["blogtext"]';

$getblog = "UPDATE BlogPosts SET Naam = '$naam'' , Title = '$title', Blogtext = '$text', `tijd` = CURRENT_TIME() WHERE id = $id";
$edit = $conn->query($getblog);

if(isset($_POST['update'])){
	if(!empty($_POST['naam']) && $_POST['title'] && $_POST['blogtext'])
	{
	mysqli_query($dbnaam, $getblog);
//	header("location:viewblog.php");
	}
	else{
		echo "er ging wat fout";
		}
}


$conn->close();

?>

<!DOCTYPE HTML>
<html>
<head><link rel="stylesheet" type="text/css" href="formstyle.css">
<!--	<script src='https://www.google.com/recaptcha/api.js'></script>-->


</head>
<body>
	
<!--<?php include ('header.php'); ?>-->
	<?php 

	$server = "localhost";
$user	= "root";
$pass	= "";
$dbnaam = "blog";

$conn = new mysqli($server, $user, $pass, $dbnaam);
	
if ($conn->connect_error){
	die("Geen verbinding: " . $conn->connect_error);
}

//	
//	$getblog = "UPDATE `BlogPosts` SET `Naam` = '$naam', `Title` = '$title', `Blogtext` = '$text', `tijd` = CURRENT_DATE() WHERE `BlogPosts`.`id` = $id";
//	$edit = $conn->query($getblog);
	

	
	
 
	
	$post = "SELECT * FROM BlogPosts WHERE id=$id LIMIT 1";
	$result = $conn->query($post);
	
    if($result->num_rows>0){
    while($row = $result->fetch_assoc()) {
            $naam =	$row['Naam'];
			$title=	$row['Title'];
            $text = $row['Blogtext'];
            
                echo "<form action='editblog.php?id='$id' method='post'>";
				
				echo "<input type='text' name='naam' placeholder='Naam' value='$naam'>";
			
                echo "<input type='text' name='title' placeholder='Title' value='$title'>";
                echo "<textarea name='blogtext' cols='32' rows='4' placeholder='plaats hier je  blog bericht.'>$text</textarea>";
          
		        echo "<input name='update' type='submit' value='Update'>";
				echo "<input name='reset' type='reset' value='Reset'>";
				echo "</from>";
          }
        }
    ?>

</body>

</html>





