<?php
$action = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $action === 'addComment' ? 'Ajouter' : 'Modifier';
?>
<form method="post" action="../public/index.php?action=<?=$action;?>&articleId=<?=htmlspecialchars($article->getId());?>">

<label for="author">Pseudo</label>
<br>
<input type="text" id="author" name="author" value="<?= isset($post) ? htmlspecialchars($post->get('author')): ''; ?>">
<br>
<?= isset($errors['author']) ? $errors['author'] : ''; ?>
<label for="comment">Message</label>
<br>
<textarea id="comment" name="comment"><?= isset($post) ? htmlspecialchars($post->get('comment')): ''; ?></textarea>
<br>
<?= isset($errors['comment']) ? $errors['comment'] : ''; ?>
<input type="submit" value="<?=$submit; ?>" id="submit" name="submit">

</form>