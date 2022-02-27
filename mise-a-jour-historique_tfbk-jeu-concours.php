<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

 require_once 'traitements/db.php';
    $quantity = $_GET['quantity'];

   /* $tfbk_query = $pdo->query('SELECT *
        FROM tfbk_history_admin ORDER BY id
        DESC  LIMIT 1 ');
    
    while ($datas = $tfbk_query->fetch()){

            $initial_quantity = $datas['final_quantity'];

            $final_quantity = $initial_quantity - $quantity;
    }

    $tfbk_update =  $pdo->prepare('INSERT INTO tfbk_history_admin 
    SET initial_quantity=?, quantity=?, comment= ?, 
        final_quantity =? ');
        $tfbk_update->execute(array($initial_quantity, $quantity, 
        $comment, $final_quantity));
    */
    
    $comment = "Distribution jeu concours";
    
    $tfbk_update_history =  $pdo->prepare('INSERT INTO tfbk_history_customers 
        SET sender_id=?, quantity=?, receiver_id=?, comment= ?, receiver_name = ?,
        operation_name ="jeu-concours"');
        
    
        $sender_id = $_SESSION["user"]["id"];
    
        $receiver_id = 33;

        $receiver_name = "JEU-CONCOURS";
    
    
        $tfbk_update_history->execute(array($sender_id, $quantity, 
            $receiver_id, $comment, $receiver_name));
       

?>
<script>
alert("Opération éffectuée, vous serez redirigé vers le tableau de bord");
window.location.replace("tableau-de-bord.php");
</script>

