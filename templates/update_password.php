<?php $this->title = 'Modifier le mot de passe'; ?>
<h1>Billet simple pour l'Alaska</h1>

<div>
    <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
    <form method="post" action="../public/index.php?action=updatePassword">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="checkbox" onclick="Toggle()"><p>Voir le mot de passe</p>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>