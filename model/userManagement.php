<?php

/**
 * @file      userManagement.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   19.11.2021
 */
/*
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
*/
function checkLoginDB($data)
{
    $email = $data['email'];
    $pwd = $data['userPswd'];

    $query = "SELECT userHashPsw FROM users WHERE userEmailAddress =:femail";
    $params = array(":femail" => $email);

    $queryResult = executeQuerySelect($query, $params);
    //$hashed = '$2y$10$KiKja1KkYTJgLBmyHKGKeO8Oghsr/9s4iwGEQ18q4.vLcP2IHUsiC';

    if(count($queryResult) > 0 && password_verify($pwd, $queryResult[0]["userHashPsw"]))
        return true;
    else
        return false;
}

/**
 * @brief This function is designed to verify user's login
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : users's password
 * @return bool : "true" only if the user and psw match the database. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;

    $loginQuery = "SELECT userHashPsw FROM users WHERE userEmailAddress =:femail";

    require_once 'model/dbConnector.php';
    $params = array(':femail' => $userEmailAddress);
    $queryResult = executeQuerySelect($loginQuery,$params);

    if (count($queryResult) == 1) {
        $userHashPsw = $queryResult[0]['userHashPsw'];
        //if password is not hashed
        //$result = ($userPsw == $userHashPsw);
        $result = password_verify($userPsw, $userHashPsw);
    }
    return $result;
}

function registerLogin($email, $pwd){
    $result = false;

    $loginQuery = "insert into users(userEmailAddress, userHashPsw, isAdmin) VALUES	(:femail, :fpwd, 0)";

    $userHashPsw = password_hash($pwd, PASSWORD_DEFAULT);

    require_once 'model/dbConnector.php';
    $params = array(':femail' => $email,':fpwd' => $userHashPsw);
    return executeQueryInsert($loginQuery,$params);

}

function CheckOrUpdateHash($data)
{

}
?>