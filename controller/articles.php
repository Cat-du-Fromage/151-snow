<?php

/**
 * @file      articles.php
 * @brief     File description
 * @author    Created by Florian.DURUZ
 * @version   03.12.2021
 */
/*
function displayArticles()
{
    $query = "SELECT * FROM snows";

    $queryResult = executeQuerySelect($query);
}
*/

require "model/articlesManager.php";

function displayArticles()
{
    try
    {
        $articlesList = findArticles(); // Get From => model/articlesManager
    }
    catch (Exception $ex)
    {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher nos produits. Désolé du dérangement !";
    }
    finally
    {
        require "view/articles.php";
    }
}

function displayArticleDetail($articleId)
{
    try
    {
        $articlesInfo = findArticleWithId($articleId);
    }
    catch (Exception $ex)
    {
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher le produit demandé. Désolé du dérangement !";
    }
    finally
    {
        require "view/article-detail.php";
    }
}
?>