<br><h3>Liste des utilisateurs</h3>

<table class="table table-dark table-hover caption-top ">
  <caption><a class="btn btn-lg btn-outline-primary" href="index.php?page=users&action=new">Ajouter un utilisateur</a></caption>
	<thead class="sticky-top">
		<tr>
			<th>ID</th>
      <th>Pseudo</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Email</th>
			<th>Admin</th>
			<th >Actions</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($users as $user):?>	

		<tr>
			<th><?= $user['id'];?></th>
      <td><?= $user['username'];?></td>
			<td><?= $user['firstname'];?></td>
			<td><?= $user['lastname'];?></td>
			<td><?= $user['email'];?></td>
			<td>
        <?php if($user['is_admin'] == 1): ?>
          <?= "oui";?>
        <?php else: ?>
          <?= "non";?>
        <?php endif; ?>
      </td>
			<td>
			
				<a class="btn btn-primary" href="index.php?page=users&action=edit&id=<?=$user['id'];?>">Modifier</a>
				<a class="btn btn-danger" href="index.php?page=users&action=delete&id=<?=$user['id'];?>">Supprimer</a>
			
			</td>
		</tr>

	<?php endforeach;?>

	</tbody>
</table>



