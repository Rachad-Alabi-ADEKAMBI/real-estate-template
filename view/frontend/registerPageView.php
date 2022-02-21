<?php // session_start(); 

$title = 'Fares Immobilier - Connexion'; 

ob_start(); ?> 

<div class="register" id="register"> <br>
        <form action="" method="POST"  enctype="multipart/form-data"  class="form">

        <?php // include 'view/errors.php'; ?>
        
            <a href="index.php"class="form__close" >
                <i class="fas fa-times"></i>
            </a> <br>

            <a href="index.php">
            <img src="public/images/logo-fineblock.png"
                alt="" class="form__logo">
            </a> <br>

            <div class="form__details">
                    <label  class="">Nom: <br>
                        <input type="text" name="city" required >
                    </label>

                    <label  class=""> Prénoms: <br>
                        <input type="name" name="zip_code"  onkeyup="if(this.value<0){this.value= this.value * -1}" required >
                    </label> 
                </div>

              

                <div class="form__details">
                    <label  class=""> Code: <br>
                        <input type="text" name="city" required >
                    </label>

                    <label  class=""> Téléphone: <br>
                        <input type="number" name="zip_code"  onkeyup="if(this.value<0){this.value= this.value * -1}" required >
                    </label> 
                </div>


                <div class="form__details">
                    <label  class=""> Code: <br>
                        <input type="text" name="city" required >
                    </label>

                    <label  class=""> Téléphone: <br>
                        <input type="number" name="zip_code"  onkeyup="if(this.value<0){this.value= this.value * -1}" required >
                    </label> 
                </div>

                <div class="form__details">
                  

                    <label  class="">Je suis <br>
                        <select name="role" id="">
                            <option value=""> Sélectionner</option>
                            <option value="">Bailleur</option>
                            <option value="">Locataire</option>
                            <option value="">Propriétaire</option>
                        </select>
                    </label> 
                </div>




               
              <button class="form__button" type="submit"
               id="formbtoc2_submit" name="valider">valider
              </button>
        </form>  
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>