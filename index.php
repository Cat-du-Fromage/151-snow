<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   26-MAR-2021
 */

session_start();

require "controller/navigation.php";
require "controller/user.php";
require "controller/articles.php";
require "model/dbConnector.php";

if (isset($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action)
    {
        case 'home' :
            home();
            break;
        case 'displayArticles' :
            displayArticles(); // in Controller: articles
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'register' :
            register($_POST);
            break;
        default :
            lost();
    }
}
else
{
    home();
}