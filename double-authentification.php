<?php
    include 'traitements/traitement-double-authentification.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Double authentification</title>
</head>

<body>
      <?php include 'header.php'; ?>

      <div class="register">
        <form action="" method="POST" class="form"  >

        <a href="index.php" class="form__close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>  <br>

        <h1>
            Double authentification
        </h1><br>

        <?php
                     if (!empty($errors)):?>

                        <div class="alert" width=400>
                                <ul>
                                    <?php foreach ($errors as $error): ?>   
                                    <li><?= $error; ?></li>
                                    <?php endforeach;?>
                                </ul>
                        </div>
                    <?php endif; ?>


             <label class="form__label" for="">Veuillez entrer le code reçu par email: <br>
                 <input type="text" name="authentification" >
             </label> <br>

             <button type="submit" class="form__button" >
                 Valider
             </button> <br>

             <a href="re-traitement-double-authentification.php">Aucun code reçu ? cliquez ici</a> 
        </form>
      </div>

      <?php include 'footer.php'; ?>
    
    <script src="public/js/script.js" ></script>
</body>
</html>