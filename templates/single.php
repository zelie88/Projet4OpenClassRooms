<?php $this->title = htmlspecialchars($article->getTitle());?>

<h1>Billet simple pour l'Alaska</h1>

    <div class="news">
        <h3>
            <?= htmlspecialchars($article->getTitle());?>
            <em>le <?= htmlspecialchars($article->getCreationDate());?></em>
        </h3>
            <p><?= htmlspecialchars($article->getContent());?></p>
    </div>
    <br>

    <div class="actions">
        <a href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
        <br>
        <a href="../public/index.php?action=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
    </div>

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
            if($comment->isFlag()) {
                ?>
                <p>Ce commentaire a été signalé</p>
                <?php
            } else {
                ?>
                <p><a href="../public/index.php?action=flagComment&commentId=<?= $comment->getId(); ?>">Signaler ce commentaire</a></p>
                <?php
            }
            ?>
                <p><a href="../public/index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer ce commentaire</a></p>
                <br>   
        <?php
        }
        ?>
        <h3>Ajouter un commentaire</h3>
        <?php include('form_comment.php');?>
    </div>