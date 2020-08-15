<?php $this->title = "Connexion"; ?>
<h1>Billet simple pour l'Alaska</h1>

<?= $this->session->show('error_login'); ?>

<div>
    <form method="post" action="../public/index.php?action=login" id="connection">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>