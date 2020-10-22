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
        
            <?php
            } else {
                ?>
                    <a href="../public/index.php?action=login" class="btn btn-light" role="button">Connexion</a>  
            <?php
            }
            ?>
        </nav>
    
    <div class="alert-success" role="alert">
        <?= $this->session->show('add_comment');?>
        <?= $this->session->show('login'); ?>
    </div>

    <div class="alert-danger" role="alert">
            <?= $this->session->show('flag_comment'); ?>
            <?= $this->session->show('logout'); ?>
    </div>
    

    </header>
    
    <div class="row">
        <aside class="col-lg-3">
            <?php include('author.php');?>
        </aside>
        

        <section class="col-lg-9">
        <?php
    
        foreach ($articles as $article)
        {
        ?>
            <div class="card">
                <h2 class="card-title">
                    <a href="../public/index.php?action=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
                    <em>le <?= htmlspecialchars($article->getCreationDate());?></em>

                </h2>
                <div class="card-body">
                    <?= substr($article->getContent(), 0, 450);?>
                    <?php
                    if(strlen($article->getContent()) > 450) {
                        ?>
                        <div class="fadeout"></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <br>
        <?php
        }
    ?>
    </section>
    </div>