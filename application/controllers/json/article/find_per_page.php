<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/21/17
 * Time: 12:04 AM
 */
require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

$ArticleService = new ArticleService();

$articles_on_page = "5";
$count = $ArticleService->getCount();
$total = ceil($count[0] / $articles_on_page);

if (empty($_GET["id"])) {
    $_GET["id"] = "1";
}
$p = $_GET["id"];

if (!ctype_digit($p) or $p > $total):
    $p = "1";
endif;

$first = $p * $articles_on_page - $articles_on_page;
$result = $ArticleService->getAllPer($first, $articles_on_page);

$array_posts = array();
for ($i = 0; $data = mysqli_fetch_array($result); $i++) {
    $current_post = array('id' => $data[0], 'title' => $data[1], 'subtitle' => $data[5], 'author' => $data[2], 'date' => $data[3]);
    $array_posts[$i++] = $current_post;
}

$array = array(
    'pages' => $total,
    'posts' => $array_posts);

echo json_encode($array, JSON_UNESCAPED_UNICODE);
