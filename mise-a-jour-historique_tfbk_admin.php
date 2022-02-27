<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

 require_once 'traitements/db.php';

 if (empty ($_POST)){
    $quantity = $_GET['quantity'];

    $receiver_id = $_SESSION["customer"]["customer_fk_owner_id"];

    $comment = "Transfert à ".$_SESSION['customer']['customer_first_name']." ".$_SESSION['customer']['customer_last_name'];


   /* $tfbk_query = $pdo->query('SELECT *
        FROM tfbk_history_admin ORDER BY id
        DESC  LIMIT 1 ');
    
    while ($datas = $tfbk_query->fetch()){

            $initial_quantity = $datas['final_quantity'];

            $final_quantity = $initial_quantity - $quantity;
    }

    $tfbk_update =  $pdo->prepare('INSERT INTO tfbk_history_admin 
    SET initial_quantity=?, quantity=?, receiver_id =?,
     comment= ?,  final_quantity =? ');

    
    
   
    $tfbk_update->execute(array($initial_quantity, $quantity,  $receiver_id, 
        $comment, $final_quantity));
    */



        $tfbk_update_customers =  $pdo->prepare('INSERT INTO tfbk_history_customers 
    SET sender_id=?, quantity=?, receiver_id=?, comment= ? , receiver_name=?,
        sender_role =?, operation_name = ?');
    

    $comment_for_customers= "tranfert de Fineblock";

    $sender_id = $_SESSION["user"]["id"];

    $receiver_id = $_SESSION["customer"]["customer_fk_owner_id"];

    $receiver_name = $_SESSION['customer']['customer_first_name']." ".$_SESSION['customer']['customer_last_name'];

    $sender_role = $_SESSION['user']['role'];

    $operation_name = "achat";


    $tfbk_update_customers->execute(array($sender_id, $quantity, 
    $receiver_id,  $comment_for_customers, $receiver_name, $sender_role, $operation_name));
    

    //update customers quantity
    $getQuantity = $pdo->prepare("SELECT id FROM tfbk 
    WHERE fk_owner_id = ?");
 
    $getQuantity->execute(array($receiver_id));
 
    $row_count = $getQuantity->rowCount();
 
    $update= $pdo->prepare("UPDATE users SET total_quantity = ?
    WHERE id = ?");
 
    $update->execute(array($row_count, $receiver_id));
    
?>
<script>
alert("Opération éffectuée, vous serez redirigé vers votre espace personnel");
window.location.replace("tableau-de-bord.php");
</script>

<?php


 }
 ?>
