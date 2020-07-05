<?php

use \Projet4OpenClassRooms\config\Autoloader;
Autoloader::register();

use Projet4OpenClassRooms\src\DAO\ArticleDAO;
use Projet4OpenClassRooms\src\DAO\CommentDAO;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Billet simple pour l'Alaska</title>
    <link href="../public/css/style.css" rel="stylesheet"/>
</head>

<body>
<div>
    <h1>Billet simple pour l'Alaska</h1>

    <div class="news">
        <h3>

    <?php
    $article = $articles->fetch()
    ?>
            <?= htmlspecialchars($article->title);?>
            <em>le <?= htmlspecialchars($article->creationDate);?></em>
        </h3>
            <p><?= htmlspecialchars($article->content);?></p>
        </div>
    <br>

    <?php
    $articles->closeCursor();
    ?>

    <a href="../public/index.php">Retour à l'accueil</a>
    <div id="comments">
        <h2>Commentaires</h2>
        <?php
        $comment = new CommentDAO();
        $comments = $comment->getComments($_GET['articleId']);
        while($comment = $comments->fetch())
        {
            ?>
            <h4><?= htmlspecialchars($comment->author);?></h4>
            <p><?= htmlspecialchars($comment->comment);?></p>
            <p>Posté le <?= htmlspecialchars($comment->comment_date);?></p>
            <?php
        }
        $comments->closeCursor();
        ?>
    </div>
</div>
</body>
</html>