<?php
/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/16/17
 * Time: 5:05 PM
 */
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        case 'save':
            include "application/controllers/json/article/save.php";
            break;
        case 'update':
            include "application/controllers/json/article/update.php";
            break;
        case 'delete':
            include "application/controllers/json/article/delete.php";
            break;
        case 'find':
            include "application/controllers/json/article/find.php";
            break;
        case 'findAll':
            include "application/controllers/json/article/findAll.php";
            break;
        case 'findPerPage':
            include "application/controllers/json/article/find_per_page.php";
            break;
    }
}