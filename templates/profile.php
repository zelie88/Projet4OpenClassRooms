<?php $this->title = 'Profil'; ?>

<h1>Billet simple pour l'Alaska</h1>

<?= $this->session->show('update_password'); ?>

<div>
    <h2><?=$this->session->get('pseudo');?></h2>
    <p><?=$this->session->get('id');?></p>
    <a href="../public/index.php?action=updatePassword">Modifier le mot de passe</a>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>