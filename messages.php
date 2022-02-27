<?php session_start(); 
include 'traitements/db.php';

$query = $pdo->prepare('SELECT  * FROM messages WHERE 
receiver_id =  ? GROUP BY sender_id ORDER BY id DESC ');
    
$query->execute(array($_SESSION['user']['id']));    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'meta.php'; ?>

<title>Fineblock - Messages</title>
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="messages">
        <a href="espace-personnel.php" class="messages__link">
            <i class="fas fa-long-arrow-alt-left"></i> Retour à l'espace personnel
        </a>
        <h1 class="messages__title">
            Vos messages
        </h1>
                <?php 

        $msg_nbr = $query->rowCount();

        if($msg_nbr == 0) {
            ?>
            <p class="nothing-to-display" >
            Vous n'avez aucun message !
            </p>

            <?php
        }

                    while ($datas = $query->fetch()){
                        $receiver_id = $datas['receiver_id'];
                        $sender_username =$datas['sender_name'];
                        $originalDate = $datas['date_of_insertion'];       
                       
                        $sender_id = $datas['sender_id'];
                        ?>

                        <a href="message.php?id=<?= $sender_id ?>">
                        <div class="messages__row">
                            <?php
                            $req = $pdo->prepare('SELECT  * FROM messages WHERE 
                            ((sender_id, receiver_id) =(:id1, :id2) OR (sender_id, receiver_id) =(:id2, :id1))
                            ORDER BY date_of_insertion DESC LIMIT 1');
                            
                            $req->execute(array('id1' => $_SESSION['user']['id'], 'id2' =>$sender_id));    

                            while ($data = $req->fetch()){
                                
                                echo $sender_username; ?>
                                <p class="time"><?php  echo date("H:i", strtotime($originalDate));
 ?></p> <br>
                                <?php
                                if ($data['sender_id'] == $_SESSION['user']['id']){ ?>

                                    <div class="messages-sender_msg">
                                    <?= substr($data['content'], 0, 40). " ...";?>
                                    </div>
                                    <?php } else { ?>
                                    <div class="messages-receiver_msg">
                                    
                                    <?= substr($data['content'], 0, 40). " ...";?>
                        </div> <?php } 
                    }?> 
                </div>
                </a>
                

     <?php   }?>

    </div>

    <?php include 'footer.php'; ?>
</body>
</html>