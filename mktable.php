<?php
include ('dbconn.php');

$mktable = "CREATE TABLE BlogPosts(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Naam VARCHAR(50) NOT NULL,
			Title VARCHAR(50) NOT NULL,
			Blogtext TEXT NOT NULL,
			tijd TIMESTAMP)";

if ($conn->query($mktable) === TRUE) {
    echo "Tabel is aangemaakt";
} else {
    echo "Error met Tabel aanmaken: " . $conn->error;
}

$conn->close();
?>