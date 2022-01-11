<?php

/**
 * @file      user.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   16.11.2021
 */

require "model/userManagement.php";

/**
 * @brief get login page
 */
function login($data) : void
{
    //check email is set, when coming from login page.
    if (isset($data))
    {
        if(/*checkLogin($data)*/ checkLoginDB($data))
        {
            $_SESSION["email"] = $data["email"];
            require "view/home.php";
        }
        else
        {
            $errorMsg = "Identifiant(s) incorrect";
            require "view/login.php";
        }

        //require checkLogin() ? "view/home.php" : "view/login.php";
    }
    else
    {
        require "view/login.php";
    };
}

function register($loginRequest) {

    if (isset($loginRequest['userPswd']) && isset($loginRequest['email']) && isset($loginRequest['userPswd2'])) {
        if ($loginRequest['userPswd'] != $loginRequest['userPswd2']) {
            $errorMsgRegister = "Pwd différents";
            require "view/register.php";
        } else {
            if (registerLogin($loginRequest["email"], $loginRequest["userPswd"])) {
                createSession($loginRequest["email"]);
                require "view/home.php";
            } else {
                $errorMsgRegister = "Erreur insertion user";
                require "view/register.php";
            }
        }
    } else {
        require "view/register.php";
    }
}

function createSession($email) {
    $_SESSION['email'] = $email;
}

function logout() : void
{
    session_destroy();
    $_SESSION = array();
    require "view/home.php";
}