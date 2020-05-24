<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
         
    </head>
        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
        <p>Derniers billets du blog :</p>
 
        
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
                    <em><a href="#">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </body>
</html>