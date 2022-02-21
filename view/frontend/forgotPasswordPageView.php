<?php // session_start(); 

$title = 'Fares Immobilier - Mot de passe oublié'; 

ob_start(); ?>  <br>
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

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>