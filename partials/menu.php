
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top e-auto">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img class="logo" src="./assets/images/Logo-moteur-et-sens.png" alt="logo moteur & sens"></a>
			<!-- <span class="icon-bolt1"></span> -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
					<?php foreach($categories as $category): ?>
						<li class="nav-item underline-hover">
							<a style="text-transform:uppercase" class="nav-link active categories" href="index.php?page=posts&category_id=<?=$category['id'];?>"><?= $category['name'];?></a>
						</li>
					<?php endforeach; ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle ms-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="icon-user"></span>
						</a>
						<ul class="dropdown-menu " aria-labelledby="navbarDropdown">
							<?php if(!isset($_SESSION['user_info'])): ?>
								<li><a class="dropdown-item" href="index.php?page=user&action=login">Connexion</a></li>
								<li><a class="dropdown-item" href="index.php?page=user&action=register">Inscription</a></li>
							<?php else: ?>
								<li><a class="dropdown-item" href="index.php?page=user&action=logout">Déconnexion</a></li>
								<li><a class="dropdown-item" href="index.php?page=user&action=edit&id=<?=$_SESSION['user_info']['id']?>">Mon compte</a></li>
								<?php if(isset($_SESSION['user_info']) && $_SESSION['user_info']['is_admin'] == 1): ?>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="./admin/index.php">Administration</a></li>
								<?php endif; ?>
							<?php endif; ?>
						</ul>
					</li>
				</ul>
	
			</div>
		</div>
	</nav>
