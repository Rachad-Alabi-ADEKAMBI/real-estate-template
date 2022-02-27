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
        <div class="dashboard__menu__list">
            <div class="menu-link">
                <a href="espace-professionel.php">Tableau de bord</a>
            </div>

            <div class="menu-link">
                <a href="inscription-ebe.php">Inscrire mon EBE</a>
            </div>

            <div class="menu-link ">
                <a href="transfert.php">Transfert à un particulier</a>
            </div>

            <div class="menu-link">
                <a href="achat-de-carnets.php">Achat de carnets</a>
            </div>

            <div class="menu-link menu-link-active">
                <a href="#">Voir mes factures</a>
            </div>
        </div>


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

            <div class="dashboard-infos">
                <div class="user-logo">
                    0
                </div>

                <div class="user-name">
                    0
                </div>
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