<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

if($_SESSION['user']['role'] == 'admin'){
    header("Location: annonces.php");
    exit;
}

include 'traitements/db.php';
include 'traitements/traitement-espace-personnel.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <title>Fineblock - Espace personnel</title>

      <?php include 'meta.php'; ?>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="bourse">
        <div class="bourse__top">
            <div class="bourse__top__infos first">
                <h1>
                    Espace personnel bourse
                </h1> 
            </div>

            <div class="bourse__top__infos">
                <br><br><br><br>
            <a href="public/images/Shopping Center Prestige.pdf"class="first_link">
                    Comment ça marche ?
                </a>

            </div>

            <div class="bourse__top__infos second">
                    <?php 
                            $total_ads = $articles->rowCount();
                            $total_sellings = $selled->rowCount();
                            $total_orders = $orders->rowCount();
                    ?>
                    <p>
                        Articles publiés: <span><?php echo number_format($total_ads, 0, ',', ' ')?></span>
                    </p> <br>

                    <p>
                        Ventes effectuées: <span><?php echo number_format($total_sellings, 0, ',', ' ')?></span>
                    </p> <br>

                    <p>
                        Achats effectués: <span><?php echo number_format($total_orders, 0, ',', ' ')?></span>
                    </p>
            </div>

            <div class="bourse__top__infos third">
                <button class="yellow-btn">
                    <a href="annonces.php">
                        Annonces
                    </a>
                </button>  

                <button class="yellow-btn" >
                    <a href="mes-annonces.php">
                        Mes annonces
                    </a>

                </button>

                <button class="blue-btn" >
                    <a href="nouvelle-annonce.php">
                        Nouvelle annonce
                    </a>
                </button>

                <button class="blue-btn" >
                    <a href="messages.php">
                        Messages
                    </a>
                </button>
            </div>
        </div>

        <div class="bourse__bottom">
            <div class="bourse__bottom__content">

                <div class="bourse__bottom__content__links">
                    <div class="sellings-box">
                        <i class="fas fa-store"></i> <br>
                        <button>
                            <a href="mes-ventes.php">
                                Etat de mes ventes
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </button>
                    </div>

                    <div class="orders-box">
                    <i class="fas fa-shopping-cart"></i> <br>
                        
                        <button>
                            <a href="mes-achats.php">
                                Etat de mes achats
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        


    </div>
    <?php include 'footer.php'; ?>
    
</body>
</html>