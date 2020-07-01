<?php
$bo='../css/bootstrap.css';
$st='../css/style.css';
$fa='../css/all.css';
$jq='../js/jQuery.js';
$bu='../js/bootstrap.bundle.js';
?>
    
    <?php include '../include/connexion.php'; ?>
    <?php include '../include/header.php'; ?>
    <?php include '../include/menu.php'; ?>

<?php 
    $id=$_GET['id'];
    $query = $bd->query('select * from villes where id='.$id);

    $data = $query->fetch();

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];

    $req = $bd->prepare('update villes set nom=? where id = ?');
    $req->execute([$nom, $id]);

    header('location: /ville/list.php?message=updated');
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
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Ajouter</button>
                    </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>


    <?php include '../include/footer.php'; ?>
