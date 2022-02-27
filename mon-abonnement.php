<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
/*
require_once 'traitements/db.php'; 
require_once 'traitements/traitement-mon-abonnement.php'; 

*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fares Immobilier - Mon abonnement</title>
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
        <div class="dashboard__main__heading dashboard-main">
            <div class="dashboard-title">
                
                <h1>
                   Etat de votre abonnement
                </h1> <br>
                <p class="dashboard__disclaimer">
                  </p>

               
            </div>
        </div>

        <div class="dashboard__main__background">
            <div class="account">

                <ol>
                    <li>
                    Role: <span>
                        <?php echo $_SESSION['user']['role']; ?>
                    </span>
                    </li>
                    <li>
                    Dernier règlement:  <span>
                   26/02/2022
                    
                </span>
                    </li>
                    <li>
                    Prochain règlement:  <span>
                   26/02/2023
                    
                </span>
                    </li>
             </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>