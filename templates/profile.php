<?php $this->title = 'Profil'; ?>

<?php include('header.php');?>

<div class="alert-success" role="alert">
    <?= $this->session->show('update_password'); ?>
</div>

<div class="card">
    <h3 class="card-title"><?=$this->session->get('pseudo');?></h3>
    <div class="card-body">
        <p><?=$this->session->get('id');?></p>
        <a id="update" href="../public/index.php?action=updatePassword">Modifier le mot de passe</a>
    </div>
</div>
<br>
