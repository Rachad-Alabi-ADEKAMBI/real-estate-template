<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

require_once 'traitements/db.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fares Immobilier - Emissions</title>
</head>

<body>

<?php include 'header.php';
include 'menu.php'; 
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading dashboard-main short-heading">
            <div class="dashboard-title">
                
                <h1>
                   Emissions
                </h1> 
                <p>
                L'essentiel de l'investissement immobilier : volez vers votre liberté financière est disponible dans toutes les plateformes libraires européennes, mais aussi à l'étranger dont la Tunisie.
                </p>
            </div>
        </div>

        <div class="dashboard__main__background">
           <div class="account">
               <h2 class="account__title">
               </h2>
               <div class="account__content">
                
                <iframe width="250" height="130" src="https://www.youtube.com/embed/bfFZLrktmw8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               <iframe width="250" height="130" src="https://www.youtube.com/embed/MWrobUdl8q8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               <iframe width="250" height="130" src="https://www.youtube.com/embed/oYSt_ETGvlo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   
                       
                             </div>
           </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>