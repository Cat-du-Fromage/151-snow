<?php

/**
 * @file      userManagement.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   19.11.2021
 */

function checkLogin($data) : bool
{
    //retrieve + store Json
    $users = file_get_contents("C:/temp/users.json"); //CAREFUL IF FORKED, change to "model/users.json"
    $tabUsers = json_decode($users, true);

    $email = $data['email'];
    $pwd = $data['userPswd'];
    //read / pass through the values
    foreach ($tabUsers as $key => $value)
    {
        foreach ($value as $entry => $tabLogin)
        {
            if(in_array($email, $tabLogin, true) && in_array($pwd, $tabLogin, true))
            {
                return true;
            }
        }
    }
    return false;
    //check is json contains the email
}
?>