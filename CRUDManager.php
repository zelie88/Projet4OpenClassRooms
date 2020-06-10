<?php 
	session_start();
    $db = mysqli_connect('localhost', 'zelie', '', 'blog');
    $db2 = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'zelie', '');
            

    // initialize variables
    $id = 0;
	$title = "";
    $content = "";
    $creationDate = "";
    $update = false;

	if (isset($_POST['save'])) {

        $id = $_POST['id'];
		$title = $_POST['title'];
        $content = $_POST['content'];
        
		//mysqli_query($db, "INSERT INTO articles (id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDate) VALUES (?, ?, ?, CURDATE())"); 
        $req = $db2->prepare("INSERT INTO articles (id, title, content, creationDate) VALUES (?, ?, ?, CURDATE())");
        $req->execute(array($id, $title, $content));
        $_SESSION['message'] = "Article enregistré"; 
        header('location: CRUD.php');
        
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
    
        
        //mysqli_query($db, "UPDATE articles SET title='$title', content='$content' WHERE id=$id");
        $req = $db2->prepare("UPDATE articles SET title=?, content=? WHERE id=?");
        $req->execute(array($title, $content, $id));
        $_SESSION['message'] = "Article modifié!"; 
        header('location: CRUD.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM articles WHERE id=$id");
        $_SESSION['message'] = "Article supprimé!"; 
        header('location: CRUD.php');
    }

    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM articles WHERE id=$id");

		
		if ($record->num_rows === 1 ) {
			$n = mysqli_fetch_array($record);
			
			$title = $n['title'];
			$content = $n['content'];
		}
	}

    /* if (isset($POST['save'])) {
        $title = $_POST['title'];
		$content = $_POST['content'];
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            addArticle($_GET['id'], $_POST['title'], $_POST['content']);
            $_SESSION['message'] = "Article enregistré";
        }
        else {
            throw new Exception('Tous les champs doivent être remplis !');
        }   
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        updateArticle($_GET['id'], $_POST['title'], $_POST['content']);
        $_SESSION['message'] = "Article modifié!";
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        deleteArticle($_GET['id']);
        $_SESSION['message'] = "Article modifié!";
    }
 */
    