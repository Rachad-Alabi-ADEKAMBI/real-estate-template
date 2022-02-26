<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

$id= $_GET['id'];

require_once 'traitements/db.php'; 

include 'traitements/traitement-prospects-en-attente.php';

$req = $pdo->prepare("SELECT * FROM users WHERE id = ?");

$req->execute(array($id));

$user=$req->fetch();

$role = $user['role'];

if( $role == 'btob'){
    header("Location: fiche-professionnels.php?id=$id");
}

if( $role == 'btoc'){
    header("Location: fiche-particuliers.php?id=$id");
}



?>