<?php
/**
 * @file      controller.php
 * @brief     Controller
 * @author    Created by Frederique.ANDOLFATT
 * @version   08.11.2021
 */


/**
 * @brief This function is designed to redirect the user to the home page (depending on the action received by the index)
 */
function home()
{
    require "view/home.php";
}

/**
 * @brief This function is designed to redirect the user to the home page (depending on the action received by the index)
 */
function articles()
{
    require "view/articles.php";
}

/**
 * @brief This function is designed to inform the user that the resource requested doesn't exist (i. e. if the user modify the url manually)
 */
function lost()
{
    require "view/lost.php";
}
