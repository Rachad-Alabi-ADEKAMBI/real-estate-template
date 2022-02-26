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
   <div class="container">
   <form  class="confirmation" action="" method="POST">
       
       <h1 class="confirmation__title">
           Voulez vous confirmer cette opération ?
       </h1>

       <h2 class="confirmation__subtitle">
           Transfert de <?php echo  $_SESSION['transfert']['quantity']; ?> points fidélité
       </h2>
       
       <div class="confirmation__buttons">
               <button type="submit" value="confirmer" 
               class="confirmation__buttons__confirm" id="validate_btn" >
                       <a href="traitements/traitement-transfert-entre-adherants.php">Confirmer</a>
               </button>   

           <button id="cancel_btn"
               class="confirmation__buttons__cancel">
               <a href="transfert-aux-adherants.php"> Annuler</a>
           </button>
       </div>

   </form>
   </div>
</body>
</html>