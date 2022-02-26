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
    
    <title>Fineblock - Confirmation du transfert pour achat</title>
</head>
<body>
    <form  class="confirmation" action="" method="POST">
       
        <h1 class="confirmation__title">
            Voulez vous confirmer cette opération ?
        </h1>

        <h2 class="confirmation__subtitle">
            Transfert de <?php echo  number_format($_GET['quantity'], 0, ',', ' '); ?> TFBK
        </h2>
        
        <div class="confirmation__buttons">
                <button type="submit" value="confirmer" 
                class="confirmation__buttons__confirm" id="validate_btn" >
               

                    <?php if ($_SESSION['user']['role'] === 'admin') {
                        ?>
                        <a href="transfert.php?quantity=<?php echo $_GET['quantity']?>">Confirmer</a>
                        <?php
                    }

                    ?>
                </button>   

            <button id="cancel_btn"
                class="confirmation__buttons__cancel">
                <a href="operation-transfert.php"> Annuler</a>
            </button>
        </div>

            </form>
                 <script>
                    let validate_btn = document.getElementById("validate_btn");
                    let cancel_btn = document.getElementById("cancel_btn");
                    
                    validate_btn.addEventListener("click", function(){
                        alert("Opération en cours, cela pourrait prendre quelques secondes, Merci de patienter");
                    validate_btn.classList.add("invisible");
                    cancel_btn.classList.add("invisible");
                    })
                </script>
</body>
</html>