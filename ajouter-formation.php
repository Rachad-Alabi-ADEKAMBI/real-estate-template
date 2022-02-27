<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/traitement-ajouter-formation.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Fares Immobilier Nouvelle formation</title>
</head>

<body>
    <div class="register" id="register">
        <form action="" method="POST" class="form"  enctype="multipart/form-data">
        <?php
        if (!empty($errors)):?>
                <div class="alert" width=400>
                    <p>
                        Vous n'avez pas rempli le formulaire correctement
                    </p>
                    <ul>
                        <?php foreach ($errors as $error): ?>   
                            <li><?= $error; ?></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif; ?>

            <a href="liste-des-formations.php" class="form__close" >
                <i class="fas fa-times"></i>
            </a> <br>

            <h2 class="form__title" >
                Nouvelle formation
            </h2>
                    
              
                    <label for="email" class="email">
                        Nom de la formation: <br>
                        <input type="text" name="name" required>
                    </label> <br>

                    <label for="email" class="filename">
                        Fichier: <br>
                        <input type="file" name="filename" required>
                    </label> <br>
                  
                  

                    <label for="email" class="email">
                        Commentaires: <br>
                        <input type="text" name="comment" required>
                    </label> <br>
                  
                <button type="submit" class="form__button">
                    Confirmer
                </button>
            </form>
        </div>
    </div>
    <script src="public/js/script.js" ></script>
</body>
</html>