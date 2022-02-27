<?php

include_once './traitements/db.php';
include_once 'function-message.php';

$id = $_GET['id'];
$token = $_GET['token'];
$receiver = $_GET['email'];

$subject = "Finalisation de votre adhésion Fineblock";

$message = '<div style="width: 90%; text-align:center;">
<img src="http://fineblock.eu/public/images/logo-fineblock.png" style="width: 120px; 
margin: auto;"> <br>

<p style="width: 100%; text-align: justify; margin: auto; color: black;">';

$message.='Cher nouvel adhérant,<br>';
$message.='Merci de cliquer sur le lien suivant pour finaliser votre adhésion <br>';
$message.='<a href="https://fineblock.eu/nouvelle-adhesion.php?id='.$id.'&token='.$token.'">Lien</a> <br>';

$message.='</p>';
$message.='</div>';

sendmail($subject, $message, $receiver);

$sql = $pdo->prepare('UPDATE users SET account_status ="message envoyé"
   WHERE id = ? ');

$sql->execute(array($id));

$req = $pdo->prepare('UPDATE sponsorships SET sponsorship_status ="message envoyé"
   WHERE sponsored_id = ? ');

$req->execute(array($id));

?>
<script>
    alert("Le message a été envoyé");
    window.location.replace("prospects-en-attente.php");
</script>