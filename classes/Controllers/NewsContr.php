<?php

namespace Controllers;

class NewsContr extends \DAO\News
{

    private $newsID;
    private $ProductID;
    private $maintitle;
    private $newsTitle;


    public function __construct($newsID, $ProductID, $maintitle, $newsTitle)
    {
        $this->newsID = trim(htmlspecialchars($newsID));
        $this->ProductID = trim(htmlspecialchars($ProductID));
        $this->maintitle = trim(htmlspecialchars($maintitle));
        $this->newsTitle = trim(htmlspecialchars($newsTitle));
    }

    public function newsUpdate()
    {
        $this->updateNews($this->newsID, $this->ProductID, $this->maintitle, $this->newsTitle);
    }
}
