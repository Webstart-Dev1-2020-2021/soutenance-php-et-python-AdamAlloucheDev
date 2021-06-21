<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" >

	<div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>
	
	<div class="carousel-inner articles">
		<?php foreach($latestPosts as $key => $post): ?>
			<?php if ($key==0) {$set_ = 'active'; } else {$set_ = ''; } ?> 
			<div class='carousel-item <?php echo $set_; ?>'>
				<img src='./assets/images/posts/<?=$post['img'];?>' class='img-fluid w-100'>
				<span class="carousel-caption d-none d-md-block">
					<a class="caption" href="index.php?page=post&id=<?=$post['id'];?>">
						<?= $post['title']; ?>
					</a>
				</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>



<div >
	<?php foreach($allPosts as $post): ?>
		<article class="card bg-transparent mb-3" data-aos="fade-up">
			<div class="row g-0">
				<div class="col-md-4">
					<img class="img-fluid" src="./assets/images/posts/<?=$post['img'];?>" alt=""><br>
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?= $post['title']; ?></h5>
						<p class="card-info">Par : <?= $post['firstname']; ?> <?= $post['lastname']; ?> - <?= dateFR($post['date']); ?></p>
						<p class="card-category"><?= $post['categories']; ?></p>
						<p class="card-text"><?= $post['summary']; ?></p>

						<a href="index.php?page=post&id=<?=$post['id'];?>" class="card-link border-top border-bottom p-3">LIRE L'ARTICLE</a>

					</div>
				</div>
			</div>
		</article>
	<?php endforeach; ?>
</div>



