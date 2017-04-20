<?php

/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/2/17
 * Time: 12:52 AM
 */
class Article
{
    private $id;
    private $title;
    private $author;
    private $date;
    private $question;
    private $text;

    /**
     * @return mixed
     */
    public function getId()
    {
        return htmlspecialchars($this->id);
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return htmlspecialchars($this->title);
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return htmlspecialchars($this->author);
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return htmlspecialchars($this->date);
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return htmlspecialchars($this->question);
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return htmlspecialchars($this->text);
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}