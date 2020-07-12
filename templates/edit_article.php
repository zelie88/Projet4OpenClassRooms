<?php $this->title = "Modifier l'article";?>

<h1>Billet simple pour l'Alaska</h1>

<form method="post" action="../public/index.php?action=addArticle">

		<div class="input-group">
			<label for="title">Titre</label>
			<input type="text" id="title" name="title" value="<?= htmlspecialchars($article->getTitle()); ?>">
		</div>
			
		<div class="input-group">
			<label for="content">Article</label>
			<textarea id="content" name="content"><?= htmlspecialchars($article->getContent()); ?></textarea>
		</div>
				
		<input type="submit" name="submit" id="sumbit" value="Modifier l'article">
</form>

<a href="../public/index.php">Retour à l'accueil</a>