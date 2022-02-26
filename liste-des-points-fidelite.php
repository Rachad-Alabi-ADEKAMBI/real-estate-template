<?php session_start(); 

require_once 'traitements/db.php'; 

include 'traitements/traitement-liste-des-points-fidelite.php';

$user_id = $_SESSION['user']['id'];

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

$req =  $pdo->prepare('SELECT *
FROM tfbk_history_customers
        WHERE receiver_name LIKE ? ');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fineblock - Liste des points fidélité</title>
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
    <div class="dashboard__main__heading main-heading ">
            <div class="dashboard-title">
                
                <h1>
                    Liste des points fidélité distribués
                </h1>
                
                <p>
                    Historique de toutes les transactions de points fidélité <br>
                </p> <br>
            </div>
        </div>

        <div class="dashboard__main__background">
            <div class="transfert">
                <form class="transfert__input" method="POST" action="" > 
                    <label for="">Prénom de l'adhérant: <br> 
                        <input type="text" name="research_name">
                    </label>

                    <label for=""><br>
                        <button type="" value="rechercher" id="search_btn">
                             Recherche</button>
                    </label>       
                </form>

                <div class="transfert__result">
                    <?php
                         if (!empty ($_POST)){
                        
                            $errors = array ();
                           

                        if (empty ($_POST['research_name']) || !preg_match('/^[a-zA-Z]+$/', $_POST['research_name'])) {
                                $errors['research_name'] = "Nom non valide";
                            }
                        

                            if(empty($errors)){
                               
                                $req->execute(array("%$_POST[research_name]%"));
                           while ($datas = $req->fetch()){
                            ?> <table >;

                             <?php   echo"<tr><td>"?>
                               <?php echo $datas['receiver_name']?> </td><td>
                                   <?php echo "{$datas['quantity']} </td> 
                                   <td> "?> <button class="transfert__button">
                                   <a href="details-adherant.php?id=<?= $datas['receiver_id'] ?>">Détails</a>
                                   </button> <?php "</td></tr>\n";

                               ?> </table> <?php
                               $req->closeCursor();
                           }   

                            
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

        <div class="list_customer" id="main_list">
            <div class="results">
                                                <table>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Nom de l'adhérant</th>
                                                        <th>Volume global</th>
                                                        <th>Volume</th>
                                                    </tr>
                                                        <?php
                                                                foreach($articles as $article){
                                                                    $getQuantity = $pdo->prepare("SELECT * FROM users 
                                                                    WHERE id = ?");

                                                                    $getQuantity->execute(array($article['receiver_id']));

                                                                    while ($data = $getQuantity->fetch())
                                                                        {
                                                                            $total_quantity = $data['total_quantity'];
                                                                        }

                                                                    $row_count_formated = number_format($total_quantity, 2, ',', ' ');
                                                                    $getQuantity->closeCursor();
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php
                                                                            $originalDate = $article['date_of_operation'];       
                                                                            echo date("d/m/Y", strtotime($originalDate));

                                                                            ?></td>
                                                                            <td>
                                                                            <?php echo $article['receiver_name'];  ?>
                                                                        </td>
                                                                            <td><?= $row_count_formated ?></td>

                                                                            <td><?= number_format($article['quantity'], 2, ',', ' ') ?></td>
                                                                            <td><button  class="transfert__button">
                                                                                <a href="details-adherant.php?id=<?= $article['receiver_id']?>">
                                                                                Détails
                                                                            </button>  <i class="fas fa-eye view"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php

                                                                }
                                                        ?>
                                                </table>

                                                <ul class="pagination">
                                                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                                            <a href="liste-des-points-fidelite.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                                        </li>
                                                        
                                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                                <a href="liste-des-points-fidelite.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                                            </li>
                                                    
                                                        <?php endfor ?>

                                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                                            <a href="liste-des-points-fidelite.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                                        </li>
                                                </ul>
                                    </div>
            </div>
                                                        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>