<?php session_start(); 
include 'traitements/db.php';
include 'traitements/functions.php';


if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

$id = verifyInput($_GET['id']);

if ($id <= 0){
    header("Location: tableau-de-bord.php");
}


$query = $pdo->prepare('SELECT  * FROM messages WHERE 
((sender_id, receiver_id) =(:id1, :id2) OR (sender_id, receiver_id) =(:id2, :id1))
ORDER BY date_of_insertion LIMIT 5');

$query->execute(array('id1' => $_SESSION['user']['id'], 'id2' =>$id));  

$afficher_message= $query->fetchAll();


//On récupère le nom du destinataire
$sql = $pdo->prepare('SELECT * FROM users
WHERE id = ? ');

$sql->execute(array($id));  

while($response= $sql->fetch()){
$receiver_username = $response['username'];
}
//envoyer un nouveau message

if (!empty ($_POST)){

    $errors = array ();

    if (empty ($_POST['message'])) {
        $errors['message'] = 'Veuillez entrer un message';
    } 
    
    if(empty($errors)){
      
      //On insère le message
          $req = $pdo->prepare("INSERT INTO 
          messages SET sender_id = ?, sender_name =?, content =?, 
          receiver_id = ?, receiver_name = ?,
          date_of_insertion= NOW()");

        $sender_username = $_SESSION['user']['username'];
        $sender_id = $_SESSION['user']['id'];
        $receiver_id = verifyInput($_GET ['id']);
        $content = verifyInput($_POST ['message']);
        
          $req -> execute(array($sender_id, $sender_username, 
          $content, $receiver_id, $receiver_username));

          header("Location: message.php?id=".$receiver_id );
         
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'meta.php'; ?>
<?php include 'header.php'; ?>

<title>Fineblock - Messages</title>
</head>
<body>
    <div class="messages">
            <?php 
               foreach($afficher_message as $am ){ 
                   if ($am['sender_id'] == $_SESSION['user']['id']){ ?>

                <div class="sender_msg msg">
                    <?=  $am['content']; ?> <br>
                     <span class="time" style="font-size: 0.8em;" ><?php
                          $originalDate =   $am['date_of_insertion'] ;  
                     echo date("H:i", strtotime($originalDate)) ?></span> 
                </div>
                
                <?php }  else{   ?>
                    <div class="receiver_msg msg">
                        <?php echo $am['content'];
                         $originalDate =   $am['date_of_insertion'] ;       
                        // echo date("d/m/Y", strtotime($originalDate)); 

                        
                        ?>  <p class="time" style="font-size: 0.8em;" ><?php  " de " .$am['sender_name'] ?></p> 
                        <span class="time" style="font-size: 0.8em;" ><?= date("H:i", strtotime($originalDate)) ?></span> 
                    </div> <?php

                 }
                }
                
            ?>

            <form class="" action="" method="POST"
            action="">
            <input type="text" name="message" required> <br>
            <button type="submit" >
                Envoyer
            </button> <br> <br>

            <a href="messages.php">
                Retour aux messages
            </a>
            </form>


            </div>
    <?php include 'footer.php'; ?>
</body>
</html>