<?php $this->title = htmlspecialchars($article->getTitle());?>

<?php include('header.php');?>

    <div class="card">
        <h2 class="card-title">
            <?= htmlspecialchars($article->getTitle());?>
            <em>le <?= htmlspecialchars($article->getCreationDate());?></em>
        </h2>
        <div class="card-body">
            <?= $article->getContent();?>
        </div>

        <div class="actions">
            <?php
            if ($this->session->get('pseudo')) {
                ?>
            
            <a class="btn btn-primary" href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
            <br>
            <a class="btn btn-danger" role="button" data-toggle="modal" data-target="#staticBackdrop">Supprimer</a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Attention!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez-vous vraiment supprimer cet article?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a type="button" class="btn btn-danger" href="../public/index.php?action=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <?= htmlspecialchars($comment->getComment());?>
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