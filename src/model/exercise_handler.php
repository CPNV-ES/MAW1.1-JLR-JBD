<?php

require_once  __DIR__ . "/query.php";
class ExerciseHandler
{

    private static $instance;
    private $query;

    protected function __construct()
    {
        $this->query = new Query();
    }

    public static function getInstance(): ExerciseHandler
    {
        if (is_null(self::$instance)) {
            self::$instance = new ExerciseHandler();
        }
        return self::$instance;
    }

    /**
     * @param string[]
     */
    public function create($exercises): void
    {
        try {
            $this->query->insert($exercises);
        } catch (PDOException $e) {
            throw new DuplicateTitleException();
        }
    }

    /**
     * @return Exercise[]
     */
    public function getExercise(...$exercises): array
    {
        return $this->query->select(...$exercises);
    }

    public function delete($exercises): void
    {
        try {
            $this->query->delete($exercises);
        } catch (PDOException $e) {
            throw new NotFoundException();
        }
    }

    function createQuestion($title, $type): void
    {
        $this->query->insertQuestion($title, $type);
    }
    public function updateQuestion($id, $title, $type): void
    {
        $this->query->updateQuestion($id, $title, $type);
    }
    /**
     * @return Question[]
     */
    public function getQuestion(...$questions): array
    {
        return $this->query->selectQuestion(...$questions);
    }

    /**
     * @return Question[]
     */
    public function getQuestionsFromExercise($exercise): array
    {
        return $this->query->selectQuestionsFromExercise($exercise);
    }

    function deleteQuestion($question): void
    {
        try {
            $this->query->deleteQuestion($question);
        } catch (PDOException $e) {
            throw new NotFoundException();
        }
    }

    public function getExerciseFromQuestion(Int $exercise): Int
    {
        return $this->query->getExerciseFromQuestion($exercise);
    }
    public function getAnswersFromExercise(Int $exercise): array
    {
        return $this->query->getAnswersFromExercise($exercise);
    }
    public function getResultsFromAnswer(Int $answer): array
    {
        return $this->query->getResultsFromAnswer($answer);
    }
    public function getResultsFromQuestion(Int $question)
    {
        return $this->query->getResultsFromQuestion($question);
    }
    public function getAnswer(Int $answer)
    {
        return $this->query->getAnswer($answer);
    }

    public function addAnswer ($answers)
    {
        $this->query->insertAnswer($answers);
    }

    public function Answering ($id)
    {
        $this->query->Answering($id);
    }

    public function Close ($id)
    {
        $this->query->Close($id);
    }
}

class ExerciseHandlerException extends Exception
{
}
class DuplicateTitleException extends ExerciseHandlerException
{
}
class NotFoundException extends ExerciseHandlerException
{
}
