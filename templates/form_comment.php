<?php
$action = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $action === 'addComment' ? 'Ajouter' : 'Modifier';
?>
<form method="post" action="../public/index.php?action=<?=$action;?>&articleId=<?=htmlspecialchars($article->getId());?>">

    <div class="form-group">
        <label for="author">Pseudo</label>
        <br>
        <input type="text" id="author" class="prettyInput" name="author" value="<?= isset($post) ? htmlspecialchars($post->get('author')): ''; ?>">
        <?= isset($errors['author']) ? $errors['author'] : ''; ?>
    </div>
    <div class="form-group">
        <label for="comment">Message</label>
        <br>
        <textarea id="comment" class="prettyInput" name="comment"><?= isset($post) ? htmlspecialchars($post->get('comment')): ''; ?></textarea>
        <?= isset($errors['comment']) ? $errors['comment'] : ''; ?>
    </div>
    <input type="submit" value="<?=$submit; ?>" id="submit" name="submit" class="btn btn-secondary">

</form>