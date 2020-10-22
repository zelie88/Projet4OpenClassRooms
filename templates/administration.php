<?php $this->title = 'Administration'; ?>

<header>

    <h1>Billet simple pour l'Alaska</h1>

    <nav>
        <a class="btn btn-light" role="button" href="../public/index.php?action=addArticle">Nouvel article</a>
        <a class="btn btn-light" role="button" href="../public/index.php">Retour à l'accueil</a>
    </nav>

    
    <div class="alert-success" role="alert">
            <?= $this->session->show('add_article'); ?>
            <?= $this->session->show('delete_comment'); ?>
            <?= $this->session->show('unflag_comment'); ?>
            <?= $this->session->show('edit_article'); ?>
            <?= $this->session->show('delete_article'); ?>
    </div>
 
</header>

<div class="card">
    <h2 class="card-title">Articles</h2>

    <div class="table-responsive-sm">
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Article</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <?php
        foreach ($articles as $article)
        {
            ?>
            <tr>
                <td><a href="../public/index.php?action=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
                <td><?= substr($article->getContent(), 0, 150);?></td>
                <td>
                    <a class="btn btn-primary modify" role="button" href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                    <a class="btn btn-danger modify" role="button" data-toggle="modal" data-target="#staticBackdrop" >Supprimer</a>
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
                </td>
            </tr>
            
            <?php
        }
        ?>
    </table>
    </div>
</div>
<br>
<div class="card">
    <h2 class="card-title">Commentaires signalés</h2>

    <div class="table-responsive-sm">
    <table class="table">
        <tr>
            <td>Pseudo</td>
            <td>Message</td>
            <td>Date</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($comments as $comment)
        {
            ?>
            <tr>
                <td><?= htmlspecialchars($comment->getAuthor());?></td>
                <td><?= substr(htmlspecialchars($comment->getComment()), 0, 150);?></td>
                <td><?= htmlspecialchars($comment->getCommentDate());?></td>
                <td>
                    <a class="btn btn-success modify" role="button" href="../public/index.php?action=unflagComment&commentId=<?= $comment->getId(); ?>">Approuver</a>
                    <a class="btn btn-danger modify" role="button" href="../public/index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</div>
<br>
