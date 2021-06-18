<h2 class="mx-auto" style="text-align: center;"><?= ($action == 'new') ? "Ajouter une catégorie" : "Modification de la catégorie" ?></h2>

<?php if(!empty($errors)): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Erreur !</strong><br>
		<?php foreach($errors as $error): ?>
			<?= $error ?><br>
		<?php endforeach; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif; ?>

<form class="mx-auto" style="width: 500px;" action="" method="POST" enctype="multipart/form-data">

	<br>
	<div class="mb-3">
		<label class="form-label" for="name">Nom de la catégorie</label>
		<input class="form-control form-control-sm" type="text" name="name" id="name" value="<?= $submittedName ?? ($selectedCategory['name'] ?? '');?>" placeholder="" /><br>
	</div>

	<div class="form-floating">
  	<textarea class="form-control" style="height: 100px" name="description" placeholder="Leave a comment here" id="description" ><?= isset($submittedDescription) ? $submittedDescription : ($selectedCategory['description'] ?? '');?></textarea>
  	<label for="description">Description</label>
	</div><br>

	<div class="mb-3">
  	<label for="formFile" class="form-label">Ajoutez une image</label>
  	<input class="form-control form-control-sm" id="formFile" type="file" name="formFile">
		<div id="fileHelp" class="form-text">Extension autorisées : jpg, jpeg, png, gif. <br> 2Mo maximum !</div>
	</div>

	<div class="mb-3">
		<?php if($action=='edit'): ?>
		<img class="img-thumbnail" src="../assets/images/categories/<?=$selectedCategory['img'];?>" alt="<?= $selectedCategory['name']; ?>">
		<?php endif; ?>
	</div>

	<button type="submit" class="btn btn-primary"><?= ($action == 'new') ? "Ajouter" : "Modifier" ?></button>

</form>
