<?php

/**
 * @file      articlesManager.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   03.12.2021
 */

function findArticles()
{
    $articlesQuery = "SELECT id, brand, model, code, qtyAvailable, price, photo, snowlength from snows";

    require_once 'model/dbConnector.php';
    $params = array();
    return executeQuerySelect($articlesQuery,$params);
}

function findArticleWithId($articleId)
{
    $articleQuery = "SELECT id, brand, model, code, qtyAvailable, price, photo, description, descriptionfull, snowlength, level, audience from snows where code = :code";

    require_once 'model/dbConnector.php';
    $params = array(":code"=>$articleId);
    $articlesDetail = executeQuerySelect($articleQuery,$params);

    return $articlesDetail[0];

}
?>