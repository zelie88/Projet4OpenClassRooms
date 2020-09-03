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
        <div id="article" class="card-body">
            <p><?= $article->getContent();?></p>
        </div>

        <div class="actions">
            <?php
            if ($this->session->get('pseudo')) {
                ?>
            
            <a class="btn btn-primary" href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
            <br>
            <a class="btn btn-danger"href="../public/index.php?action=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            <?php
            }
            ?>
        </div>
    </div>
    <br>

    


    <div id="comments" class="card">
        <h3 class="card-title">Commentaires</h3>
        <div class="card-body">
        <?php

    if(count($comments) > 0){

            foreach ($comments as $comment)
            {
                ?>
                <div id="comment">
                <h4><?= htmlspecialchars($comment->getAuthor());?></h4>
                <p><?= htmlspecialchars($comment->getComment());?></p>
                <p>Posté le <?= htmlspecialchars($comment->getCommentDate());?></p>
                <?php
                if($comment->isFlag()) {
                    ?>
                    <p id="flag">Ce commentaire a été signalé</p>
                    <?php
                } else {
                    ?>
                    <p><a href="../public/index.php?action=flagComment&commentId=<?= $comment->getId(); ?>">Signaler ce commentaire</a></p>
                    <?php
                    }
                if ($this->session->get('pseudo')) {
                    ?>
                    <p><a href="../public/index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer ce commentaire</a></p>
                    <br>
                    <?php
                }
                ?>
                </div>
<?php
            }
    }
    else {
            ?>
            <p>Il n'y a pas encore de commentaire pour cet article</p>
            <?php
        }
        ?>
        </div>
    </div>
    <br>

    <div id="addComment" class="card">
        <h3 class="card-title">Ajouter un commentaire</h3>
        <div class="card-body">
        <?php include('form_comment.php');?>
        </div>
    </div>
    <br>