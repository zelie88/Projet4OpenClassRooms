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
            <?= htmlspecialchars($article->getTitle());?>
            <em>le <?= htmlspecialchars($article->getCreationDate());?></em>
        </h3>
            <p><?= htmlspecialchars($article->getContent());?></p>
    </div>
    <br>

    <a href="../public/index.php">Retour à l'accueil</a>

    <div id="comments">
        <h2>Commentaires</h2>
        <?php
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