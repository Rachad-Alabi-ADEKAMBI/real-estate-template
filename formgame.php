<!DOCTYPE html>
<html class="wide wow-animation" lang="fr">
  <head>
    <!-- Site Title-->
    <title>Participation au concours - Fineblock</title>

    <?php include ("meta.php"); ?>
      </head>
  <body>
  <?php include ("preloader.php"); ?>
    <div class="page">
      
    <?php include("header.php"); ?>

        <div class="form_layout">
            <h1 class="form_layout_title">
                Inscription au jeu concours
            </h1> <br>

            <label for="">
                <p>Entreprise</p>
                <input type="text">
            </label> <br>

            <label>
                  <p> Catégorie:</p>
                  <select name="category" id="">              
                  <option value="selectionner">Selectionner</option>
                  <option value="entreprise_individuelle">Entreprise individuelle</option>
                  <option value="entreprise_cotee">Entreprise cotée</option>
                  <option value="tpe">TPE</option>
                  <option value="pme">PME</option>
                  <option value="pmi">PMI</option>
                  <option value="eti">ETI</option>
                  </select>
              </label> <br>

             
              <br>

            <input type="submit" name="valider" class="form_layout_button" >
        </div>

        <?php include("footer.php"); ?>
    </div>
    
    <script src="js/core.min.js"> </script>
    <script src="js/script.js"></script>
    <script src="https://widgets.bitcoin.com/widget.js"></script>
    <!-- coded by Himic-->
  </body>
</html>