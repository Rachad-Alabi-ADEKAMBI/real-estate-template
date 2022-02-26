<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/traitement-contact-support.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Contact</title>
</head>
<body>
<?php include 'header.php'; ?>

   <div class="contact">
   <form  class="contact__form" action="" method="post">
            <a href="tableau-de-bord.php">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>    

        <h1 class="contact__form__title">
            Contacter le support
        </h1>

        <?php if ($_SESSION['user']['role'] == 'btob') {?>
            <label for="" class="contact__form__label">
            Objet: <br>
            <input type="text" name="subject" >
        </label> <br> <br>

        <?php }

            if( $_SESSION['user']['role'] == 'btoc'){?>
                <label for="" class="contact__form__label">
                Objet: <br>
                <select type="text" name="subject" required >
                <option value="">Veuillez selectionner</option>
                    <option value="Renseignements">Renseignements</option>
                    <option value="Annulation adhésion">Annulation adhésion</option>
                    <option value="Autres">Autres</option>
                </select>
            </label> <br> <br>
            <?php } ?>

        <label for="" class="contact__form__label"> Votre message: <br>
        <textarea name="message" class="textarea" required id="" <?php
            if ($_SESSION['user']['role'] == 'btoc'){?>
            placeholder="Pour une annulation veuillez nous fournir le motif et vos coordonnées bancaires"    
        <?php } ?>></textarea>
       </label> <br><br>

        <button type="submit" class="contact__form__button" >
            Valider
        </button>
    </form>
   </div>
    
</body>
</html>