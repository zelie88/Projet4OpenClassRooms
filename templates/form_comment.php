<?php
$action = isset($post) && $post->get('id') ?  : 'addComment';
?>
<form method="post" action="../public/index.php?action=<?=$action;?>&articleId=<?=htmlspecialchars($article->getId());?>">

    <div class="form-group">
        <label for="author">Pseudo</label>
        <br>
        <input type="text" id="author" class="prettyInput" name="author" value="<?= isset($post) ? htmlspecialchars($post->get('author')): ''; ?>">
        <div class="alert-danger">
            <?= isset($errors['author']) ? $errors['author'] : ''; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="comment">Message</label>
        <br>
        <textarea id="comment" class="prettyInput" name="comment"><?= isset($post) ? htmlspecialchars($post->get('comment')): ''; ?></textarea>
        <div class="alert-danger">
            <?= isset($errors['comment']) ? $errors['comment'] : ''; ?>
        </div>
    </div>
    <input type="submit" value="Ajouter" name="submit" class="btn btn-secondary">

</form>