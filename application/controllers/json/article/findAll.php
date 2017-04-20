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
$result = $ArticleService->getAll();

$array_posts = array();
for ($i = 0; $data = mysqli_fetch_array($result); $i++) {
    $current_post = array('id' => $data[0], 'title' => $data[1], 'subtitle' => $data[5], 'author' => $data[2], 'date' => $data[3]);
    $array_posts[$i++] = $current_post;
}
echo json_encode($array_posts, JSON_UNESCAPED_UNICODE);