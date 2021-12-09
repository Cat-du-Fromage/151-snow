<?php

/**
 * @file      articles.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   03.12.2021
 */

function displayArticles()
{
    $query = "SELECT * FROM snows";

    $queryResult = executeQuerySelect($query);
}
?>