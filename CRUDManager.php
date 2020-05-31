<?php 
	session_start();
    $db = mysqli_connect('localhost', 'zelie', '', 'blog');

    // initialize variables
    $id ="";
	$title = "";
    $content = "";
    $creationDate = "CURDATE()";

	if (isset($_POST['save'])) {
		$title = $_POST['title'];
		$content = $_POST['content'];

		mysqli_query($db, "INSERT INTO articles (id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate) VALUES (?, ?, ?, CURDATE())"); 
        $_SESSION['message'] = "Article enregistré"; 
		header('location: CRUD.php');
    }
    
    