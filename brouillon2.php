<?php session_start(); 
 include 'traitements/db.php';
 include 'traitements/functions.php';


if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

$receiver_id =$_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Fineblock - Points fidélité</title>
</head>
<body>
    <div class="container">
        <div class="operation-transfert">
            <a href="tableau-de-bord.php">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
            
            <h1 class="operation-transfert__title">
                Transfert de points fidélité
            </h1>

            <p class="operation-transfert__subtitle">
                <?php $receiver_name = $_SESSION["customer"]["customer_first_name"]." ".$_SESSION["customer"]["customer_last_name"];
                        $receiver_id = $_SESSION["customer"]["id"];
                ?>
                A <?=  $receiver_name ?> 
            </p> <br>

            <form class="operation-transfert__query" action="" method="POST" >
                <label for="">
                    Valeur d'achat: <br>
                    <input type="number" step="any" name="valueOfBill" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                </label> <br> <br>

                <label for="">
                    Taux de réduction <br>
                    <input type="number" name="rateOfReduction" step="any" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                </label>

                <label for=""> <br><br>
                    <button type="submit">Ok</button>
                </label>
            </form> <br>

            <?php
                    if (!empty ($_POST)){
        
                        $errors = array ();
                        $user_id = $_SESSION['user']['id'];
                       // $quantity = $_POST['quantity_to_transfer'];
                    
                        
                        if (empty ($_POST['valueOfBill'] || $_POST['valueOfBill'] < 0)) {
                            $errors['valueOfBill'] = "Montant de la facture non valide";
                        }

                        if (empty ($_POST['rateOfReduction'] || ($_POST['rateOfReduction']) < 0)) {
                            $errors['rateOfReduction'] = "Quantite non valide";
                        }

                        if(empty($errors)){ ?>
    
                            <div class="operation-transfert__results">
                        
                        <?php
                        $valueOfBill = $_POST['valueOfBill'];
                        $rateOfReduction = $_POST['rateOfReduction'];

                        $valueOfReduction = ($valueOfBill*$rateOfReduction)/100;


                        //calcul du volume restant
                        $req= $pdo->prepare('SELECT * FROM users
                        WHERE id = ? ');

                        $req->execute(array($_SESSION['user']['id']));
                    
                        while ($datas = $req-> fetch())
                            {

                                $total_quantity = $datas['total_quantity'];
                            }


                            //calcul du marketcap
                            $query= $pdo->prepare('SELECT * FROM tfbk_history_admin
                            ORDER BY id DESC LIMIT 1 ');

                        $query->execute();
                    
                        while ($datas = $query-> fetch())
                            {

                                $marketcap = $datas['marketcap'];
                            }


                            //calcul de la valeur de la réduction
                            $valueToTransfer = ($marketcap *$rateOfReduction)/100;

                                ?>
                                <table>
                                    <tr><td>Valeur en euros</td><td>Volume de points fidélité</td></tr>
                                    <tr>
                                        <td> <?php echo number_format($valueOfReduction, 2, ',', ' ') ?> </td> 
                                        <td> <?php echo number_format($valueToTransfer, 3, ',', ' ') ?> </td>
                                    </tr>
                                </table> <br>
                                
                                <?php
                                if ($valueOfReduction <0 ) {
                                    ?><p class="operation-transfert__results__alert">Impossible de transférer</p>
                                    <?php
                                }

                                if ($total_quantity < $valueToTransfer) {
                                    ?><p class="operation-transfert__results__alert">Solde insufisant</p>
                                    <?php
                                }

                                else{
                                    $_SESSION['customer'] = [
                                        "quantity" => $valueToTransfer,
                                        "name" => $receiver_name,
                                        "id" => $receiver_id,
                                    ];

                                    echo $_SESSION['customer']['id'];
                                    echo $_SESSION['customer']['name'];
                                   
                                    ?>

                                   
                                    <button class="confirmation-operation-transfert__results__button" type="submit" name="valider" >
                                        <a href="confirmation-points-fidelite.php">valider</a>
    
                                </button>
                                
                                <?php
                                }
                                ?>
                            
                            </div>
    
                                
                    <?php
                            }
                        }
                   include 'errors.php'; ?>
        </div>
    </div>
</body>
</html>