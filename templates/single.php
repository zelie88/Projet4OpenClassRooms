<?php $this->title = htmlspecialchars($article->getTitle());?>

    <header>
        <h1>Billet simple pour l'Alaska</h1>
        <a href="../public/index.php" class="btn btn-secondary" role="button">Retour à l'accueil</a>

    </header>

    <div class="card" id="news">
        <h2 class="card-title">
            <?= htmlspecialchars($article->getTitle());?>
            <em>le <?= htmlspecialchars($article->getCreationDate());?></em>
        </h2>
        <div id="article">
            <p><?= $article->getContent();?></p>
        </div>
    </div>
    <br>

    <div class="actions">
        <?php
        if ($this->session->get('pseudo')) {
            ?>
        
        <a href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
        <br>
        <a href="../public/index.php?action=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
        <?php
        }
        ?>
    </div>


    <div id="comments" class="card col-9">
        <h3 class="card-title">Commentaires</h3>
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
                <?php
                    if ($this->session->get('pseudo')) {
                ?>
                <p><a href="../public/index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer ce commentaire</a></p>
                <br>
                <?php
            }
            ?>
        <?php
        }
        ?>
        <h3>Ajouter un commentaire</h3>
        <?php include('form_comment.php');?>
    </div>