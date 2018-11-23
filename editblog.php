<!--Code werkt hellaas niet als gewild hij werkt alleen op spesefiek nummer bij update maar niet met $id-->


<?php
    include ('dbconn.php');
    $id = $_GET["id"];
?>

<!DOCTYPE HTML>
<html>
    <head><link rel="stylesheet" type="text/css" href="formstyle.css">



    </head>
    <body>

        
        <?php 
            include ('dbconn.php');

                $post = "SELECT * FROM BlogPosts WHERE id='$id' LIMIT 1";
                $result = $conn->query($post);

            //	var_dump($result);

                if($result->num_rows>0){
                while($row = $result->fetch_assoc()) {

                        $naam =	$row['Naam'];
                        $title=	$row['Title'];
                        $text = $row['Blogtext'];
            //        	var_dump($row);


                            echo "<form action='editblog.php?id='$id' method='post'>";
                            echo "<input type='text' name='naam' placeholder='Naam' value='$naam'>";
                            echo $id;

                            echo "<input type='text' name='title' placeholder='Title' value='$title'>";
                            echo "<textarea name='blogtext' cols='32' rows='4' placeholder='plaats hier je  blog bericht.'>$text</textarea>";

                            echo "<input name='update' type='submit' value='Update'>";
                            echo "<input name='reset' type='reset' value='Reset'>";
                            echo "</form>";
                      }
                    }
        ?>

    </body>
</html>



<?php 
    include ('dbconn.php');

    
    if (array_key_exists('update', $_POST) && array_key_exists('naam', $_POST) && array_key_exists('blogtext', $_POST) && array_key_exists('id', $_GET)){

	$id   = $_GET['id'];
	$naam = $_POST['naam'];
	$title = $_POST['title'];
	$text = $_POST['blogtext'];
    echo "het werkt";
    }
   
    else{die;}

    var_dump ($naam);

    var_dump($id);

    $getblog = "UPDATE `BlogPosts` SET `Naam` = '$naam', `Title` = '$title', `Blogtext` = '$text', `tijd` = CURRENT_TIME() WHERE `BlogPosts`.`id` = 22";


    if(isset($_POST['update'])){
        if(!empty($_POST['naam']) && $_POST['title'] && $_POST['blogtext'])
        {
        mysqli_query($conn, $getblog);
        header("location:viewblog.php");
        }
        else{
            echo "er ging wat fout";
            }
    }


$conn->close();

?>

