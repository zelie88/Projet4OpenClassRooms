<?php
$action = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $action === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>


<form class="card" method="post" action="../public/index.php?action=<?=$action;?>">

		<div class="form-group">
			<label for="title">Titre</label>
			<br>
			<input type="text" id="title" class="prettyInput" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>">
			<br>
			<?= isset($errors['title']) ? $errors['title'] : ''; ?>
		</div>
			
		<div class="form-group">
			<label for="content">Article</label>
			<textarea id="mycontent" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
			<br>
			<?= isset($errors['content']) ? $errors['content'] : ''; ?>
		</div>
				
		<input type="submit" class="btn btn-success" name="submit" value="<?= $submit; ?>">
</form>
