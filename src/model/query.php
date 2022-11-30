<?php
require __DIR__ . "/dbConnector.php";
require __DIR__ . "/exercise.php";
require __DIR__ . "/question.php";

class Query
{

    private DbConnector $connect;

    function __construct()
    {
        $this->connect = DbConnector::getInstance();
    }

    function insert(string $title): void
    {
        $query = "INSERT INTO exercises(title, state) VALUES ('$title', '0')";
        $this->connect->execute($query);
    }

    function select(...$args): array
    {
        $exercises = array();

        if ($args[0] == null) {
            $query = 'SELECT * FROM exercises';
        } else {
            if (is_string($args[0])) {
                $query = "SELECT * FROM exercises WHERE title IN ('" . implode("','", $args) . "')";
            } else if (is_numeric($args[0])) {
                $query = "SELECT * FROM exercises WHERE idExercises IN (" . implode(",", $args) . ")";
            } else {
                throw new Exception('It\'s not a number or a string');
            }
        }

        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $exercise) {
            array_push($exercises, new Exercise($exercise["idExercises"], $exercise["title"], $exercise["state"]));
        }

        return $exercises;
    }

    function selectQuestion(...$args): array
    {
        $questions = array();

        if ($args[0] == null) {
            $query = 'SELECT * FROM questions';
        } else {
            if (is_string($args[0])) {
                $query = "SELECT * FROM questions WHERE title IN ('" . implode("','", $args) . "')";
            } else if (is_numeric($args[0])) {
                $query = "SELECT * FROM questions WHERE idquestions IN (" . implode(",", $args) . ")";
            } else {
                throw new Exception('It\'s not a number or a string');
            }
        }

        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $question) {
            array_push($questions, new Question($question["idquestions"], $question["title"], $question["type"]));
        }
        return $questions;
    }

    function selectQuestionsFromExercise($arg): array
    {
        $questions = array();

        if (is_string($arg)) {
            $query = "SELECT questions.idQuestions, questions.title, questions.type FROM exercises 
INNER JOIN questions ON exercises.idExercises = questions.exercises_idExercises 
WHERE exercises.title = " . $arg;
        } else if (is_numeric($arg)) {
            $query = "SELECT questions.idQuestions, questions.title, questions.type FROM exercises 
INNER JOIN questions ON exercises.idExercises = questions.exercises_idExercises 
WHERE exercises.idExercises = " . $arg;
        } else {
            throw new Exception('It\'s not a number or a string');
        }

        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $question) {
            array_push($questions, new Question($question["idQuestions"], $question["title"], $question["type"]));
        }

        return $questions;
    }

    function delete($exercise): void
    {

        if (is_string($exercise)) {
            $query = "DELETE FROM exercises WHERE title = '$exercise'";
        } else if (is_numeric($exercise)) {
            $query = "DELETE FROM exercises WHERE idExercises = '$exercise'";
        } else {
            throw new Exception('It\'s not a number or a string');
        }

        $this->connect->execute($query);
    }

    function insertQuestion($idExercise, $title, $type) : void
    {
        $query = "INSERT INTO questions(title, type, exercises_idExercises) VALUES ('$title', '$type','$idExercise');";
        $this->connect->execute($query);
    }
    
    function deleteQuestion($question) : void
    {
        if(is_string($question)) {
            $query = "DELETE FROM questions WHERE title = '$question'";
        }else if(is_numeric($question)) {
            $query = "DELETE FROM questions WHERE idQuestions = '$question'";
        }else{
            throw new Exception('It\'s not a number or a string');
        }
        
        $this->connect->execute($query);
    }

    function getExerciseFromQuestion(Int $id): Int
    {
        $query = "SELECT questions.exercises_idExercises  FROM exercises 
INNER JOIN questions ON exercises.idExercises = questions.exercises_idExercises 
WHERE questions.idquestions  = " . $id;
        $result = $this->connect->execute($query)->fetch();

        return $result['exercises_idExercises'];
    }
}
