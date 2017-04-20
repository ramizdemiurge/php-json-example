<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/20/17
 * Time: 10:55 PM
 */
require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

if (isset($_GET['id'])) {
    $ArticleService = new ArticleService();
    $Article = $ArticleService->getById($_GET['id']);

    $success = false;

    if ($Article->getId() > 0) {
        $success = $ArticleService->delete($Article);
    }
    $array = ["succes" => $success];
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
}