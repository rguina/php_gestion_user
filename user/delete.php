<?php include '../include/connexion.php';

$id = $_GET['id'];
$req = $bd->prepare('delete from users where id=?');

$req->execute([$id]);

header('location: /user/list.php?message=deleted');
