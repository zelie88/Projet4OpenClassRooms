<?php $this->title = "Nouvel article";?>

<h1>Billet simple pour l'Alaska</h1>

<form method="post" action="../public/index.php?action=addArticle">

		<div class="input-group">
			<label for="title">Titre</label>
			<input type="text" id="title" name="title">
		</div>
				
		<div class="input-group">
			<label for="content">Article</label>
			<textarea id="content" name="content"></textarea>
		</div>
				
		<input type="submit" name="submit" id="sumbit" value="Envoyer">
</form>

<a href="../public/index.php">Retour à l'accueil</a>