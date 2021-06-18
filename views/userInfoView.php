<div class="articles "></div>



<div class="connexion d-flex justify-content-center">
	
	
	<div>

		<h2 class="pb-5" ><?= ($action == 'new') ? "Ajouter un utilisateur :" : "Modification des données utilisateur :" ?></h2>
		<div id="emailHelp" class="form-text pb-4">Les champs suivis d'une étoile sont obligatoires..</div>

		<?php if(!empty($errors)): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Erreur !</strong><br>
				<?php foreach($errors as $error): ?>
					<?= $error ?><br>
				<?php endforeach; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>
		
		<form class=""  action="" method="POST">
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="text" name="username" id="username" value="<?= isset($submittedUsername) ? $submittedUsername : ($selectedUser['username'] ?? '');?>" placeholder="" />
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="text" name="firstname" id="firstname" value="<?= isset($submittedFirstname) ? $submittedFirstname : ($selectedUser['firstname'] ?? '');?>" />
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="text" name="lastname" id="lastname" value="<?= isset($submittedLastname) ? $submittedLastname : ($selectedUser['lastname'] ?? '');?>" />
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="email" name="email" id="email" value="<?= isset($submittedEmail) ? $submittedEmail : ($selectedUser['email'] ?? '');?>" placeholder="votre@email.com *" />
			</div>
		
			<div class="form-floating">
				<textarea class="connexion-textarea border p-3 pt-5 bg-transparent text-light" name="bio" placeholder="" id="bio" ><?= isset($submittedBio) ? $submittedBio : ($selectedUser['bio'] ?? '');?></textarea>
				<label for="bio">Biographie</label>
			</div><br>
		
			<div class="mb-3">
				<input class="connexion-mdp  border p-3 bg-transparent text-light" type="password" name="password" id="password" placeholder="MOT DE PASSE *" value="<?= !empty($submittedPassword) ? $submittedPassword : '';?>" />
				<div id="emailHelp" class="form-text">Si ce champ est vide, le mot de passe actuel ne sera pas modifié.</div>
			</div>
		
			<div class="mb-3">
				<input class="connexion-mdp  border p-3 bg-transparent text-light" type="password" name="pswdConfirmation" id="pswdConfirmation" placeholder="CONFIRMATION DU MOT DE PASSE *" value="<?= !empty($submittedPswdConfirmation) ? $submittedPswdConfirmation : '';?>" />
			</div>
		
			<button type="submit" class="connexion-btn border p-3 bg-transparent text-light">Modifier</button>
		
		</form>
	</div>
</div>