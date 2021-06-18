<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<link href="../assets/css/admin.css" rel="stylesheet">
	</head>
	<body  class="mx-auto ">

    <?php require_once('partials/header.php');?>
    <?php require_once('partials/menu.php');?>

		<main  style="width: 95%" class="mx-auto">
		<br>
			<?php if(isset($_SESSION['message'])): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Merci !</strong> <?= $_SESSION['message'] ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['error'])): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Attention !</strong> <?= $_SESSION['error'] ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
		
    	<?php require_once($view) ?>

    </main>

		<script src="https://cdn.tiny.cloud/1/ic6vx8if1tgkrsikco48wg8k6za8avp16qa4fvlrlihyqnjo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
    tinymce.init({
      selector: '.tinymce',
			placeholder: "Contenu",
			plugins: "textcolor",
			skin: 'bootstrap',
			toolbar_location: 'bottom',
			toolbar: 'formatselect | bold italic underline | forecolor backcolor',
  		menubar: false,
  		statusbar: false,
  		content_css: "../assets/css/mycontent.css"
			
			
    });
  	</script>

	</body>
</html>