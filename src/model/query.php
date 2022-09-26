<?php
require __DIR__ . "/connect.php";
require __DIR__ . "/exercise.php";

class Query{

    private $connect;
    private static $instance;

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new Query();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->connect = Connect::getInstance();
    }

    function insert($title)
    {
        $query = "INSERT INTO exercises(Title, state) VALUES ('$title', '0')";
        $this->connect->execute($query);
        return $this->selectExercise($this->connect->dbh->lastInsertId());
    }

    function selectExercise(int $id)
    {
        $query = "SELECT * FROM exercises WHERE idExercises='$id'";
        $exercise = $this->connect->execute($query)->fetch(PDO::FETCH_ASSOC);
        return new Exercise($exercise["idExercises"],$exercise["title"],$exercise["state"]);
    }

    function selectAllExercises()
    {
        $query = 'SELECT * FROM exercises';
        return $this->connect->execute($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    function delete($id){
        $query = "DELETE FROM exercises WHERE idExercises = '$id'";
        connect($query);
    }
}
?>