<?php
    include 'traitements/traitement-definir-un-nouveau-mot-de-passe.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Définir un nouveau mot de passe</title>
</head>

<body>
      <?php include 'header.php'; ?>
      <br>
      <br>

      <div class="register">
        <form action="" method="POST" class="form">
        <?php  if (!empty($errors)):?>
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
            <br>
    
        <h1>
            Définir un nouveau mot de passe
        </h1><br>
       

        
        <label class="form__label" for="">Veuillez définir un mot de passe: <br>
                 <input type="password" name="password1" required id="pass">
                 <i class="fas fa-eye" onClick="changer()" id="eye"></i>
             </label> <br>     
        
        <label class="form__label"  class="inputElemt" for="">Veuillez confirmer: <br>
                 <input type="password" name="password2" id="pass2" >
                 <i class="fas fa-eye fa-eyebis" onClick="changerbis()" id="eyebis"></i>
             </label> <br>

             <button type="submit" class=" inputElemt form__button"
             onClick="document.fo.submit()"  >
                 Valider
             </button>

        </form>
      </div>

      <?php include 'footer.php'; ?>

      <style>
                h1{
                    margin: 5px;
                }

                p{
                    margin: 5px;
                }
                    label{
                        position: relative;
                    }

                    .fa-eye
                    {
                        position: absolute;
                        top: 35px;
                        right: 55px;
                        color: #222563;
                    }

                    .submit{
                        margin-top: 6px;
                    }

                    /*responsiver for 576px*/
            @media screen and (min-width: 576px) and (max-width: 1023px) {
                .fa-eye
                    {
                        position: absolute;
                        top: 35px;
                        right: 55px;
                    }
            }
                    /*responsiver for 350px*/
            @media screen and (min-width: 350px) and (max-width: 575px) {
                .fa-eye
                    {
                        position: absolute;
                        top: 35px;
                        right: 40px;
                    }
            }
            
    </style>
     <script>
        e=true;
        function changer(){
            if(e){
                pass= document.getElementById("pass");
                pass.setAttribute("type", "text");
                e=false;
                eye= document.getElementById("eye").setAttribute("style", "color:red");
            }else{
                pass.setAttribute("type", "password");
                eye= document.getElementById("eye").setAttribute("style", "color:$blue");
                e=true;
            }
        }

        function changerbis(){
            if(e){
                pass= document.getElementById("pass2");
                pass.setAttribute("type", "text");
                e=false;
                eyebis= document.getElementById("eyebis").setAttribute("style", "color:red");
            }else{
                pass.setAttribute("type", "password");
                eyebis= document.getElementById("eyebis").setAttribute("style", "color:$blue");
                e=true;
            }
        }

    </script>
    
    <script src="public/js/script.js" ></script>
</body>
</html>