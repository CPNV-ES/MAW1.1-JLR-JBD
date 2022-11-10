<?php

require_once  __DIR__ . "/query.php";
class ExerciseHandler
{

    private static $instance;
    private $query;
    public $handler;

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
    function create($exercises): void
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
    function getExercise(...$exercises): array
    {
        return $this->query->select(...$exercises);
    }

    function delete($exercises): void
    {
        try {
            $this->query->delete($exercises);
        } catch (PDOException $e) {
            throw new NotFoundException();
        }
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
