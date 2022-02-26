<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

require_once 'traitements/db.php';
include 'traitements/traitement-historique-des-conversions.php';

$req =  $pdo->prepare('SELECT * FROM conversions
        WHERE username LIKE ? ');


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Historique des règlements</title>
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
                    Historique des  conversions
                </h1>
                
                <p>
                    La liste des conversions<br>
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
                          $datas = $req->fetch();

                          if($datas){
                             echo "<table border='1'>";

                               echo"<tr><td>"?>
                               <?php echo "{$datas['username']}"?> </td><td>
                                   <?php "</td></tr>\n";

                               echo "</table>";
                               $req->closeCursor();
                            }
                            else{
                                ?>
                                <p class="nothing-to-display">
                                    Acun résultat !
                                </p>
                                <?php
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

                <?php if($articles){ ?>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Nom de l'adhérant</th>
                            <th>Volume</th>
                            <th>Volume restant</th>
                        </tr>
                        
                            <?php
                                    foreach($articles as $article){
                                        ?>
                                            <tr>
                                        
                                            
                                                <td>

                                    <?php
                                                $originalDate = $article['date_of_insertion'];       
                                                echo date("d/m/Y", strtotime($originalDate)); ?>
                                                

                                                </td>

                                                <td> <?php echo $article['username']?> </td>

                                                <td> <?php echo $article['quantity'] ?> </td> 

                                                <td> <?php echo $article['final_quantity'] ?> </td> 
                                            <?php

                                    }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                <ul class="pagination">
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                <a href="historique-des-conversions.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                            </li>
                            
                            <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                    <a href="historique-des-conversions.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                </li>
                        
                            <?php endfor ?>
                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                <a href="historique-des-conversions.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                            </li>
                        </ul>
                                </td>
                            </tr>
                    </table>
                <?php } 

                else{
                    ?> 
                    <p class="nothing-to-display">
                        Aucun élément à afficher
                    </p>
                <?php } ?>
            </div>
<?php



/*
                    $req = $pdo->query('SELECT users.id, btoc.last_name,  btoc.first_name,
                        btoc.date_of_payment
                    FROM users
                    INNER JOIN btoc
                        ON btoc.user_id = users.id
                    ORDER BY last_name ASC;');

                    echo "<table border='1'>";
                    echo"<tr><td>Nom et Prenom</td><td>Volume global</td><td>Date d'adhésion</td><td>Id de l'adhérant </td></tr>\n";
                    

                    while ($datas = $req->fetch()){ 
                        $getQuantity = $pdo->prepare("SELECT id FROM tfbk 
                        WHERE fk_owner_id = ?");
                     
                     $getQuantity->execute(array($datas['id']));
                     
              $row_count = $getQuantity->rowCount();
              $row_count_formated = number_format($row_count, 0, ',', ' ');

                        echo"<tr><td>"?><a href="fiche-particuliers.php?id= <?= $datas['id'] ?>"> 
                        <?php echo "{$datas['last_name']} {$datas['first_name']} "?> 
                        </a> <?php echo" </td><td>$row_count_formated</td><td> {$datas['date_of_payment']} </td>
                            <td> {$datas['id']} </td></tr>\n";

                           
                        }

                        echo "</table>";
                     $req->closeCursor();
                     */
                     ?> 
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>