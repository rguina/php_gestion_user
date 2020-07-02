<?php
$bo='css/bootstrap.css';
$st='css/style.css';
$fa='css/all.css';
$lg='css/login.css';
$jq='js/jQuery.js';
$bu='js/bootstrap.bundle.js';
?>
<?php include 'include/sess.php'; ?>
<?php include 'include/connexion.php'; ?>
<?php include 'include/header.php'; ?>
<?php

if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $req = $bd->query('select count(*) from users where user="'.$user.'" and pass="'.$pass.'"');
    
    $res = $req->fetchColumn();
    if($res == 1){
        $_SESSION['user']=$user;
        header('location: /index.php');
    }else{
        header('location: /login.php?message=error');
    }
    
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 mx-auto p-3">
                <?php if(isset($_GET['message']) && $_GET['message']== 'error'): ?>
                    <div class="alert alert-danger">votre username ou password incorrect
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>
                <?php endif; ?>
        </div>
        <div class="col-md-12"></div>
        <div class="col-5 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa fa-user"></i>Gestion des utilisateurs</h5>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"
                                placeholder="Enter email"><i class="iconinput fa fa-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"><i
                                class="iconinput fa fa-keyboard"></i>
                        </div>
                        <button type="submit" name="submit" class="col-md-12 btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-body">
                    <small>vous n'avez un compte<a href="/register.php"> alors cree le </a></small>.
                </div>
            </div>


        </div>

    </div>
</div>
<?php include 'include/footer.php'; ?>