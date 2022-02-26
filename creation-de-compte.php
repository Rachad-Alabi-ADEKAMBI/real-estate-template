<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: tableau-de-bord.php');
    exit();
}

require_once 'traitements/db.php';
require_once 'traitements/functions.php';

//on récupère l'offre de l'adhérant
$id = $_SESSION['register']['id'];

?>

<!DOCTYPE html>
<html lang="en">
<header>
    <?php include 'meta.php'; ?>

    <title> Fares Immobilier - Création de compte</title>
    
</head>


<body>

        <div class="register" id="register"> <br>
            <form action="traitements/traitement-creation-de-compte.php" class="form" method="POST">
             

                <img src="public/images/logo.png"
                 alt="" class="form__logo">

                 <h1>
                     Création de compte
                 </h1>
                   
                    <label for="shop_area" class="form__label">
                        Pseudo: <br>
                        <input type="text" name="username" id="username" required>
                    </label> <br>

                    

                    <label class="form__label" for="">Veuillez définir un mot de passe: <br>
                 <input type="password" name="password1" required id="pass">
                 <i class="fas fa-eye" onClick="changer()" id="eye"></i>
             </label> <br>     
        
        <label class="form__label"  class="inputElemt" for="">Veuillez confirmer le mot de passe: <br>
                 <input type="password" name="password2" id="pass2" >
                 <i class="fas fa-eye fa-eyebis" onClick="changerbis()" id="eyebis"></i>
             </label> <br>

             <button type="submit" class=" inputElemt form__button"
             onClick="document.fo.submit()"  >
                 Valider
             </button>
            </form>
        </div>
    

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

      
</body>
</html>




