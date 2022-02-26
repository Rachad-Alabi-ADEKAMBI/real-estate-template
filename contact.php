<?php session_start(); 

if(isset($_SESSION['user'])){
    header("Location: contact-support.php");
    exit;
}

include 'traitements/traitement-contact.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock-Contact</title>
</head>
<body>
<?php include 'header.php'; ?>

   <div class="contact">
     <form  class="contact__form" method="POST" action="" >
            <a href="index.php">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>    

        <h1 class="contact__form__title">
            Contactez-nous pour un rendez-vous  <br>
             <i class="fas fa-phone-square-alt"></i>
        </h1>

        <div class="contact__form__details">
        <label for="" class="">
            Prénom: <br>
            <input type="text" name="first_name" required>
        </label>

        <label for="" class="">
            Nom: <br>
            <input type="text"  name="last_name" required>
        </label> 
        </div> <br>

        <label for="" class="contact__form__label">
                Adresse email: <br>
            <input type="text"  name="email" required>
        </label> <br><br>

        <label for="" class="contact__form__label">
            Objet: <br>
            <input type="text"  name="subject" required>
        </label> <br> <br>

        <label for="" class="contact__form__label"> Votre message: <br>
        <textarea name="message" class="textarea" required id=""></textarea>
        </label> <br><br>

        <button type="submit" class="contact__form__button" >
            Valider
        </button>
        </form>
   </div>
    <?php include 'footer.php'; ?>
</body>
</html>