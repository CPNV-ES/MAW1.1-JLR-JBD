<?php

class Exercise
{
    private $id;
    private $title;
    private $state;

    public function __construct(int $id, string $title, int $state)
    {
        $this->id = $id;
        $this->title = $title;
        $this->state = $state;
    }

    public function getId(){
        return $id;
    }

    public function getTitle(){
        return $title;
    }

    public function getState(){
        return $state;
    }
}

?>