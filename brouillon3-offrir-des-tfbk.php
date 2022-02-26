<?php session_start(); 
 include 'traitements/db.php';
 include 'traitements/functions.php';


if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

if($_SESSION['user']['role'] == 'btob' ||
        $_SESSION['user']['role'] == 'btoc'){
    header("Location: operation-transfert-adherant.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>    

    <title>Fineblock - Opération de transfert</title>
</head>
<body>
  <div class="container">
  <div class="operation-transfert">
        <a href="tableau-de-bord.php">
            <i class="fa fa-times" aria-hidden="true"></i></a>
        
        <h1 class="operation-transfert__title">
            Transfert de TFBK
        </h1>

        <p class="operation-transfert__subtitle">
            A <?php  echo $_SESSION["customer"]["customer_first_name"]." ".$_SESSION["customer"]["customer_last_name"]; ?>
        </p> <br>

       <form class="operation-transfert__query" action="" method="POST" >
            <label for="">
                Quantité à transférer: <br>
                <input type="number" name="quanti   ty_to_transfer">
            </label>

            <label for=""> <br>
                <button type="submit">Ok</button>
            </label>
        </form> <br>

        <?php
                if (!empty ($_POST)){
    
                    $errors = array ();
                    $user_id = $_SESSION['user']['id'];
                    $quantity = $_POST['quantity_to_transfer'];

                    if (empty ($_POST['quantity_to_transfer']) || !preg_match('/^[0-9]+$/', $_POST['quantity_to_transfer'])) {
                        $errors['quantity_to_transfer'] = "Quantite non valide";
                    }

                    if(empty($errors)){ 

                      if($_SESSION['user']['role'] == "btoc"|| $_SESSION['user']['role'] == "btob"  ){
                       
                        ?>
 
                        <div class="operation-transfert__results">
                            <?php
                            
                            $req = $pdo->prepare('SELECT COUNT(*) FROM tfbk
                            WHERE fk_owner_id = ?');
       
                           $req->execute(array($user_id));
       
                           $initial_quantity = $req->fetchColumn();

                           
                            $final_quantity = $initial_quantity - $quantity;

                            $initial_quantity_formated =number_format($initial_quantity, 0, ',', ' ');
                            $quantity_formated = number_format($_POST['quantity_to_transfer'], 0, ',', ' ');
                            $final_quantity_formated =number_format(($final_quantity), 0, ',', ' ');
     
 
                            ?>
                            <table>
                                <tr><td>Solde disponible</td><td>Quantié à transférer</td>
                                     <td>Solde après transfert</td></tr>
                                 <tr>
                                     <td> <?php echo $initial_quantity_formated ?> </td>
                                      <td> <?php echo $quantity_formated ?> </td>
                                     <td><?php echo $final_quantity_formated ?></td>
                                 </tr>
                            </table> <br>
                               
                            <?php
                            if ($final_quantity <0) {
                                ?><p class="operation-transfert__results__alert">Impossible de transférer</p>
                                <?php
                            }
                            else{
                                ?>
                                <button class="operation-transfert__results__button" type="submit" name="valider" >
                                     <a href="confirmation-transfert.php?quantity=<?php echo $_POST['quantity_to_transfer'] ?>">valider</a>
 
                             </button>
                            
                            <?php
                            }
                            ?>
                         
                        </div>
 
                             
                            <?php
   
                         }
                      }
                      
                      if($_SESSION['user']['role'] === "admin"){
                        $quantity = $_POST['quantity_to_transfer'];

                        ?>
 
                        <div class="operation-transfert__results">
                            <?php
                            
                            $tfbk_quantity_to_sell= $pdo->query('SELECT * FROM tfbk_history_admin
                            ORDER BY id DESC 
                            LIMIT 1');
       
                            $tfbk_quantity_to_sell->execute();
                           
                           while ($qty_to_sell = $tfbk_quantity_to_sell-> fetch()){
                            $initial_quantity = $qty_to_sell['final_quantity'];
                        }


                        $tfbk_quantity_selled= $pdo->query('SELECT * FROM tfbk
                        ORDER BY id DESC 
                        LIMIT 1');
   
                        $tfbk_quantity_selled->execute();
                       
                       while ($total_selled = $tfbk_quantity_selled-> fetch()){
                        $selled = $total_selled['id'];
                    }

                    $available_quantity = $initial_quantity - $selled;

                       $final_quantity = $available_quantity - $quantity;

                       $available_quantity_formated =number_format($available_quantity, 0, ',', ' ');
                       $quantity_formated = number_format($_POST['quantity_to_transfer'], 0, ',', ' ');
                       $final_quantity_formated =number_format(($final_quantity), 0, ',', ' ');

                            ?>
                            <table>
                                <tr><td>Solde disponible</td><td>Nombre de TFBK à distribuer</td>
                                     <td>Solde après distribution</td></tr>
                                 <tr>
                                     <td> <?php echo $available_quantity_formated ?> </td> 
                                     <td> <?php echo $quantity_formated?> </td>
                                     <td><?php echo $final_quantity_formated ?></td>
                                 </tr>
                            </table> <br>
                             
                            <?php
                            if ($final_quantity <0) {
                                ?><p class="operation-transfert__results__alert">Impossible de transférer</p>
                                <?php
                            }
                            else{
                                ?>
                                <button class="operation-transfert__results__button" type="submit" name="valider" >
                                     <a href="confirmation-transfert.php?quantity=<?php echo $_POST['quantity_to_transfer'] ?>">valider</a>
 
                             </button>
                            
                            <?php
                            }
                            ?>
                         
                        </div>
 
                             
                <?php
   
                         }
                      }


                if (!empty($errors)):?>

                    <div class="alert" width=400>
                            <ul>
                                <?php foreach ($errors as $error): ?>   
                                <li><?= $error; ?></li>
                                <?php endforeach;?>
                            </ul>
                    </div>
                <?php endif; ?>
       </div>
  </div>
</body>
</html>