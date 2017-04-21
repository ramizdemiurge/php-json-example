<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/16/17
 * Time: 8:10 PM
 */
require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

$ArticleService = new ArticleService();
$Articles = $ArticleService->getAll();

$array_posts = array();

for ($i = 0; $i < count($Articles); $i++) {
    $current_Article = $Articles[$i];
    $current_post = ['id' => $current_Article->getId(),
                            'title' => $current_Article->getTitle(),
                            'subtitle' => $current_Article->getQuestion(),
                            'author' => $current_Article->getAuthor(),
                            'date' => $current_Article->getDate()];
    $array_posts[$i] = $current_post;
}
echo json_encode($array_posts, JSON_UNESCAPED_UNICODE);