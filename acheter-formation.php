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
                   Acheter une nouvelle formation
                </h1>
                
                <p>
                    Veuillez remplir pour publier une nouvelle annonce<br>
                </p> <br>
            </div>
        </div>

        <div class="dashboard__main__background">
            <div class="transfert">
              
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
                     <p class="nothing-to-display">
                         En cours de création
                     </p>
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