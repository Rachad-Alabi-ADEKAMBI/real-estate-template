<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'meta.php'; ?>

    <title>Fares Immobilier - Dépôt de Manuscrit </title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="estimation">
        <div class="about__heading">
            <h1 class="about__heading__title">
            Dépôt de Manuscrit 
            </h1>

        </div>

        <div class="about__bottom">
            <div class="about__bottom__top">
                <p>Faites votre demande ici</p>

                <div class="buttons">
                  
                </div>
            </div>

            <div class="about__bottom__text">
                <p>
                    Vous avez écrit un livre ou projetez d’en écrire un, sur le domaine de l’immobilier ? <br>

                        Nous sommes spécialisés sur toutes les thématiques relatives
                        à l’économie mais aussi aux faits de société, comme la découverte 
                        d’une culture, d’un milieu social, d’un pays, etc. <br>

                        Je suis personnellement intéressé par les livres sur le domaine de l’immobilier.
                        En effet, étant directeur de collection du « Les pros de l’immo », 
                        du moment que votre ouvrage s’inscrit dans cette thématique, 
                        nous sommes ouverts à toutes les formes littéraires. <br>

                        Nous vous invitons à nous faire part de votre manuscrit par mail, format word ou pdf. 
                        En objet, inscrivez “Dépôt de manuscrit” et accompagnez votre envoie d’une présentation de
                        votre texte (synopsis, nombre de pages, format, nombre de caractères). <br>

                        Merci de nous l’envoyer par mail à l’adresse suivante : <a href="">fares@zlitni.fr</a> <br>
                        Sinon vous pouvez le déposer, sur le dépôt de manuscrit juste ci-dessous. <br>
                        Un comité de lecture statuera sur votre texte et nous vous tiendrons informés quant à la suite. <br>
                </p>
        <form action="traitements/traitement-inscription.php" method="POST" class="form">
        
                <form class='form'>
                    <h2>
                        Formulaire de dépôt     </h2>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom et Prénoms: </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email: </label>
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Téléphone: </label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Manuscrit: </label>
                            <input type="file" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Objet: </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
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