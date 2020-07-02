<?php
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
    $id=$_GET['id'];
    $query = $bd->query('select * from users where id='.$id);

    $data = $query->fetch();

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $role = $_POST['role'];


    $req = $bd->prepare('update users set nom=?, prenom=?, user=?, email=?, ville=?, role=?  where id = ?');
    $req->execute([$nom, $prenom, $user, $email, $ville, $role, $id]);

    header('location: /user/list.php?message=updated');
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
                        <input value="<?= $data['nom'] ?>" type="text" name="nom" id="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prenom">prenom</label>
                        <input  value="<?= $data['prenom'] ?>" type="text" name="prenom" id="prenom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user">user</label>
                        <input value="<?= $data['user'] ?>" type="text" name="user" id="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input value="<?= $data['email'] ?>" type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ville">ville</label>
                        <select type="text" name="ville" id="ville" class="form-control">
                                <?php $req=  $bd->query('select * from villes');
                                        while($donnee = $req->fetch()):
                                ?>
                                    <option value="<?= $donnee['id'] ?>" <?= ($data['ville']==$donnee['id'])?'selected':'' ?>><?= $donnee['nom'] ?></option>
                                <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="role">role</label>
                        <input value="<?= $data['role'] ?>" type="text" name="role" id="role" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Modifier</button>
                    </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>


    <?php include '../include/footer.php'; ?>
