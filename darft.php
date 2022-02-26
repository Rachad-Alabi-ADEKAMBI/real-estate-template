<?php/*
                    if (!empty ($_POST)){
        
                        $errors = array ();
                        $user_id = $_SESSION['user']['id'];
                     $quantity = $_POST['quantity_to_transfer'];
                    
                        
                        if (empty ($_POST['valueOfBill']) || !preg_match('/^[0-9]+$/', $_POST['valueOfBill'])) {
                            $errors['valueOfBill'] = "Montant de la facture non valide";
                        }

                        if (empty ($_POST['rateOfReduction']) || !preg_match('/^[0-9]+$/', $_POST['rateOfReduction'])) {
                            $errors['rateOfReduction'] = "Quantite non valide";
                        }

                        if(empty($errors)){ ?>
    
                            <div class="operation-transfert__results">
                                <?php
                                
                            /*  $tfbk_quantity_to_sell= $pdo->query('SELECT * FROM tfbk_history_admin
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
                        */

                        $valueOfBill = $_POST['valueOfBill'];
                        $rateOfReduction = $_POST['rateOfReduction'];

                        $valueOfReduction = ($valueOfBill*$rateOfReduction)/100;

                        $tfbk_quantity_selled= $pdo->query('SELECT * FROM tfbk
                        ORDER BY id DESC 
                        LIMIT 1');

                        $tfbk_quantity_selled->execute();
                    
                        while ($total_selled = $tfbk_quantity_selled-> fetch())
                            {
                                $selled = $total_selled['id'];

                                $valueOfTfbkToday = $selled/200000;
                            }


                            $valueToTransfer = ($valueOfTfbkToday *$rateOfReduction)/100;

                                ?>
                                <table>
                                    <tr><td>Valeur en euros</td><td>Volume de TFBK</td></tr>
                                    <tr>
                                        <td> <?php echo number_format($valueOfReduction, 0, ',', ' ') ?> </td> 
                                        <td> <?php echo $valueToTransfer ?> </td>
                                    </tr>
                                </table> <br>
                                
                                <?php
                                if ($valueOfReduction <0) {
                                    ?><p class="operation-transfert__results__alert">Impossible de transférer</p>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button class="operation-transfert__results__button" type="submit" name="valider" >
                                        <a href="">valider</a>
    
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
                    <?php endif; 
            ?>