<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Salut <?= $_SESSION['user_info']['firstname'] ?> !</strong> Bienvenue sur le back office d'administration.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="admin-index-info">
  <span>Nombres de catégories : <?= $categoriesCount ?></span><br>
  <span>Nombres d'articles : <?= $postsCount ?></span>


</div>


