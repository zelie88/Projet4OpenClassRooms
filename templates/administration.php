<?php $this->title = 'Administration'; ?>

<h1>Billet simple pour l'Alaska</h1>

<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>

<h2>Articles</h2>
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
                <a href="../public/index.php?action=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a href="../public/index.php?action=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>


<h2>Commentaires signalés</h2>

<a href="../public/index.php">Retour à l'accueil</a>
