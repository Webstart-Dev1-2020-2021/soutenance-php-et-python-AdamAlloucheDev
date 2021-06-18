<br><h3>Liste des articles</h3>

<table class="table table-dark table-hover caption-top">
	<caption><a class="btn btn-lg btn-outline-primary" href="index.php?page=articles&action=new">Ajouter un article</a></caption>
	<thead class="sticky-top">
		<tr>
			<th class="sticky-top">ID</th>
			<th class="sticky-top">Titre</th>
			<th class="sticky-top">Catégorie</th>
			<th class="sticky-top">Publié</th>
			<th class="sticky-top">Action</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($posts as $post): ?>	

		<tr>
			<td><?= $post['id'];?></td>
			<td><?= $post['title'];?></td>
			<td><?= $post['categories'];?></td>
			<td>
        <?php if($post['is_published'] == 1): ?>
          <?= "oui";?>
        <?php else: ?>
          <?= "non";?>
        <?php endif; ?>
      </td>
			<td>
			  
				<a class="btn btn-primary" href="index.php?page=articles&action=edit&id=<?=$post['id'];?>">Modifier</a>
				<a class="btn btn-danger" href="index.php?page=articles&action=delete&id=<?=$post['id'];?>">Supprimer</a>
			
			</td>
		</tr>

	<?php endforeach; ?>

	</tbody>
</table>