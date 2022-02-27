<?php
    include 'traitements/traitement-mot-de-passe-oublie.php'; 
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Mot de passe oublié</title>
</head>

<body>
      <?php include 'header.php'; ?>
      <br> <br>

      <div class="register">
        <form action="" method="POST" class="form"  >
        <a href="index.php" class="form__close-btn"  style="float: right;
             margin: auto 15px auto auto"; >
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a> <br>

        <h1>
            Réinitialiser le mot de passe
        </h1>

             <label class="form__label" for="">Email ou Pseudo: <br>
                 <input type="text" name="email" >
             </label> 

             <button type="submit" class="form__button" >
                 Valider
             </button>
        </form>
      </div>

      <?php include 'footer.php'; ?>
    
    <script src="public/js/script.js" ></script>
</body>
</html>