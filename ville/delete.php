<?php include '../include/connexion.php';

$id = $_GET['id'];
$req = $bd->prepare('delete from villes where id=?');

$req->execute([$id]);

header('location: /ville/list.php?message=deleted');
