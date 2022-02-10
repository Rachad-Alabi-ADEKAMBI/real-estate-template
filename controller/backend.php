<?php

require('model/frontend.php');
require('model/backend.php');

function dashboardPage()
{

    require "view/backend/dashboardPageView.php";
}

function logoutPage()
{
   

    require "view/backend/logoutPageView.php";
}