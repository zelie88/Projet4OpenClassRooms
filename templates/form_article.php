<?php
$action = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $action === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?action=<?=$action;?>">

		<div class="input-group">
			<label for="title">Titre</label>
			<input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>">
			<br>
			<?= isset($errors['title']) ? $errors['title'] : ''; ?>
		</div>
			
		<div class="input-group">
			<label for="content">Article</label>
			<textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
			<br>
			<?= isset($errors['content']) ? $errors['content'] : ''; ?>
		</div>
				
		<input type="submit" name="submit" id="sumbit" value="<?= $submit; ?>">
</form>