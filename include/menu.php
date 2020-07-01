<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">User</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($title=='Home'){ echo 'active'; } ?>">
        <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= ($title=='Contact')?'active':'' ?>">
        <a class="nav-link" href="/contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown  <?= ($title=='Liste des utilisateurs' || $title=='Ajouter un utilisateur' )?'active':'' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/user/list.php">List</a>
          <a class="dropdown-item" href="/user/add.php">Add</a>
         
        </div>
      </li>
      <li class="nav-item dropdown <?= ($title =='Liste des villes' || $title == 'Ajouter une ville' )?'active':'' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ville
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ville/list.php">List</a>
          <a class="dropdown-item" href="/ville/add.php">Add</a>
         
        </div>
      </li>
     
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php if(empty($_SESSION)): ?>
          <a href="/login.php" class="nav-link">Se connecter</a>
        <?php endif; ?>
      </li>
      <li class="nav-item">
        <?php if(!empty($_SESSION)): ?>
        <a href="/logout.php" class="nav-link">Deconnecter</a>
        <?php endif; ?>
      </li>
    </ul>
   
  </div>
</nav>