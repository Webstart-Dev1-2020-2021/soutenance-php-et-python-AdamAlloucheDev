<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous"></script>
		<script src="./assets/js/main.js" defer ></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<link href="./assets/icomoon-v1.0/style.css" rel="stylesheet">
		<link href="./assets/css/reset.css" rel="stylesheet">
		<link href="./assets/css/style.css" rel="stylesheet">
    


		<title>MVC Local</title>
	</head>
	<body>

		<header>
			<?php
			
			if ($page != 404){
				require_once('partials/menu.php');
			}
			
			?>
		</header>

		
		<main>
    
			<div class="messages">
				<span class="session-message">
					<?php if(isset($_SESSION['message'])): ?>
						<?= $_SESSION['message'] ?><br>
					<?php endif; ?>
				</span>
			</div>

    	<?php require_once($view) ?>

    </main>
		
		<?php require_once('partials/footer.php'); ?>

		<script>
			AOS.init();
		</script>


	</body>
	
</html>