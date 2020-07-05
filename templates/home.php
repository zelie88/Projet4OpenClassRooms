<?php

use \Projet4OpenClassRooms\config\Autoloader;
Autoloader::register();

use Projet4OpenClassRooms\src\DAO\ArticleDAO;

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

    <?php
    while($article = $articles->fetch())
    {
    ?>

        <div class="news">
            <h3>
                <a href="../public/index.php?action=article&articleId=<?= htmlspecialchars($article->id);?>"><?= htmlspecialchars($article->title);?></a>
                <em>le <?= htmlspecialchars($article->creationDate);?></em>

            </h3>
            <p><?= htmlspecialchars($article->content);?></p>
        </div>
        <br>
        <?php
    }
    $articles->closeCursor();
    ?>
    </div>
</body>
</html>