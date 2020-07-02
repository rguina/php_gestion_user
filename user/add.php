<?php
$title='Ajouter un utilisateur';
$bo='../css/bootstrap.css';
$st='../css/style.css';
$fa='../css/all.css';
$jq='../js/jQuery.js';
$bu='../js/bootstrap.bundle.js';
?>
    
    <?php include '../include/session.php'; ?>
    <?php include '../include/connexion.php'; ?>
    <?php include '../include/header.php'; ?>
    <?php include '../include/menu.php'; ?>

<?php 

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $role= 'user';
    $query = $bd->prepare('insert into users(nom,prenom,user,pass,email,ville,role) values(?,?,?,?,?,?,?) ');
    $query->execute([$nom, $prenom, $user, $pass, $email, $ville, $role]);

    header('location: /user/list.php?message=added');
}


?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p-4">List des villes</h1>

            </div>
            <div class="col-md-8 mx-auto">
               <div class="card">
                <div class="card-body">
                    <form method="post">
                    <div class="form-group">
                        <label for="nom">nom</label>
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prenom">prenom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control">
                    </div>
                    <div class="form-group">pass
                        <label for="user">user</label>
                        <input type="text" name="user" id="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass">pass</label>
                        <input type="password" name="pass" id="pass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ville">ville</label>
                        <select type="text" name="ville" id="ville" class="form-control">
                        
                                <?php $req=  $bd->query('select * from villes');
                                    while($data = $req->fetch()):
                                ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nom'] ?></option>
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Ajouter</button>
                    </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>


    <?php include '../include/footer.php'; ?>
