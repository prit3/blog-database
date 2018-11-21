<?php include ('mkblog.php'); ?>


<!DOCTYPE HTML>
<html>
<head>
<!--	<link rel="stylesheet" type="text/css" href="formstyle.css">-->
<!--	<script src='https://www.google.com/recaptcha/api.js'></script>-->


</head>
<body>
	
<!--<?php include ('header.php'); ?>-->
	
	<header>
		<a href="blogform.php"><button>create</button></a>
		<a href="viewblog.php"><button>view</button></a>
		
	</header>
	
	
	<form action="blogform.php"  method="post">
		 Auteurs Naam: 
		<br> 
			<input type="text" name="naam" placeholder="Naam" value="<?php echo $naam; ?>">
		<br>
		<br>
		 Title: 
		<br> 
			<input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>" >
		<br>
		<br>
		 Blogtext: 
		<br> 
			<textarea name="blogtext" cols="32" rows="4" placeholder="plaats hier je  blog bericht."><?php echo $text; ?></textarea>
		<br>
		<br>
			<input type="submit" name="submit" value="Send">
		<br>
		<br>
<!--		<div class="g-recaptcha" data-sitekey="6Ld8_3oUAAAAAL_PjvSkECDnAYpKThxOxHAT0DP-"></div>-->
	</form>
	

</body>

</html>



