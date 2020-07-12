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
        foreach ($comments as $comment)
        {
            ?>
            <h4><?= htmlspecialchars($comment->getAuthor());?></h4>
            <p><?= htmlspecialchars($comment->getComment());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getCommentDate());?></p>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>