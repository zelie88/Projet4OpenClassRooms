<?php $this->title = 'Modifier le mot de passe'; ?>

<?php include('header.php');?>

<div class="card">
    <h3 class="card-title">Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</h3>

    <form class="card-body" method="post" action="../public/index.php?action=updatePassword">
        <div class="form-group">
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" class="prettyInput" name="password">
            <br>
       
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switch1" onclick="Toggle()">
                <label class="custom-control-label" for="switch1">Voir le mot de passe</label>
            </div>
        </div>
        
        <input class="btn btn-dark" type="submit" value="Mettre à jour" name="submit">
        
    </form>

</div>
<br>