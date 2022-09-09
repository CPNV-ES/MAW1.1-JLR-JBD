<?php
require __DIR__ . "/connect.php";

function insert($title)
{
  $query = "INSERT INTO exercises(Title)  VALUES ('$title')";
  connect($query);
}

function selectAllExercises()
{
  $query = 'SELECT idExercises, title FROM exercises';

  $result = connect($query);
 
  return $result;
}

function delete($id){
  $query = "DELETE FROM exercises WHERE idExercises = '$id'";

  $result = connect($query);
}
?>