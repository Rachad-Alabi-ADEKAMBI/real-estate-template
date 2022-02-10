<?php

require('model/frontend.php');
require('model/backend.php');

function homePage()
{
   

    require "view/frontend/indexView.php";
}



function manuscritPage()
{
   

    require "view/frontend/manuscritPageView.php";
}

function loginPage()
{
   

    require "view/frontend/loginPageView.php";
}

function preHome()
{

    require "view/frontend/preHomePageView.php";
}