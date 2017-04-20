<?php

/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/7/17
 * Time: 8:40 PM
 */
class DB_connect
{
    private $mysqli;

    function DB_connect()
    {
        require_once "application/configs/db.php";

        $this->mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

        if ($this->mysqli->connect_errno) {
            //printf("Не удалось подключиться: %s\n", $this->mysqli->connect_error);
            //exit();
        } else if (!$this->mysqli->set_charset("utf8")) {
            //printf("Ошибка при загрузке набора символов utf8: %s\n", $this->mysqli->error);
            exit();
        }
    }

    /**
     * @return mixed
     */
    public function getMysqli()
    {
        return $this->mysqli;
    }
}