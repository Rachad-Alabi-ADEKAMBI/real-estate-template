<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/db.php';
$quantity = $_GET['quantity'];
    
    $tfbk_update_history =  $pdo->prepare('INSERT INTO tfbk_history_customers 
    SET sender_id=?, quantity=?, receiver_id=?, comment= ? ');
    

    $comment= "tranfert entre adhérants";

    $sender_id = $_SESSION["user"]["id"];

    $receiver_id = $_SESSION["customer"]["customer_fk_owner_id"];


    $tfbk_update_history->execute(array($sender_id, $quantity, 
        $receiver_id, $comment));
    ?>

    <script>
    alert("Opération éffectuée, vous serez redirigé vers votre espace personnel");
    window.location.replace("tableau-de-bord.php");
    </script>
    
       