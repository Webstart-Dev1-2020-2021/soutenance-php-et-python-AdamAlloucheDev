<h2>Contact :</h2><br>
<form action="" method="POST">
	<label for="firstname">Prénom *</label>
	<input required type="text" name="firstname" id="firstname" value="<?php if(isset($submittedFirstname) && !empty($errors)):?><?= $submittedFirstname; ?><?php endif; ?>" /><br>
	<label for="lastname">Nom *</label>
	<input required type="text" name="lastname" id="lastname" value="<?php if(isset($submittedLastname) && !empty($errors)):?><?= $submittedLastname; ?><?php endif; ?>" /><br>
	<label for="email">Email *</label>
	<input required type="text" name="email" id="email" value="<?php if(isset($submittedEmail) && !empty($errors)):?><?= $submittedEmail; ?><?php endif; ?>" placeholder="ton@email.com" /><br>
	<label for="subject">Objet *</label>
	<input required type="text" name="subject" id="subject" value="<?php if(isset($submittedSubject) && !empty($errors)):?><?= $submittedSubject; ?><?php endif; ?>" /><br>
	<label for="message">Message *</label>
	<textarea required name="message" id="message" cols="30" rows="3"><?php if(isset($submittedMessage) && !empty($errors)):?><?= $submittedMessage; ?><?php endif; ?></textarea><br>
	<button>Envoyer</button>
</form>

<?php if(empty($errors) && !empty($_POST)): ?>
	<?= isset($mail) ? "<br>Votre message a bien été envoyé !" : "" ?>
<?php endif; ?>

<?php if(!empty($errors)): ?>
	<h3>Erreurs :</h3>
	<?php foreach($errors as $error): ?>
		<?= $error ?><br>
	<?php endforeach; ?>
<?php endif; ?>
