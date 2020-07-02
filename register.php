<?php
$bo='css/bootstrap.css';
$st='css/style.css';
$fa='css/all.css';
$lg='css/login.css';
$jq='js/jQuery.js';
$bu='js/bootstrap.bundle.js';
?>
<?php include 'include/connexion.php'; ?>
<?php include 'include/header.php'; ?>
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

    header('location: /login.php');
}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-5 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa fa-user"></i>Inscription des utilisateurs</h5>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp"
                                placeholder="nom"><i class="iconinput fa fa-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp"
                                placeholder="prenom"><i class="iconinput fa fa-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"
                                placeholder="Username"><i class="iconinput fa fa-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                placeholder="Email"><i class="iconinput fas fa-envelope-square"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"><i
                                class="iconinput fa fa-keyboard"></i>
                        </div>
                        <div class="form-group">
                            <select name="ville" class="form-control">
                                <?php $req=  $bd->query('select * from villes');
                                    while($data = $req->fetch()):
                                ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nom'] ?></option>
                                    <?php endwhile; ?>
                            </select>
                            <i class="iconinput fa fa-keyboard"></i>
                        </div>
                        <button type="submit" name="submit" class="col-md-12 btn btn-primary">Inscription</button>
                    </form>
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-body">
                    <small>vous avez un compte<a href="/login.php"> alors connecte toi </a></small>.
                </div>
            </div>


        </div>

    </div>
</div>
<?php include 'include/footer.php'; ?>