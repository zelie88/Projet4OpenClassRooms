<?php include('CRUDManager.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link href="public/css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
        <script src="https://kit.fontawesome.com/95b33c8af2.js" crossorigin="anonymous"></script>
    
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

            <h3>CRUD</h3>
            <p><a href="index.php">Retour à la liste des billets</a></p>

            <?php $results = mysqli_query($db, "SELECT * FROM articles"); ?>

<table>
	<thead>
		<tr>
			<th>Titre</th>
			<th>Article</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['content']; ?></td>
			<td>
				<a href="CRUD.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="CrudManager.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

        <form method="post" action="CRUDManager.php">
            <div class="input-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" value=""/>
            </div>
            <div class="input-group">
                <label for="content">Article</label>
                <textarea id="content" name="content" value=""></textarea>
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save">Enregistrer</button>
            </div>
        </form>


</body>
</html>
        