<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

require_once 'traitements/db.php';
include 'traitements/traitement-liste-des-bailleurs.php';

$req =  $pdo->prepare("SELECT *
FROM users WHERE role = 'bailleur'
     AND  first_name LIKE ? ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fares Immobilier - Liste des bailleurs</title>
</head>

<body>

<?php include 'header.php';
  include 'menu.php';  ?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading main-heading ">
            <div class="dashboard-title">
                
                <h1>
                    Liste des bailleurs
                </h1>
                
                <p>
                    La liste des bailleurs <br>
                </p> <br>
            </div>
        </div>

        <div class="dashboard__main__background">
            <div class="transfert">
                <form class="transfert__input" method="POST" action="" > 
                    <label for="">Nom du bailleur: <br> 
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
                            
                                if(!$datas){ ?>
                                    <p class="nothing-to-display">
                                        Aucun résultat
                                    </p>
                                <?php } 

                                else{ ?>
                                        <table >

                                            <?php   echo"<tr><td>"?>
                                            <?php echo $datas['first_name'].' '.$datas['last_name'] ?> </td>
                                                <?php echo "<td> "?> <button class="transfert__button">
                                                <a href="fiche-client.php?id=<?= $datas['id'] ?>">Détails
                                                </button><i class="fas fa-eye view"></i> </a><?php "</td></tr>\n";

                                            ?> 
                                        </table>
                                <?php } 
                            
                            
                               $req->closeCursor();
                           }   

                            
                            

                        
                         }

                         if (!empty($errors)):?>

                            <?php include 'errors.php';  ?>
                            <?php endif; ?>
                </div>
            </div>

            <div class="list_customer" id="main_list">
                <div class="results">
                        <?php 
                            if(!$articles){ ?> 
                                <p class="nothing-to-display">
                                    Aucun élément à afficher
                                </p>
                            <?php }

                            else { ?>
                                <table>
                                    <tr>
                                        <th>Date d'inscription</th>
                                        <th>Nom du bailleur</th>
                                        
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                        ?>
                                                        <tr>
                                                        <td><?php
                                                                $originalDate = $article['date_of_insertion'];       
                                                                echo date("d/m/Y", strtotime($originalDate)); ?>
                                                            
                                                            </td>

                                                            <td>
                                                            <?php echo $article['first_name'].' '.$article['last_name'] ?>
                                                            </a></td>
                                                            <td><button  class="transfert__button">
                                                            <a href="fiche-client.php?id=<?= $article['id'] ?>">
                                                                                            Détails
                                                                                        </button>  <i class="fas fa-eye view"></i></a>
                                                                                        </td>
                                                        </tr>
                                                    <?php

                                                }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <ul class="pagination">
                                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                            <a href="liste-des-bailleurs.php?page=<?= $currentPage - 1 ?>"" class="page-link">Précédente</a>
                                        </li>
                                        
                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                <a href="liste-des-bailleurs.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                            </li>
                                    
                                        <?php endfor ?>
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                            <a href="liste-des-bailleurs.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                        </li>
                                    </ul>
                                            </td>
                                        </tr>
                                </table>
                            <?php   }
                            



                        ?>
                </div>
<?php


                     ?> 
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>