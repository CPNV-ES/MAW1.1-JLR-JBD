<?php

class Exercise
{
    private int $id;
    private string $title;
    private int $state;

    public function __construct(int $id, string $title, int $state)
    {
        $this->id = $id;
        $this->title = $title;
        $this->state = $state;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getState() : int
    {
        return $this->state;
    }
}

?>