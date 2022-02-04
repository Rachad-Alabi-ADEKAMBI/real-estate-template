<?php session_start(); 

$title = 'Fineblock - Accueil'; 

ob_start(); ?> 
    <div class="header">

    </div>

    <div class="heading">
        <h1 class="heading___title">
            Fares Immobilier
        </h1>

        <div class="heading__search">
            <ul>
                <li>
                    <div class="icon">

                    </div>

                    Appartements
                </li>

                <li>
                    <div class="icon">

                    </div>

                    Bureaux
                </li>

                <li>
                    <div class="icon">

                    </div>

                    Bureaux
                </li>
                <li>
                    <div class="icon">

                    </div>

                    Restaurants
                </li>

                <li>
                    <div class="icon">

                    </div>

                    Studios
                </li>

                <li>
                    <div class="icon">

                    </div>

                    Villas
                </li>
            </ul>

            <div class="heading__search__bar">
                <form action="" method="POST">
                    <input type="text" name="keyword">
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>