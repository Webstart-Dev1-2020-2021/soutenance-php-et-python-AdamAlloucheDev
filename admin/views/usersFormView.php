<h2 class="mx-auto" style="text-align: center;"><?= ($action == 'new') ? "Ajouter un utilisateur" : "Modification des données utilisateur" ?></h2>

<?php if(!empty($errors)): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Erreur !</strong><br>
		<?php foreach($errors as $error): ?>
			<?= $error ?><br>
		<?php endforeach; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif; ?>

<form class="mx-auto" style="width: 500px;" action="" method="POST">
	<br>
	<div class="mb-3">
		<label for="username" class="form-label">Pseudo *</label>
		<input class="form-control form-control-sm" type="text" name="username" id="username" value="<?= isset($submittedUsername) ? $submittedUsername : ($selectedUser['username'] ?? '');?>" placeholder="" />
	</div>

	<div class="mb-3">
		<label class="form-label" for="firstname">Prénom *</label>
		<input class="form-control form-control-sm" type="text" name="firstname" id="firstname" value="<?= isset($submittedFirstname) ? $submittedFirstname : ($selectedUser['firstname'] ?? '');?>" />
	</div>

	<div class="mb-3">
		<label class="form-label" for="lastname">Nom *</label>
		<input class="form-control form-control-sm" type="text" name="lastname" id="lastname" value="<?= isset($submittedLastname) ? $submittedLastname : ($selectedUser['lastname'] ?? '');?>" />
	</div>

	<div class="mb-3">
		<label class="form-label" for="email">Email *</label>
		<input class="form-control form-control-sm" type="email" name="email" id="email" value="<?= isset($submittedEmail) ? $submittedEmail : ($selectedUser['email'] ?? '');?>" placeholder="ton@email.com" />
	</div>

	<div class="mb-3">
		<label class="form-label" for="password">Mot de passe *</label>
		<input class="form-control form-control-sm" type="password" name="password" id="password" value="<?= !empty($submittedPassword) ? $submittedPassword : '';?>" />
		<div id="emailHelp" class="form-text">Si ce champ est vide, le mot de passe actuel ne sera pas modifié.</div>
	</div>

	<div class="mb-3">
		<label class="form-label" for="pswdConfirmation">Confirmation du mot de passe *</label>
		<input class="form-control form-control-sm" type="password" name="pswdConfirmation" id="pswdConfirmation" value="<?= !empty($submittedPswdConfirmation) ? $submittedPswdConfirmation : '';?>" />
	</div>

	<div class="mb-3">
		<label class="form-label" for="is_admin">Admin *</label>
		<select  name="is_admin" id="is_admin" class="form-select form-select-sm" aria-label="Valeur par défaut">
		
		<?php if($selectedUser['is_admin'] == 1): ?>
			<option selected value="1">OUI</option>
			<option value="2">NON</option>
		<?php else: ?>
			<option value="1">OUI</option>
			<option selected value="2">NON</option>
		<?php endif; ?>
		</select>
	</div>

	<button type="submit" class="btn btn-primary"><?= ($action == 'new') ? "Ajouter" : "Modifier" ?></button>

</form>