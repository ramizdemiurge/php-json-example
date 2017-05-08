<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/16/17
 * Time: 8:26 PM
 */
require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

$ArticleService = new ArticleService();
$Article = new Article();

if (isset($_GET['article'])) {

    $mysqltime = date ("Y-m-d H:i:s", time());

    $article_json = $_GET['article'];
    $obj = json_decode($article_json, true);
    $Article->setTitle($obj['title']);
    $Article->setText($obj['text']);
    $Article->setAuthor($obj['author']);
    $Article->setQuestion($obj['slogan']);
    $Article->setDate($mysqltime);

    $success = $ArticleService->addArticle($Article);
    $array = ["succes" => $success];
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
}