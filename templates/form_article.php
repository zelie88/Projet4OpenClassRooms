<?php
$action = isset($article) && $article->getId() ? 'editArticle&articleId='.$article->getId() : 'addArticle';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';
$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';
$submit = $action === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?action=<?=$action;?>">

		<div class="input-group">
			<label for="title">Titre</label>
			<input type="text" id="title" name="title" value="<?=$title;?>">
		</div>
			
		<div class="input-group">
			<label for="content">Article</label>
			<textarea id="content" name="content"><?=$content;?></textarea>
		</div>
				
		<input type="submit" name="submit" id="sumbit" value="Envoyer">
</form>