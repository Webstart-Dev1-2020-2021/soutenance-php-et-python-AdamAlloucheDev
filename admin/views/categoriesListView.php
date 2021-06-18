<br><h3>Liste des catégories</h3>

<table class="table table-dark table-hover caption-top">
	<caption><a class="btn btn-lg btn-outline-primary" href="index.php?page=categories&action=new">Ajouter une catégorie</a></caption>
	<thead class="sticky-top">
		<tr>
			<th class="sticky-top">ID</th>
			<th class="sticky-top">Nom</th>
			<th class="sticky-top">Description</th>
			<th class="sticky-top">Actions</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($categories as $category): ?>	

		<tr>
			<td><?= $category['id'];?></td>
			<td><?= $category['name'];?></td>
			<td><?= $category['description'];?></td>
			<td>
			  
				<a class="btn btn-primary" href="index.php?page=categories&action=edit&id=<?=$category['id'];?>">Modifier</a>
				<a class="btn btn-danger" href="index.php?page=categories&action=delete&id=<?=$category['id'];?>">Supprimer</a>
			
			</td>
		</tr>

	<?php endforeach; ?>

	</tbody>
</table>