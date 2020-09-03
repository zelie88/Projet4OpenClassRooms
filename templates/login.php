<?php $this->title = "Connexion"; ?>

<header>
    <h1>Billet simple pour l'Alaska</h1>
    <a href="../public/index.php" class="btn btn-secondary">Retour à l'accueil</a>
</header>

<?= $this->session->show('error_login'); ?>

    <form method="post" action="../public/index.php?action=login" class="card">
        <div class="form-group">
            <label for="author">Pseudo</label><br>
            <input type="text" id="author" class="prettyInput" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" class="prettyInput" name="password"><br>
            <input type="submit" value="Connexion" id="submit" name="submit" class="btn btn-secondary">
        </div>
    </form>

