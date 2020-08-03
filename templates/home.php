<?php $this->title = "Billet simple pour l'Alaska";?>

<header>
    <h1>Billet simple pour l'Alaska</h1>

    <nav>
        <ul class="nav nav-pills">
        <?php
        if ($this->session->get('pseudo')) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php?action=logout">Déconnexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php?action=profile">Profil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../public/index.php?action=administration">Administration</a>
            </li>
            
          
            <?php
        } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php?action=register">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php?action=login">Connexion</a>
            </li>
            
            
        <?php
        }
        ?>
        </ul>
    </nav>

    <div class="msg">
        
        <?= $this->session->show('add_comment'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('register'); ?>
        <?= $this->session->show('login'); ?>
        <?= $this->session->show('logout'); ?>
    </div>
    </header>
    

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