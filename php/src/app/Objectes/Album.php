<?php

namespace App\Objectes;

/**
 *      Objecte Album
 */
class Album
{
    /**
     * @param $title
     * @param $year
     * @param $label
     * @param $cover
     * @param $link
     */
    public function __construct(
        protected string $title,
        protected int $year,
        protected string $label,
        protected string $cover,
        protected string $link
    )
    {
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title): Album
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param $year
     * @return $this
     */
    public function setYear($year):Album
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;

    }

    /**
     * @param $label
     * @return $this
     */
    public function setLabel($label): Album
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param $cover
     * @return $this
     */
    public function setCover($cover):Album
    {
        $this->cover = $cover;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     * @return $this
     */
    public function setLink($link): Album
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='$this->cover'/></div>
                <div><p>Title: <a href='$this->link' >$this->title</a> ($this->year)<br/>$this->label</p></div>
                </div>";
    }

}
