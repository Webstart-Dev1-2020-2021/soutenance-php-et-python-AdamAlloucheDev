<div class="articles"></div>

<div class="post-list-info">
  <?php if(isset($selectedCategory)): ?>
    <img class="category-img articles" src="assets/images/categories/<?=$selectedCategory['img'];?>" alt="<?= $selectedCategory['name']; ?> " >
    <h1 class="articles"><?= $selectedCategory['name']; ?></h1>
    <p><?= $selectedCategory['description']; ?></p>
  <?php else: ?>
    <h1>Tous les articles.</h1>
  <?php endif; ?>
</div>


<div class="post-list">
  <?php if(count($posts) > 0 ): ?>
    <?php foreach($posts as $post): ?>
      <article class="card bg-transparent mb-3" data-aos="fade-up">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="img-fluid" src="./assets/images/posts/<?=$post['img'];?>" alt=""><br>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <?php if(!isset($selectedCategory)): ?>
                <p class="card-category"><?= $post['categories']; ?></p>
              <?php endif; ?>
              <h5 class="card-title"><?= $post['title']; ?></h5>
                <p class="card-info">Auteur : <?= $post['firstname']; ?> <?= $post['lastname']; ?> - <?= dateFR($post['date']); ?></p>
                <p class="card-text"><?= $post['summary']; ?></p>
  
                <a href="index.php?page=post&id=<?=$post['id'];?>" class="card-link border-top border-bottom p-3">Lire l'article</a>
            </div>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="post-list-alert">Aucun article pour le moment ...</p>
  <?php endif; ?>
</div>

