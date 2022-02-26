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
    
    <title>Fineblock - Confirmation du transfert</title>
</head>
<body>
    <form  class="confirmation" action="" method="POST">
       
        <h1 class="confirmation__title">
            Voulez vous confirmer cette opération ?
        </h1> <br>

        <h2 class="confirmation__subtitle">
            Transfert de <?php echo  number_format($_SESSION['customer']['quantity'], 2, ',', ' '); ?> points fidélité
        </h2>
        
        <div class="confirmation__buttons">
                <button type="submit" value="confirmer" 
                class="confirmation__buttons__confirm" id="validate_btn" >
                        <a href="traitements/traitement-transfert-points-fidelite.php">Confirmer</a>
                     
                </button>   

            <button id="cancel_btn"
                class="confirmation__buttons__cancel">
                <a href="tableau-de-bord.php"> Annuler</a>
            </button>
        </div>

            </form>
                
</body>
</html>