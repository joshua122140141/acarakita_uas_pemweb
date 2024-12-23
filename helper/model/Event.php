<?php

class Event
{
    public $id;
    public $title;
    public $category;
    public $location;
    public $description;
    public $date;
    public $price;
    public $created_at;

    public function __construct($title, $category, $location, $description, $date, $price)
    {
        $this->title = $title;
        $this->category = $category;
        $this->location = $location;
        $this->description = $description;
        $this->date = $date;
        $this->price = $price;
        $this->created_at = date('Y-m-d H:i:s');
    }
}