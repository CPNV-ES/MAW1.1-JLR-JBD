<?php
require __DIR__ . "/dbConnector.php";
require __DIR__ . "/exercise.php";
require __DIR__ . "/question.php";
require __DIR__ . "/answer.php";
require __DIR__ . "/result.php";
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

    function insertQuestion($idExercise, $title, $type): void
    {
        $query = "INSERT INTO questions(title, type, exercises_idExercises) VALUES ('$title', '$type','$idExercise');";
        $this->connect->execute($query);
    }

    function deleteQuestion($question): void
    {
        if (is_string($question)) {
            $query = "DELETE FROM questions WHERE title = '$question'";
        } else if (is_numeric($question)) {
            $query = "DELETE FROM questions WHERE idQuestions = '$question'";
        } else {
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
    function updateQuestion($id, $title, $type)
    {
        $query = "UPDATE questions SET title = '$title', type = '$type' WHERE idquestions = '$id'";
        $this->connect->execute($query);
    }
    function getAnswersFromExercise(Int $id): array
    {
        $answers =  array();
        $questions = $this->selectQuestionsFromExercise($id);

        foreach ($questions as $question) {

            $query = "SELECT answers.idAnswers,answers.createDate  FROM answers 
            INNER JOIN results ON results.Answers_idAnswers = answers.idAnswers
            INNER JOIN results_has_questions ON results_has_questions.Results_idResults = results.idResults 
            INNER JOIN questions ON results_has_questions.questions_idquestions = questions.idquestions
            WHERE questions.idquestions = " . $question->getId();

            $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Answer', [0, ""]);


            if (!in_array($result, $answers) && !empty($result)) {
                array_push($answers, $result);
            }
        }

        return $answers;
    }
    function getResultsFromAnswer(Int $id): array
    {


        $results = array();
        $query = "SELECT results.idResults,results.result, results.Answers_idAnswers  FROM answers 
            INNER JOIN results ON results.Answers_idAnswers = answers.idAnswers 
            WHERE results.Answers_idAnswers = " . $id;

        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Result', [0, "", 0]);

        if (count($result) > 0) {
            $results += $result;
        }

        return $results;
    }

    public function getResultsFromQuestion(Int $id): array
    {
        $results = array();
        $query = "SELECT results.idResults,results.result, results.Answers_idAnswers  FROM results 
            INNER JOIN results_has_questions ON results_has_questions.Results_idResults = results.idResults
            INNER JOIN questions ON results_has_questions.questions_idquestions = questions.idquestions
            WHERE questions.idquestions  = " . $id;

        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Result', [0, "", 0]);

        if (count($result) > 0) {
            $results += $result;
        }

        return $results;
    }

    public function getAnswer(Int $id): array
    {
        $query = "SELECT * FROM answers 
        WHERE answers.idanswers  = " . $id;
        $result = $this->connect->execute($query)->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Answer', [0, ""]);
        return $result;
    }

    function insertAnswer ($answers)
    {
        $query = "INSERT INTO answers(createDate) VALUES ('". date("Y-m-d H:i:s")."');";
        $this->connect->execute($query);
        $id = $this->connect->lastInsertId();

        foreach($answers as $key => $answer){
            $query = "INSERT INTO results(Result, Answers_idAnswers) VALUES ('$answer', '$id');";
            $this->connect->execute($query);
            $idAnswer = $this->connect->lastInsertId();

            $query = "INSERT INTO results_has_questions(Results_idResults,questions_idquestions) VALUES ('$idAnswer','$key');";
            $this->connect->execute($query);
        }
        
    }

    function Answering($id)
    {
        $query = "UPDATE exercises SET state = 1 WHERE idExercises = $id";
        $this->connect->execute($query);
    }
}
