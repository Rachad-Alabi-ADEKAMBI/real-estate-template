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

        else if ($_GET['action'] == 'homePage') {
            homePage(); 
        }
    }
    


    else {
        homePage(); 
    }
}

catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/errorsView.php');
}
