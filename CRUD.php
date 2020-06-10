<?php include('CRUDManager.php'); ?>
     
<?php ob_start(); ?>

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

<table>
	<thead>
		<tr>
			<th>Titre</th>
			<th>Article</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php
	$results = mysqli_query($db, "SELECT * FROM articles");
	while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['content']; ?></td>
			<td>
				<a href="CRUD.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="CRUDManager.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php
	}
	?>
</table>

<form method="post" action="CRUDManager.php">

    <div class="input-group">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>"/>
	</div>
			
    <div class="input-group">
        <label for="content">Article</label>
        <textarea id="content" name="content"><?php echo $content; ?></textarea>
	</div>
			
    <div class="input-group">
		<?php if ($update == true): ?>
		<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
			<?php else: ?>
		<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?> 