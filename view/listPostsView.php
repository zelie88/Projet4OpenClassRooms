<?php $title = 'Billet simple pour l\'Alaska'; ?>
        
    <?php ob_start(); ?>
        <h1>Billet simple pour l'Alaska</h1>
        <h2>Derniers billets du blog :</h2>
 
        
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creationDate'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
        <a href="CRUD.php">Nouveau post</a>
    <?php $content = ob_get_clean(); ?>
   
<?php require('template.php'); ?>