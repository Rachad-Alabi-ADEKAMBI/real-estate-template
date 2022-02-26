<?php session_start(); 

if(isset($_SESSION['user'])){
    header("Location: tableau-de-bord.php");
    exit;
}

include 'traitements/db.php';

include 'traitements/traitement-inscription-definitive-particuliers.php'; 

$id = $_GET['id'];
$token = $_GET['token'];



$sql = $pdo->prepare("SELECT * FROM users WHERE id = ? AND token = ?");

$sql->execute(array($id, $token));

$res = $sql->fetch();

if (!$res){
    ?>
    <script>
        alert("Combinaison incorrecte, veuillez nous contacter");
        window.location.replace("index.php");
                     exit();
    </script>
<?php
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?> 
    
    <title>Fineblock - Inscription définitive particuliers</title>
</head>

<body>
    <div class="register" id="register">
        <form action="" method="POST"  enctype="multipart/form-data"  class="form">

        <?php include 'errors.php'; ?>

   
            <a href="index.php"class="form__close" >
                <i class="fas fa-times"></i>
            </a> <br>

            <a href="index.php">
            <img src="public/images/logo-fineblock.png"
                alt="" class="form__logo">
            </a> <br>

                <label for="zip-adress" class="form__label"> 
                    Adresse postale: <br>
                    <input type="text" name="zip_adress" 
                        id="zip_adress" required >
                </label> 

                <div class="form__details">
                    <label  class=""> Ville: <br>
                        <input type="text" name="city" required >
                    </label>

                    <label  class=""> Code postal: <br>
                        <input type="number" name="zip_code" onkeyup="if(this.value<0){this.value= this.value * -1}" required >
                    </label> 
                </div>

                <label for="zip-adress" class="form__label"> 
                    Pays: <br>
                    <input type="text" name="country" 
                        id="zip_adress" required >
                </label> <br>

                <label for="zip-adress" class="form__label"> 
                    Définir un pseudo: <br>
                    <input type="text" name="username" required
                        id="zip_adress">
                </label> 

             <div class="form__details">
                <label for="mdp" class="form__label">Définir un mot de passe:
                    <input type="password" id="pass" class="box"
                    name="password1" required >
                     <i class="fas fa-eye" onClick="changer()" id="eye"></i>
                </label> <br>

                  <label class="form__label inputElemt" for="mdp2"> Confirmer le mot de passe:
                  
                    <input type="password" class="box"id="pass2"
                    name="password2" required >
                     <i class="fas fa-eye fa-eyebis" onClick="changerbis()" id="eyebis"></i>

                  </label>
             </div>

            

              <button class="form__button inputElemt submit" type="submit"
              onClick="document.fo.submit()" id="formbtoc2_submit" name="valider">valider
              </button>
        </form>  
    </div>
    
    <script src="public/js/script.js" ></script>

    <style>
        label{
            position: relative;
        }

        .fa-eye
        {
            position: absolute;
            top: 60px;
            right: 45px;
        }

         /*responsiver for 576px*/
@media screen and (min-width: 576px) and (max-width: 1023px) {
    .fa-eye
        {
            position: absolute;
            top: 60px;
            right: 45px;
        }
}


        /*responsiver for 1280px*/
@media screen and (min-width: 350px) and (max-width: 575px) {
    .fa-eye
        {
            position: absolute;
            top: 60px;
            right: 25px;
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