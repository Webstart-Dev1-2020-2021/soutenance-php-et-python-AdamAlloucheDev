<div class="img-container articles">
  <img class="img-fluid post-img" src="./assets/images/posts/<?=$post['img'];?>" alt="">
  <a class="post-link" href="#post">LIRE L'ARTICLE</a>
</div>
<div id="post"></div>

<article class="post" >
  <h2 class="post-title" data-aos="fade-in"><?= $post['title']; ?></h2>
  <span class="post-date" data-aos="fade-in"><?= dateFR($post['date']); ?></span><br><br>
  <h5 class="post-summary" data-aos="fade-in"> <?= $post['summary']; ?></h5>
  <div class="post-content" data-aos="fade-in"><?= nl2br($post['content']); ?></div><br>
</article>

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
        <div class="comment">
          <strong class="comment-user"><?= $comment['username']; ?> </strong><span class="comment-date form-text"><?= dateFR($comment['created_at']); ?></span>
          <div class="comment-content"><?= nl2br($comment['content']); ?></div>
        </div><br>
      <?php endforeach; ?>
  <?php else: ?>
    <p>Aucun commentaire pour le moment ...</p>
  <?php endif; ?>
</div>