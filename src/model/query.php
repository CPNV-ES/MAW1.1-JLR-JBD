<?php
require __DIR__ . "/dbConnector.php";
require __DIR__ . "/exercise.php";

class Query
{

    private DbConnector $connect;

    function __construct()
    {
        $this->connect = DbConnector::getInstance();
    }

    function insert(string $title) : void
    {
        $query = "INSERT INTO exercises(title, state) VALUES ('$title', '0')";
        $this->connect->execute($query);
    }

    function select(...$args) : array
    {
        $exercises = array();
       
        if($args[0] == null) {
            $query = 'SELECT * FROM exercises'; 
        }else{
            if(is_string($args[0])) {
                $query = "SELECT * FROM exercises WHERE title IN ('".implode("','", $args)."')";
            }else if(is_numeric($args[0])) {
                $query = "SELECT * FROM exercises WHERE idExercises IN (".implode(",", $args).")";
            }else{
                throw new Exception('It\'s not a number or a string');
            }
        }
      
        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $exercise)
        {
            array_push($exercises, new Exercise($exercise["idExercises"], $exercise["title"], $exercise["state"]));
        }
       
        return $exercises;
    }

    function selectQuestion(...$args) : array
    {
        $questions = array();
       
        if($args[0] == null){
            $query = 'SELECT * FROM questions'; 
        }else{
            if(is_string($args[0])){
                $query = "SELECT * FROM questions WHERE title IN ('".implode("','",$args)."')";
            }else if(is_numeric($args[0])){
                $query = "SELECT * FROM questions WHERE idquestions IN (".implode(",",$args).")";
            }else{
                throw new Exception('It\'s not a number or a string');
            }
        }
      
        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $question)
        {
            array_push($questions, new Question($question["idquestions"],$question["title"],$question["type"]));
        }
       
        return $questions;
    }

    function delete($exercise) : void
    {
       
        if(is_string($exercise)) {
            $query = "DELETE FROM exercises WHERE title = '$exercise'";
        }else if(is_numeric($exercise)) {
            $query = "DELETE FROM exercises WHERE idExercises = '$exercise'";
        }else{
            throw new Exception('It\'s not a number or a string');
        }
        
        $this->connect->execute($query);
    }

    function insertQuestion($idExercise, $title, $type) : void
    {
        $query = "INSERT INTO questions(title, type) VALUES ('$title', '$type'); INSERT INTO exercises_has_questions(exercises_idExercises,questions_idquestions) VALUES ('$idExercise','')";
        $this->connect->execute($query);
    }
}
?>
