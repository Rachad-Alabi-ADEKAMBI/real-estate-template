<?php session_start();

require_once 'traitements/db.php';

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

unset($_SESSION['user']);

header("Location: accueil.php");