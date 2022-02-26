<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'meta.php'; ?>

    <title>Fares Immobilier - Estimation immobilière </title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="estimation">
        <div class="estimation__heading">
            <h1 class="estimation__heading__title">
                Estimation immobilière
            </h1>

        </div>

        <div class="estimation__bottom">


            <div class="estimation__bottom__text">

            <p>
            Remplissez ces avec les informations de votre bien puis confirmer votre demande en passant commande avec le bouton juste après
            </p>
            
        <form action="" method="POST" class="form">
        
                <form class='form'>
                    <h2>
                        Estimation immobilière
                     </h2>

                        <div class="row">
                            <div class="col">
                                <label for="exampleInputPassword1" class='col=12'>Nature du bien
                                        <select type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                                            <option value="">Veuillez sélectionner</option>
                                        <option value="Appartement">Appartement</option>
                                        <option value="Maison">Maison</option>
                                        </select>
                                    </label>
                           </div>

                           <div class="col">
                                <label for="exampleInputPassword1" class='col=6'>Type
                                    <select type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                                        <option value="">Veuillez sélectionner</option>
                                    <option value="T1">T1</option>
                                    <option value="T1">T1 Bis</option>
                                    </select>
                                </label>
                           </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <label for="exampleInputPassword1" class='col=12'>Numéro de l´etage
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Ex: Numéro / Adresse / Complément Adresse / Code Postal / Ville / Pays">
                 
                                    </label>
                           </div>

                           <div class="col">
                                <label for="exampleInputPassword1" class='col=6'>Avec ascenceur
                                    <select type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                                        <option value="">Veuillez sélectionner</option>
                                    <option value="T1">Oui</option>
                                    <option value="T1">Non</option>
                                    </select>
                                </label>
                           </div>
                        </div> <br>


                        <div class="row">
                            <div class="col">
                            <label for="exampleInputPassword1" class='col=6'>Immeuble:
                                    <select type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                                        <option value="">Veuillez sélectionner</option>
                                    <option value="T1">Grand standing</option>
                                    <option value="T1">Standing</option>
                                    <option value="T1">Normal</option>
                                    
                                    </select>
                                </label>
                           </div>

                           <div class="col">
                                <label for="exampleInputPassword1" class='col=6'>Usage du bien: 
                                    <select type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                                        <option value="">Veuillez sélectionner</option>
                                    <option value="T1">Habitation</option>
                                    <option value="T1">Mixte</option>
                                    <option value="T1">Professionnels</option>
                                    </select>
                                </label>
                           </div>
                        </div> <br>

                        <div class="row">
                            <div class="col-10">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Adresse du bien: </label>
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date de visite: </label>
                                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="">
                                </div>
                            </div> 

                            <div class="col">
                            <label for="exampleInputPassword1" class='col=6'>Elément non visité ?
                                <select type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                                    <option value=""></option>
                                   <option value="T1">Oui</option>
                                   <option value="T1">Non</option>
                                </select>
                            </label>
                            </div>

                        </div>
                        
                        <button type="submit" class="form__submit">
                                                Valider
                                            </button>

                    </form>

            </div>
        </div>

    <?php include 'footer.php'; ?>  
</body>
</html>