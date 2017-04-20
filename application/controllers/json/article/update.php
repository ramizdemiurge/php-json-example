<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/20/17
 * Time: 10:55 PM
 */

require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

$ArticleService = new ArticleService();
$Article = new Article();

if (isset($_POST['article'])) {

    //$mysqltime = date ("Y-m-d H:i:s", time());

    $article_json = $_GET['article'];
    $obj = json_decode($article_json, true);
    $Article->setId($obj['id']);
    $Article->setTitle($obj['title']);
    $Article->setText($obj['text']);
    $Article->setAuthor($obj['author']);
    $Article->setQuestion($obj['slogan']);
    //$Article->setDate($mysqltime);

    $success = $ArticleService->editArticle($Article);
    $array = ["succes" => $success];

    echo json_encode($array, JSON_UNESCAPED_UNICODE);
}