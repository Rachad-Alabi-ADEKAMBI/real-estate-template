<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Fineblock - Confirmation distribution jeu concours</title>
</head>
<body>
    <form  class="confirmation" action="" method="POST">
       
        <h1 class="confirmation__title">
            Voulez vous confirmer cette opération ?
        </h1>

        <h2 class="confirmation__subtitle">
            Distribution de  <?php echo number_format($_GET['quantity'], 4, ',', ' ');  ?> points fidélité
             pour le jeu concours
        </h2>
        
        <div class="confirmation__buttons">
                <button type="submit" value="confirmer" class="confirmation__buttons__confirm" id="validate_btn" > 
                    <a href="traitements/traitement-transfert-jeu-concours.php?quantity=<?php echo $_GET['quantity']  ?>">Confirmer</a>
              </button>   

            <button 
                class="confirmation__buttons__cancel" id="cancel_btn" >
                <a href="operation-transfert-jeu-concours.php"> Annuler</a>
            </button>
        </div>

            </form>
            
</body>
</html>