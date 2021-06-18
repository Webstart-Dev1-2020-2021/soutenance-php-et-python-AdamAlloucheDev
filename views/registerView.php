<div class="articles "></div>

<div class="connexion d-flex justify-content-center">

	<div>

		<h2 class="pb-5">Inscription :</h2>
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
		
		<form class="" action="" method="POST">

			
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="text" name="username" id="username" value="" placeholder="PSEUDO *" />
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="text" name="firstname" id="firstname" value="" placeholder="FIRSTNAME *">
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="text" name="lastname" id="lastname" value="" placeholder="LASTNAME *"/>
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="email" name="email" id="email" value="" placeholder="votre@email.com *" />
			</div>
		
			<div class="form-floating">
				<textarea class="connexion-textarea border p-3 pt-5 bg-transparent text-light" style="height: 100px" name="bio" placeholder="Présentez vous *" id="bio" ></textarea>
				<label for="bio">BIOGRAPHIE</label>
			</div><br>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="password" name="password" id="password" value="" placeholder="MOT DE PASSE *"/>
				
			</div>
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="password" name="pswdConfirmation" id="pswdConfirmation" value="" placeholder="CONFIRMATION *"/>
			</div>
		
			<button type="submit" class="connexion-btn border p-3 bg-transparent text-light">Inscription</button>
		
		</form>

	</div>

</div>