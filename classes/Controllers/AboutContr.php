<?php

namespace Controllers;

class AboutContr extends \DAO\Admin
{

    private $title;
    private $subtitle;
    private $company1;
    private $company2;
    private $cInfo1;
    private $cInfo2;
    private $openHour;


    public function __construct($title, $subtitle, $company1, $company2, $cInfo1, $cInfo2, $openHour)
    {
        $this->title = trim(htmlspecialchars($title));
        $this->subtitle = trim(htmlspecialchars($subtitle));
        $this->company1 = trim(htmlspecialchars($company1));
        $this->company2 = trim(htmlspecialchars($company2));
        $this->cInfo1 = trim(htmlspecialchars($cInfo1));
        $this->cInfo2 = trim(htmlspecialchars($cInfo2));
        $this->openHour = trim(htmlspecialchars($openHour));
    }

    public function aboutUpdate()
    {
        $this->adminAbout($this->title, $this->subtitle, $this->company1, $this->company2, $this->cInfo1, $this->cInfo2, $this->openHour);
    }
}
