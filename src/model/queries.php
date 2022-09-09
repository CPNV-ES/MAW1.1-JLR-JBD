<?php
require __DIR__ . "/connect.php";

function insert($title)
{
  $query = "INSERT INTO exercises(Title, state)  VALUES ('$title', '0')";
  connect($query);
}

function selectAllExercises()
{
  $query = 'SELECT idExercises, title, state FROM exercises';

  return connect($query)->fetchAll(PDO::FETCH_ASSOC);
}

function delete($id){
  $query = "DELETE FROM exercises WHERE idExercises = '$id'";

  connect($query);
}

function selectNewestExercise(){
  $query = "SELECT idExercises, title FROM exercises ORDER BY idExercises DESC LIMIT 1";

  
  return connect($query)->fetch(PDO::FETCH_ASSOC);
}
?>