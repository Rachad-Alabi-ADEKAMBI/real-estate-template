<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/db.php'; 
include 'traitements/traitement-inscription-ebe.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Inscription EBE</title>
</head>

<body>

<?php include 'header.php';
     include 'menu.php';
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading">
            <div class="dashboard-title">
                <h1>
                    Inscription de votre EBE 
                </h1>
                
                <p>
                    Veuillez inscrire le montant de l'EBE en pourcentage 
                    du chiffre d'affaires <br>
                    Note: Vous avez 7 jours à compter du dernier jour du mois précédant
                    pour valider votre EBE
                </p>
            </div>

        </div>

        <div class="dashboard__main__background">
            <div class="transfert">
                <form class="transfert__form" method="POST" action="">
                    <?php
                   

                    if (!empty ($_POST)){
                        

                        $errors = array ();

                        if (empty ($_POST['game_month'])) {
                            $errors['game_month'] = "Veuillez sélectionner un mois";
                        }

                        if (empty ($_POST['game_data'])) {
                            $errors['game_data'] = "EBE non valide";
                        }

                        if(empty($errors)){
                            
                            $btob =  $pdo->prepare('SELECT *
                            FROM btob
                            INNER JOIN users
                                ON btob.user_id = users.id
                                    WHERE user_id = ? ');

                            $user_id =  $_SESSION["user"]["id"];

                           $btob->execute(array($user_id));

                            while ($datas = $btob->fetch()){ 
                                $category = $datas['category'];
                            }

                            $game_month = $_POST['game_month'];
                            $game_data = verifyInput($_POST['game_data']);

                            //verification pour éviter les duplicata
                            $verif = $pdo->prepare("SELECT * FROM game WHERE game_month= ? AND 
                            user_id = ?");

                            $verif->execute(array($game_month, $user_id));

                            $res = $verif->fetch();

                            if($res){
                                ?>
                                    <script>
                                        alert("EBE déjà enregistré pour ce mois !");
                                        exit();
                                    </script>
                                <?php
                            }
                            
                           else{
                            $req =  $pdo->prepare('INSERT INTO game 
                            SET user_id = ?, category =  ?, game_month = ?,
                            game_data=?');

                            $req -> execute(array($user_id, $category, $game_month,
                            verifyInput($game_data)));
                            ?>
                                <script>
                        alert("EBE enregistré avec succès");
                        window.location.replace("inscription-ebe.php");
                        </script>
                        <?php


                        }}
                           }
                    ?> <br>

                    <label for="">Mois de l'exercice: <br>
                        <select name="game_month" id="" required>
                        <option value="">Selectionner le mois</option>
                            <option value="Janvier">Janvier</option>
                            <option value="Fevrier">Fevrier</option>
                            <option value="Mars">Mars</option>
                            <option value="Avril">Avril</option>
                            <option value="Mai">Mai</option>
                            <option value="Juin">Juin</option>
                            <option value="Juillet">Juillet</option>
                            <option value="Août">Août</option>
                            <option value="Septembre">Septembre</option>
                            <option value="Octobre">Octobre</option>
                            <option value="Novembre">Novembre</option>
                            <option value="Decembre">Décembre</option>
                        </select>
                    </label>

                    <label for="">Mon EBE en % <br>
                        <input type="number" name="game_data"   onkeyup="if(this.value<0){this.value= this.value * -1}"  
                        step="0.01" required >
                    </label>

                    <label for=""><br>
                    <button type="submit">Ajouter</button>
                    </label>
                    <?php
                     if (!empty($errors)):?>

                        <div class="alert" width=400>
                                <ul>
                                    <?php foreach ($errors as $error): ?>   
                                    <li><?= $error; ?></li>
                                    <?php endforeach;?>
                                </ul>
                        </div>
                    <?php endif; ?>
                </form>

                </div>
            </div>

           <?php
                if($articles){
                    ?>
                     <div class="list_customer" id="main_list">
                <div class="results">
                        <table>
                            <tr>
                                <th>Date d'inscription</th>
                                <th>Mois</th>
                                <th>EBE</th>
                                <th>Classement</th>
                            </tr>
                            
                                <?php
                                        foreach($articles as $article){
                                                ?>
                                                <tr>
                                                           <td><?php
                                                        $originalDate = $article['date_of_insertion'];       
                                                        echo date("d/m/Y", strtotime($originalDate)); ?>
                                                    
                                                    </td>
                                                    <td> <?= $article['game_month'] ?></td>
                                                    <td> <?= $article['game_data'] ?></td>
                                                </tr>
                                            <?php

                                        }
                                ?>
                        </table>
                </div>
            </div>



               <?php }

            ?>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>