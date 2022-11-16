<?php

use PhpParser\Node\Expr\Cast\String_;

class Question
{

    private Int $id;
    private String $title;
    private Int $type;

    public function __construct(int $id, String $title, Int $type)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : String
    {
        return $this->title;
    }

    public function getType() : Int
    {
        return $this->type;
    }
}
