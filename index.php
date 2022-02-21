<?php
require('controller/frontend.php');
require('controller/backend.php');

try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'manuscrit') {
            manuscritPage();
        }
   
        else if ($_GET['action'] == 'dashboard') {
            dashboardPage();
        }

        else if ($_GET['action'] == 'login') {
            loginPage();
        }

        else if ($_GET['action'] == 'register') {
            registerPage();
        }

        else if ($_GET['action'] == 'forgotPassword') {
            forgotPasswordPage();
        }

        else if ($_GET['action'] == 'home') {
            homePage(); 
        }

    }
    


    else {
        homePage(); 
    }
}

catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/errors.php');
}
