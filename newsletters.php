<?php session_start(); 

require_once 'traitements/db.php';
require_once 'traitements/traitement-newsletters.php';

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Newsletters</title>
</head>

<body>

<?php include 'header.php'; 
include 'menu.php'; ?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading">
            <div class="dashboard-title">
           
                <h1>
                    Newsletters
                </h1>
            </div>
        </div>

        <div class="dashboard__main__background">
       
                <div class="newsletters">

                    <form  class="contact__form" method="POST" 
                    action="" enctype="multipart/form-data">
                       
                        <label for="" class="contact__form__label">
                            Objet: <br>
                            <input type="text"  name="subject" required>
                        </label> <br> <br>

                        
                        <label for="" class="contact__form__label"> Message: <br>
                        <textarea name="message" class="textarea" required id=""></textarea>
                        </label> <br><br>
                        
                        <div class="pieces">
                        <label for="" class="piece">
                            Pièce jointe 1: <br>
                            <input type="file" name="image1" multiple>
                        </label> 
                        
                        <label for="" class="piece">
                            Pièce jointe 2: <br>
                            <input type="file" name="image2" multiple>
                        </label> 

                        <label for="" class="piece">
                            Pièce jointe 3: <br>
                            <input type="file" name="image3" multiple>
                        </label>

                        <label for="" class="piece">
                            Pièce jointe 4: <br>
                            <input type="file" name="image4" multiple>
                        </label>
                        </div>

                        <br> 
                        
                        <button type="submit" class="contact__form__button" >
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>