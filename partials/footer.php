<footer>
	<hr class="underline-footer">
	<div class="d-flex justify-content-between">
		<div class=""><a class="" href="index.php">MOTEUR & SENS</a></div>
		<div class="">Inscrivez-vous à notre newsletter </div>
	</div>

	
	<hr class="underline-footer">

		<div class="d-flex justify-content-between">
			<div class="footer-info">
				<span class="strong">COORDONNÉES</span>
				<span class="light">
					<br><br> MOTEUR & SENS
					<br>10 Rue de l’Orme Saint-Germain - 91160 - Champlan
					<br>Tel : 01 69 30 98 40
					<br>
				</span>
				<div class="mt-5">
					<span class="icon-facebook border border-1 border-white p-4 me-2"></span>
					<span class="icon-twitter border border-1 border-white p-4 me-2"></span>
					<span class="icon-instagram border border-1 border-white p-4 me-2"></span>
					<span class="icon-linkedin border border-1 border-white p-4 me-2"></span>
					<span class="icon-youtube border border-1 border-white p-4 me-2"></span>
				</div>
			</div>
			<div class="footer-info">
				<span class="strong">PLAN DU SITE</span>
				<br><br>
				<?php foreach($categories as $category): ?>
					<div class="">
						<a  class="light" href="index.php?page=posts&category_id=<?=$category['id'];?>"><?= $category['name'];?></a>
					</div>
				<?php endforeach; ?>
			</div>
			<div>
				<span class="strong">CONTACT</span> 
				<span >
					<br><br><br>
					<a class="light" href="index.php?page=contact">Nous contacter</a>
				</span>
			</div>
		</div>

	
	<div class="credits d-flex justify-content-between align-items-end">
		<div>
			<span class="strong">MOTEUR & SENS © 2021</span>
			<span class="light">- Mentions légales</span>
		</div>
		<div>
			<span class="strong">Made with love by</span>
			<span class="light">Adam Allouche - Dev1 - Webstart</span>
		</div>
	</div>

</footer>
