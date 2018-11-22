<?php

include ('dbconn.php');


$down= 'DESC';
$up='ASC';

$post = "SELECT * FROM BlogPosts ORDER BY id $down";
$result = $conn->query($post);
 
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
       	
		echo "<hr>";
		echo '<div class=blog>';
		echo '<p class="content">';
		echo "Tijd:"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp";
		echo $row['tijd']."<br>";
		echo "Naam:"."&nbsp"."&nbsp";
		echo $row['Naam']. "<br>";
		echo "title:". "&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp";
		echo $row['Title']. "<br>";
        echo $row['Blogtext']."</p>";
		echo '<a href="editblog.php?id='.$row['id'].'">edit</a>',"&nbsp";
		echo '<a href="rmblog.php?id='.$row['id'].'">delete</a>';
		echo "</div>";
		echo "<hr>";
		
		
		
       
       
    }
}   else {
    echo "Er zijn geen comments";
    }

$conn->close();
?>