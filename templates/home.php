<?php $this->title = "Billet simple pour l'Alaska";?>

    <h1>Billet simple pour l'Alaska</h1>

    <div class="msg">
    <?= $this->session->show('add_article'); ?>
    <?= $this->session->show('edit_article'); ?>
    <?= $this->session->show('delete_article'); ?>
    </div>

    <?php
    foreach ($articles as $article)
    {
    ?>
        <div class="news">
            <h3>
                <a href="../public/index.php?action=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
                <em>le <?= htmlspecialchars($article->getCreationDate());?></em>

            </h3>
            <p><?= htmlspecialchars($article->getContent());?></p>
        </div>
        <br>
    <?php
    }
    ?>
    
    <a href="../public/index.php?action=addArticle">Nouvel article</a>