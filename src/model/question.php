<?php

use PhpParser\Node\Expr\Cast\String_;

class Question{

    private Int $id;
    private String $name;
    private String $result;
    private Int $type;

    public function __construct(String $name, String $result)
    {
       
    }

    public function getName() : String
    {
        return "";
    }

    public function getResult() : String
    {
        return "";
    }
    
    public function getType() : Int
    {
        return 0;
    }

}