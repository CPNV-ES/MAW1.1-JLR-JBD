<?php

require_once  __DIR__ . "/query.php";
class ExerciseHandler
{
   
    private static $instance;
    private $query;
    public $handler;

    function __construct(){
        $this->query = new Query();
    }

    public static function getInstance() : ExerciseHandler
    {
        if(is_null(self::$instance)){
            self::$instance = new ExerciseHandler();
        }
        return self::$instance;
    }
    /**
    * @param Exercise[]
    */
    function create(Exercise $exercises) : void
    {

        $this->query->insert($exercises);
    }
    /**
    * @param Exercise[]
    */
    function exists(Exercise $exercises) : bool
    {

        $result = $this->query->select($exercises);
        return in_array($exercises, $result);
    }

    /**
    * @return Exercise[]
    */
    function getExercice($exercises = null)  : array
    {
       
        return $this->query->select($exercises);
    }
    /**
    * @param string[]
    */
    function delete(string $exercises) : void
    {
        $this->query->delete($exercises);
    }
}