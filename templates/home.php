<?php $this->title = "Billet simple pour l'Alaska";?>

    <header>
        <h1>Billet simple pour l'Alaska</h1>

        <nav>
            <?php
            if ($this->session->get('pseudo')) {
                ?>
                    <a class="btn btn-light" href="../public/index.php?action=administration">Administration</a>
                    <a class="btn btn-light" href="../public/index.php?action=profile">Profil</a>
                    <a class="btn btn-light" href="../public/index.php?action=logout">Déconnexion</a>
        </nav>
            <?php
            } else {
                ?>
                    <a href="../public/index.php?action=login" class="btn btn-light" role="button" id="buttonConnect">Connexion</a>  
            <?php
            }
            ?>
    </header>
    
    <div class="msg">
        <?= $this->session->show('add_comment'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('login'); ?>
        <?= $this->session->show('logout'); ?>
    </div>
    
        <?php
        foreach ($articles as $article)
        {
        ?>
            <div id="news" class="card">
                <h2 class="card-title">
                    <a href="../public/index.php?action=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
                    <em>le <?= htmlspecialchars($article->getCreationDate());?></em>

                </h2>
                <div id="article" class="card-body">
                    <p><?= substr($article->getContent(), 0, 350);?></p>
                </div>
            </div>
            <br>
        <?php
        }
        ?>
