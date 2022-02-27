<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Mes factures</title>
</head>

<body>
    <?php include 'header.php'; ?>

<div class="dashboard">
    <div class="dashboard__menu">
    <?php 
                include 'menu-du-tableau-de-bord.php'; ?>


    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading">
            <div class="dashboard-title">
                <h1>
                    Vos factures
                </h1>
                
                <p>
                   Voici la liste de vos factures
                </p>
            </div>
        </div>

        <div class="dashboard__main__background">
            <div class="bills">
                <ul class="bills__content">
                    <li>
                        Numero facture
                    </li>

                    <li>
                        Date d'émission
                    </li>

                    <li>
                        Total TFBK
                    </li>

                    <li>
                        Montant HT
                    </li>

                    <li>
                        TVA
                    </li>

                    <li>
                        Montant TTC
                    </li>

                    <li>
                        Télécharger
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>