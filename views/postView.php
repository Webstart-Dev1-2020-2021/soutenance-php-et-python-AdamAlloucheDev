<div class="img-container articles">
  <img class="img-fluid post-img" src="./assets/images/posts/<?=$post['img'];?>" alt="">
  <a class="post-link" href="#post">LIRE L'ARTICLE</a>
</div>
<div id="post"></div>

<article class="post" >
  <h2 class="post-title" data-aos="fade-in" ><?= $post['title']; ?></h2>
  <span class="post-date" data-aos="fade-in"><?= dateFR($post['date']); ?></span><br><br>
  <h5 class="post-summary" data-aos="fade-up"> <?= $post['summary']; ?></h5>
  <div class="post-content galery" data-aos="fade-up" data-aos-duration="500"><?= nl2br($post['content']); ?></div><br>
</article>



<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <?php foreach($images as $key => $image): ?>
			<?php if ($key==0) {$set_ = 'active'; $true = 'true'; } else {$set_ = ''; } ?> 
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key; ?>" class="<?= $set_; ?>" aria-current="<?= $true; ?>" aria-label="Slide 1"></button>
    <?php endforeach; ?>
    
  </div>
  
  <div class="carousel-inner">
    <?php foreach($images as $key => $image): ?>
			<?php if ($key==0) {$set_ = 'active'; } else {$set_ = ''; } ?> 
      <div class="carousel-item <?= $set_; ?>">
        <img class="d-block w-100" src='./assets/images/posts/<?=$image['file_name'];?>' alt="">
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="comments">


<H3>Commentaires :</H3><br>

<?php if(!empty($errors)): ?>
  <div class="alert alert-danger alert-dismissible fade show" style="width: 800px;" role="alert">
    <strong>Erreur !</strong><br>
    <?php foreach($errors as $error): ?>
      <?= $error ?><br>
    <?php endforeach; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
  
  <?php if(isset($_SESSION['user_info'])): ?>
    <form  style="width: 800px;" action="" method="POST">
      <div class="form-floating mb-3">
        <textarea class="form-control" style="height: 100px" name="comment" placeholder="Leave a comment here" id="bio" ></textarea>
        <label for="comment">Ajouter un commentaire</label>
      </div>
      <button type="submit" class="btn comments-btn">Ajouter</button>
    </form><br>
  <?php endif ?>
  
  <?php if(count($commentsByPostId) > 0 ): ?>
    <?php foreach($commentsByPostId as $comment): ?>
        <div class="comment " data-aos="fade-up">
          <strong class="comment-user"><?= $comment['username']; ?> </strong><span class="comment-date form-text"><?= dateFR($comment['created_at']); ?></span>
          <div class="comment-content"><?= nl2br($comment['content']); ?></div>
        </div><br>
      <?php endforeach; ?>
  <?php else: ?>
    <p>Aucun commentaire pour le moment ...</p>
  <?php endif; ?>
</div>