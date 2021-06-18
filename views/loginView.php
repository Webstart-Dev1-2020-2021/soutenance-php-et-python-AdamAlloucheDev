<div class="articles"></div>

<div class="connexion d-flex justify-content-center">

	<div>

		<h2 class="pb-5">Connexion :</h2><br>
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

		<form class="" action="" method="POST" >
		
			<div class="mb-3">
				<input class="connexion-mail border p-3 bg-transparent text-light" type="email" name="email" id="email" value="" placeholder="votre@email.com *" /><br>
			</div>
		
			<div class="mb-3">
				<input class="connexion-mdp border p-3 bg-transparent text-light" type="password" name="password" id="password" value="" placeholder="MOT DE PASSE *"/>
			</div>
		
			<button type="submit" class="connexion-btn border p-3 bg-transparent text-light">CONNEXION</button>
		
		</form>
	</div>
</div>