<?php // session_start(); 

$title = 'Fares Immobilier - Connexion'; 

ob_start(); ?> 

    <div class="login">
           <div class="login__content">

               <div class="login__content__image">
                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80">
               </div>

               <form action="model/login.php" method="POST" name="fo" class="form">
              
                    <a href="index.php?action=home" class="form__close-btn">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>

                    

                    <h1 class="form__title">
                        Connexion
                    </h1>

                    <div class="form__label inputElemt" for="pwd"> 
                        Pseudo ou email : <br>
                        <input type="text" placeholder="Pseudo ou email" name="email" required>
                    </div> <br><br> <br>

                    <div class="form__label inputElemt" for="pwd"> 
                        Mot de passe : <br>
                    <input type="password" placeholder="Mot de passe" id="pass"
                     name="pass"  required >
                     <i class="fas fa-eye" onClick="changer()" id="eye"></i>
                    </div> 

                    <div  class="form__button inputElemt submit" 
                        onClick="document.fo.submit()"> 
                        Se connecter
                    </div>

                    <p class="form__text1">
                        Pas encore de compte ? <a href="index.php?action=register">Inscrivez-vous ici</a>
                    </p>

                    <a class="form__text2" href="index.php?action=forgotPassword">
                        Mot de passe oublié ?
                    </a>
               </form>
           </div>
    </div>
    

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>