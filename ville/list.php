<?php
$title='Liste des utilsateurs';
$bo='../css/bootstrap.css';
$st='../css/style.css';
$fa='../css/all.css';
$jq='../js/jQuery.js';
$bu='../js/bootstrap.bundle.js';
?>
    
    <?php include '../include/connexion.php'; ?>
    <?php include '../include/header.php'; ?>
    <?php include '../include/menu.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p-4">List des villes</h1>
            </div>
            <div class="col-md-8 mx-auto">
                <?php if(isset($_GET['message']) && $_GET['message']== 'deleted'): ?>
                <div class="alert alert-danger">Supprimer avec succes
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
                <?php endif; ?>
                <?php if(isset($_GET['message']) && $_GET['message']== 'added'): ?>
                <div class="alert alert-success">Ajouter avec succes
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
                <?php endif; ?>
                <?php if(isset($_GET['message']) && $_GET['message']== 'updated'): ?>
                <div class="alert alert-warning">Modifier avec succes
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-8 mx-auto">
                <table class="table table-dark table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $req = $bd->query('select * from villes');
                        while($data = $req->fetch()):
                        ?>
                            <tr>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['nom'] ?></td>
                                <td>
                                    <a href="/ville/update.php?id=<?= $data['id'] ?>" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="/ville/delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <?php include '../include/footer.php'; ?>
