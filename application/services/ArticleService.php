<?php

class ArticleService
{
    function ArticleService()
    {
        require_once "application/models/DB_connect.php";
    }

    function addArticle(Article $Article)
    {
        $DB_connect = new DB_connect();
        $MySQLi = $DB_connect->getMysqli();
        if ($MySQLi->query("INSERT INTO articles (`title`,`author`,`text`,`lead_text`,`date`) VALUES(\"" . $Article->getTitle() . "\",\"" . $Article->getAuthor() . "\",\"" . $Article->getText() . "\",\"" . $Article->getQuestion() . "\",\"" . $Article->getDate() . "\")")) {
            $MySQLi->close();
            return true;
        } else {
            $MySQLi->close();
            return false;
        }
        // die("Ошибка addArticle: ".$MySQLi->error);
    }

    function delete(Article $Article)
    {
        $DB_connect = new DB_connect();
        $MySQLi = $DB_connect->getMysqli();
        if ($MySQLi->query("DELETE FROM articles WHERE `id`=\"".$Article->getId()."\"")) {
            $MySQLi->close();
            return true;
        } else {
            $MySQLi->close();
            return false;
        }
    }

    function getById($id)
    {
        $DB_connect = new DB_connect();
        $MySQLi = $DB_connect->getMysqli();
        $result = $MySQLi->query("SELECT * FROM articles WHERE `id`=\"" . $id . "\"") or die("Ошибка getById: " . $MySQLi->error);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $MySQLi->close();

        $Article = new Article();
        if ($result) {
            $Article->setId($row['id']);
            $Article->setTitle($row['title']);
            $Article->setAuthor($row['author']);
            $Article->setDate($row['date']);
            $Article->setText($row['text']);
            $Article->setQuestion($row['lead_text']);
        }
        return $Article;
    }

    function editArticle(Article $Article)
    {
        $DB_connect = new DB_connect();
        $MySQLi = $DB_connect->getMysqli();
        if ($MySQLi->query("UPDATE articles SET `title`=\"" . $Article->getTitle() . "\", `author`=\"" . $Article->getAuthor() . "\", `text`=\"" . $Article->getText() . "\", `lead_text`=\"" . $Article->getQuestion() . "\" WHERE `id`=\"" . $Article->getId() . "\"")) {
            $MySQLi->close();
            return true;
        } else {
            $MySQLi->close();
            return false;
        }
    }

    /*
     * Надо привести в ОПП вид,
     * чтобы функция возвращала массив
     * с объектами, а не результат запроса
     */
    function getAllPer($first, $users_on_page)
    {
        $DB_connect = new DB_connect();
        $mysqli = $DB_connect->getMysqli();
        $result = $mysqli->query("select * from articles limit $first, $users_on_page") or die("Ошибка getAllPer: " . $mysqli->error);
        $mysqli->close();
        return $result;
    }

//    function getAll()
//    {
//        $DB_connect = new DB_connect();
//        $mysqli = $DB_connect->getMysqli();
//        $result = $mysqli->query("SELECT * FROM articles") or die("Ошибка getAll: " . $mysqli->error);
//        $mysqli->close();
//        return $result;
//    }

    function getAll()
    {
        $DB_connect = new DB_connect();
        $mysqli = $DB_connect->getMysqli();
        $result = $mysqli->query("SELECT * FROM articles") or die("Ошибка getAll: " . $mysqli->error);
        $Articles = array();
        for ($i = 0; $data = mysqli_fetch_array($result); $i++) {
            $Article = new Article();
            //$current_post = array('id' => $data[0], 'title' => $data[1], 'subtitle' => $data[5], 'author' => $data[2], 'date' => $data[3]);
            $Article->setId($data[0]);
            $Article->setTitle($data[1]);
            $Article->setQuestion($data[5]);
            $Article->setAuthor($data[2]);
            $Article->setDate($data[3]);
            $Articles[$i] = $Article;
        }
        $mysqli->close();
        return $Articles;
    }

    function getCount()
    {
        $DB_connect = new DB_connect();
        $mysqli = $DB_connect->getMysqli();
        $result = $mysqli->query("SELECT count(id) FROM articles") or die("Ошибка getCount: " . $mysqli->error);
        $count = $result->fetch_array(MYSQLI_BOTH);
        $mysqli->close();
        return $count;
    }
}