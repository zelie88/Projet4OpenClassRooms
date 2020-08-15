<?php $this->title = 'Administration'; ?>

<h1>Billet simple pour l'Alaska</h1>

<div class="msg">
    <?= $this->session->show('add_article'); ?>
    <?= $this->session->show('edit_article'); ?>
    <?= $this->session->show('delete_article'); ?>
    <?= $this->session->show('unflag_comment'); ?>
</div>

<h3>Articles</h3>
<a href="../public/index.php?action=addArticle">Nouvel article</a>

<table>
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
            <td><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
            <td>
                <a href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>" class="edit_btn">Modifier</a>
                <a href="../public/index.php?action=deleteArticle&articleId=<?= $article->getId(); ?>" class="del_btn">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>


<h2>Commentaires signalés</h2>

<table>
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
                <a href="../public/index.php?action=unflagComment&commentId=<?= $comment->getId(); ?>">Approuver</a>
                <a href="../public/index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<a href="../public/index.php">Retour à l'accueil</a>
