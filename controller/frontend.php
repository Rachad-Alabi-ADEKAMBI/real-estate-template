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

function registerPage()
{
   

    require "view/frontend/registerPageView.php";
}

function forgotPasswordPage()
{

    require "view/frontend/forgotPasswordPageView.php";
}

function home()
{

    require "view/frontend/homePageView.php";
}