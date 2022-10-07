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
    * @param string[]
    */
    function create($exercises) : void
    {

        $this->query->insert($exercises);
    }
  
    function exists($exercises) : bool
    {
        $result = $this->getExercise($exercises);
    
        if(isset($result)){
          if(isset($result[0]) ) {
            if($exercises == $result[0]->getTitle()){
                return true;
            }else{
                return false; 
            }
            }else{
                if($exercises == $result){
                    return true;
                }else{
                    return false; 
                }
            }
        }else
        {
            return false; 
        }
    }

    /**
    * @return Exercise[]
    */
    function getExercise($exercises = null)  : array
    {
       
        return $this->query->select($exercises);
    }
   
    function delete($exercises) : void
    {
        $this->query->delete($exercises);
    }
}