<html>
    <head>
    </head>
    <body>
        <header>
            <a href="blogform.php"><button>create</button></a>
            <a href="viewblog.php"><button>view</button></a>
        </header>
    </body>
</html>

<?php

    include ('dbconn.php');

    error_reporting(0);


    $sort = $_GET["sorteer"];

    switch ($sort){
        case "postDESC":
            $post = "SELECT * FROM BlogPosts ORDER BY id DESC";
             echo "Blog is gesorteert op niewuste post";
            break;
        case "postASC":
            $post = "SELECT * FROM BlogPosts ORDER BY id ASC";
             echo "Blog is gesorteert op oudste post";
            break;

        case "tijdDESC":
            $post = "SELECT * FROM BlogPosts ORDER BY tijd DESC";
             echo "Blog is gesorteert op niewuste tijd";
            break;

        case "tijdASC":
            $post = "SELECT * FROM BlogPosts ORDER BY tijd ASC";
             echo "Blog is gesorteert op oudste tijd";
            break;

        case "titleDESC":
            $post = "SELECT * FROM BlogPosts ORDER BY Title DESC";
             echo "Blog is gesorteert op title van Z naar A";
            break;

        case "titleASC":
            $post = "SELECT * FROM BlogPosts ORDER BY Title ASC";
            echo "Blog is gesorteert op title van A naar Z";
            break;

        case "naamDESC":
            $post = "SELECT * FROM BlogPosts ORDER BY Naam DESC";
            echo "Blog is gesorteert op Naam van Z naar A";
            break;

        case "naamASC":
            $post = "SELECT * FROM BlogPosts ORDER BY Naam ASC";
            echo "Blog is gesorteert op Naam van A naar Z";
            break;

        default:
            $post = "SELECT * FROM BlogPosts ORDER BY id DESC";
            echo "Blog is gesorteert op niewuste post";
    }


    $result = $conn->query($post);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){

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
    }

    else {
        echo "Er zijn geen comments";
    }



    $conn->close();
?>


<form action="viewblog.php" method="get">
    <select name="sorteer">
        <option>Sorteer op</option>

        <option value="postDESC">Posts van Nieuw naar oud</option>
        <option value="postASC">Posts van oud naar nieuw</option>

        <option value="tijdASC">Tijd van Nieuw naar oud</option>
        <option value="tijdDESC">Tijd van oud naar nieuw</option>

        <option value="titleDESC">Title van A naar Z</option>
        <option value="titleTASC">Title van Z naar A</option>

        <option value="naamDESC">Naam van A naar Z</option>
        <option value="naamASC">Nijd van Z naar A</option>
    </select>
    <input type="submit" name="update" value="Update">
</form>