<h2 class="mx-auto" style="text-align: center;"><?= ($action == 'new') ? "Ajouter un article" : "Modification de l'article" ?></h2>


<?php if(!empty($errors)): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Erreur !</strong><br>
		<?php foreach($errors as $error): ?>
			<?= $error ?><br>
		<?php endforeach; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif; ?>

<!-- Tabs navs -->
<ul class="nav nav-secondary nav-tabs nav-fill mb-3" id="ex1" role="tablist">

  <li class="nav-item" role="presentation">
    <a class="nav-link <?= !isset($deleteImage) ? 'active' : '';?>" id="ex1-tab-1" data-bs-toggle="tab" href="#infos" role="tab" aria-controls="ex1-tabs-1" aria-selected="<?= !isset($deleteImage) ? 'true' : 'false';?>" >Infos</a>
  </li>

  <li class="nav-item" role="presentation">
    <a class="nav-link <?= !empty($deleteImage) ? 'active' : '';?>" id="ex1-tab-2" data-bs-toggle="tab" href="#images" role="tab" aria-controls="ex1-tabs-2" aria-selected="<?= !empty($deleteImage) ? 'true' : 'false';?>" >Images</a>
  </li>

	<?php if($action == 'edit'): ?>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="ex1-tab-3" data-bs-toggle="tab" href="#comments" role="tab" aria-controls="ex1-tabs-3" aria-selected="false" >Commentaires</a>
		</li>
	<?php endif; ?>
	
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex1-content">

	<!-- Tabs 1 -->
  <div class="tab-pane fade <?= !isset($deleteImage) ? 'show active' : '';?>" id="infos" role="tabpanel" aria-labelledby="infos"><br>
		<form method="POST" action="" name="" enctype="multipart/form-data" class="mx-auto" style="width: 500px;" >
			<div class="mb-3">
				<label class="form-label" for="title">Titre</label>
				<input class="form-control form-control-sm" type="text" name="title" id="title" value="<?= $submittedTitle ?? ($selectedPost['title'] ?? '');?>" placeholder="" />
			</div>

			<div class="form-floating">
				<textarea class="form-control" style="height: 90px" name="summary" placeholder="Leave a comment here" id="summary" ><?= isset($submittedSummary) ? $submittedSummary: ($selectedPost['summary'] ?? '');?></textarea>
				<label for="summary">Résumé</label>
			</div><br>

			<div class="form-floating">
				<textarea class="form-control tinymce" style="height: 120px" name="content" placeholder="Leave a comment here" id="content" ><?= isset($submittedContent) ? $submittedContent : ($selectedPost['content'] ?? '');?></textarea>
			</div><br>

			<div class="mb-3">
				<label class="form-label" for="category_id">Catégories</label>
				<select multiple name="category_id[]" size="5" id="category_id" class="form-select form-select-sm" aria-label="multiple Valeur par défaut">
					<?php foreach($categories as $category): ?>
						<option value="<?= $category['id'];?>"><?= $category['name'];?></option>
					<?php endforeach; ?>
				</select>
				<div id="fileHelp" class="form-text">L'article peut être lié a plusieurs catégories</div>
			</div>

			<div class="mb-3">
				<label for="formFile" class="form-label">Ajoutez une image principale</label>
				<input class="form-control form-control-sm" id="formFile" type="file" name="formFile">
				<div id="fileHelp" class="form-text">Extension autorisées : jpg, jpeg, png, gif. <br> 2Mo maximum !</div>
			</div>

			<div class="mb-3">
				<?php if($action=='edit'): ?>
				<img class="img-thumbnail" src="../assets/images/posts/<?=$selectedPost['img'];?>" alt="<?= $selectedPost['title']; ?>">
				<?php endif; ?>
			</div>

			<div class="mb-3">
				<label class="form-label" for="post_images">Ajoutez des images secondaires</label>
				<input type="file" name="post_images[]" class="form-control form-control-sm" id="post_images" multiple/>
				<div id="fileHelp" class="form-text">Extension autorisées : jpg, jpeg, png, gif. <br> 2Mo maximum !</div>	
			</div>

			<div class="mb-3">
				<label class="form-label" >Publié ?</label>
				<div class="list-group">
					<label class="list-group-item" for="is_published">
						<input checked class="form-check-input radio-primary me-1" id="is_published" name="is_published" type="radio" value="1">
						Oui
					</label>
					<label class="list-group-item" for="is_not_published">
						<input class="form-check-input me-1" id="is_not_published" name="is_published" type="radio" value="0">
						Non
					</label>
				</div>
			</div>

			<button type="submit" class="btn btn-primary"><?= ($action == 'new') ? "Ajouter" : "Modifier" ?></button>

		</form>
  </div>


	<!-- Tabs 2 -->
  <div class="tab-pane fade <?= !empty($deleteImage) ? 'show active' : '';?>" id="images" role="tabpanel" aria-labelledby="images">
    <div>


			<?php foreach($images as $image): ?>
				<form method="POST" action="" name="" class="col-4 my-3 mx-auto">
					

						<?php if( $imageId != $image['id']): ?>
							<div class="">
								<img class="img-thumbnail img-fluid w-50 m-3" src='../assets/images/posts/<?=$image['file_name'];?>' alt="">
								<input type="hidden" name="img_id" value="<?= $image['id']; ?>">
								<input type="hidden" name="img_name" value="<?= $image['file_name']; ?>">
								<input type="submit" name="delete_image" class="btn btn-danger" value="Supprimer">
							</div>
						<?php endif; ?>
	

				</form>
			<?php endforeach; ?>


		</div>
  </div>


	<!-- Tabs 3 -->
  <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments">
		
		<?php if(!empty($commentsByPostId)): ?>

			<div>
				<table class="table table-dark table-hover caption-top">
					<thead class="sticky-top">
						<tr>
							<th class="sticky-top">ID</th>
							<th class="sticky-top">Commentaire</th>
							<th class="sticky-top">Utilisateur</th>
							<th class="sticky-top">Action</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach($commentsByPostId as $comment): ?>	

						<tr>
							<td><?= $comment['id'];?></td>
							<td><?= $comment['content'];?></td>
							<td><?= $comment['username'];?></td>
							<td><a class="btn btn-danger" href="index.php?page=articles&action=edit&id=<?=$_GET['id'];?>&subaction=comdelete&commentid=<?=$comment['id'];?>">Supprimer</a></td>
						</tr>

					<?php endforeach; ?>

					</tbody>
				</table>
			</div>
		
		<?php else: ?>
			<div>Pas de commentaires pour cet article...</div>
		<?php endif; ?>

  </div>


</div>
<!-- Tabs content -->




