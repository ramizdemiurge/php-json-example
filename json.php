<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/14/17
 * Time: 5:06 PM
 */

error_reporting(0); //Ибо тут только json возвращаем

if (isset($_GET['case'])) {
    $act = $_GET['case'];
    switch ($act) {
        case 'article':
            include "application/controllers/ArticleController.php";
            break;
    }
}
