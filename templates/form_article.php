<?php
$action = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $action === 'addArticle' ? 'Publier' : 'Mettre à jour';
?>


<form class="card" method="post" action="../public/index.php?action=<?=$action;?>">

		<div class="form-group">
			<label for="title">Titre</label>
			<br>
			<input type="text" id="title" class="prettyInput" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>">
			<br>
			<div class="alert-danger">
				<?= isset($errors['title']) ? $errors['title'] : ''; ?>
			</div>
		</div>
			
		<div class="form-group">
			<label for="content">Article</label>
			<textarea id="mycontent" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
			<br>
			<div class="alert-danger">
				<?= isset($errors['content']) ? $errors['content'] : ''; ?>
			</div>
		</div>
				
		<input type="submit" class="btn btn-success" name="submit" value="<?= $submit; ?>">
</form>
