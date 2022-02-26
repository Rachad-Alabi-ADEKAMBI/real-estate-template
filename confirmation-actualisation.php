<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

$quantity = $_SESSION['tfbk']['quantity'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Fineblock - Confirmation de l'actualisation</title>
</head>
<body>
   <div class="container">
   <form  class="confirmation" action="traitements/traitement-actualisation.php" 
        method="POST">      
        <h1 class="confirmation__title">
            Voulez vous confirmer cette opération ?
        </h1>

        <h2 class="confirmation__subtitle">
            Ajout de <?php echo number_format($quantity, 0, ',', ' '); ?> points fidélité
        </h2>

        <div class="confirmation__buttons">
            <button type="submit" value="confirmer"
                class="confirmation__buttons__confirm">
                <a href="traitements/traitement-actualisation.php">confirmer</a>
            </button>

            <button id="cancel_btn"
                class="confirmation__buttons__cancel">
                <a href="actualisation-du-stock.php"> Annuler</a>
            </button>
        </div>

    </form>
   </div>

            
</body>
</html>