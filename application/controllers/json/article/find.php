<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/16/17
 * Time: 7:49 PM
 */
require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

if (isset($_GET['id'])) {
    $ArticleService = new ArticleService();
    $Article = $ArticleService->getById($_GET['id']);

    if ($Article->getId() > 0) {
        $arr = array(
            'title' => $Article->getTitle(),
            'slogan' => $Article->getQuestion(),
            'text' => $Article->getText(),
            'author' => $Article->getAuthor(),
            'date' => $Article->getDate());
        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}